<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Mail\MaterialPurchaseMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\MaterialPurchase;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BuyStudyMaterialController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $courses = Course::join('course_purchases', 'courses.id', '=', 'course_purchases.course_id')
        ->where('course_purchases.user_id', $student->id)
        ->where(function ($query) {
            $query->where('course_purchases.payment_status', 'Completed')
                  ->orWhereNull('course_purchases.payment_status');
        })
        ->where(function ($query) {
            $query->where('course_purchases.refund_status', 'Not Refunded')
                  ->orWhereNull('course_purchases.refund_status');
        })
        ->where('course_purchases.status', '1')
        ->where('courses.material_logistic', '!=', null)
        ->where('courses.material_logistic_price', '!=', null)
        ->where('courses.status', '1')
        ->select('courses.*')
        ->get();

        return view('frontend.student.buy-study-materials', [
            'courses' => $courses,
            'student' => $student
        ]);
    }

    public function checkout(Request $request)
    {
        $course = Course::find($request->course_id);
        $user = Auth::user();
        
        $wallet = Wallet::where('user_id', $user->id)->where('status', '1')->first();
        $wallet_balance = $wallet ? $wallet->balance : '0.00';

        if($course->material_logistic_price >= $wallet_balance) {
            $amount = $course->material_logistic_price - $wallet_balance;
        }
        else {
            $amount = '0.00';
        }

        if($course->language == 'English') {
            $currency = 'usd';
        }
        elseif($course->language == 'Chinese') {
            $currency = 'cny';
        }
        else {
            $currency = 'jpy';
        }

        $material_purchase = new MaterialPurchase();
        $material_purchase->user_id = Auth::user()->id;
        $material_purchase->course_id = $request->course_id;
        $material_purchase->currency = $currency;
        $material_purchase->status = '1';
        $material_purchase->save();

        $total_order_amount_in_cents = $currency === 'jpy' ? (int)$amount : (int)($amount * 100);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => $course->title
                        ],
                        'unit_amount' => $total_order_amount_in_cents
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('frontend.buy-study-materials.success', ['material_purchase_id' => $material_purchase->id]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('frontend.buy-study-materials') . '?' . http_build_query([
                    'error' => 'Material purchase has been failed because of the payment cancellation'
                ]),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $material_purchase_id = $request->query('material_purchase_id');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $material_purchase = MaterialPurchase::find($material_purchase_id);

        if($material_purchase) {
            $material_purchase->date = now()->toDateString();
            $material_purchase->time = now()->toTimeString();
            $material_purchase->mode = $session->mode;
            $material_purchase->transaction_id = $session->id;
            $material_purchase->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
            $material_purchase->payment_status = 'Completed';
            $material_purchase->save();
        }

        $wallet = Wallet::where('user_id', $material_purchase->user_id)->where('status', '1')->first();
        $course = Course::find($material_purchase->course_id);

        if($wallet) {
            if($wallet->balance >= $course->material_logistic_price) {
                $material_purchase->wallet_amount = $course->material_logistic_price;
                $material_purchase->save();

                $wallet->balance = $wallet->balance - $course->material_logistic_price;
                $wallet->save();
            }
            else {
                $material_purchase->wallet_amount = $wallet->balance;
                $material_purchase->save();

                $wallet->balance = '0.00';
                $wallet->save();
            }
        }

        $user = Auth::user();

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'course' => $course->title
        ];

        Mail::to($user->email)->send(new MaterialPurchaseMail($mail_data));

        return redirect()->route('frontend.buy-study-materials')->with('complete', 'Material purchase has been successfully completed');
    }
}