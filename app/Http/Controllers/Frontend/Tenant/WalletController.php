<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use Illuminate\Support\Facades\Auth;
use App\Models\GiftCardPurchase;
use App\Models\MaterialPurchase;
use App\Models\MembershipPurchase;
use App\Models\ProductOrder;
use App\Models\ReferPointActivity;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->middleware_language_name;

        if($language == 'English') {
            $gift_card_purchase_activity = 'Gift Card';
            $refer_point_activity_activity = 'Refer Point Withdrawal';
            $course_purchase_activity = 'Course Purchase';
            $product_purchase_activity = 'Product Purchase';
            $membership_purchase_activity = 'Membership Purchase';
            $material_purchase_activity = 'Material Purchase';
        }
        elseif($language == 'Chinese') {
            $gift_card_purchase_activity = '礼品卡';
            $refer_point_activity_activity = '积分提现';
            $course_purchase_activity = '课程购买';
            $product_purchase_activity = '产品购买';
            $membership_purchase_activity = '会员购买';
            $material_purchase_activity = '教材购买';
        }
        else {
            $gift_card_purchase_activity = 'ギフトカード';
            $refer_point_activity_activity = '参照ポイントの引き出し';
            $course_purchase_activity = 'コース購入';
            $product_purchase_activity = '製品購入';
            $membership_purchase_activity = '会員購入';
            $material_purchase_activity = '資材購入';
        }

        $student = Auth::user();

        $gift_card_purchases = GiftCardPurchase::where('receiver_email', $student->email)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('status', '1')->orderBy('id', 'desc')->get();
        $refer_point_activities = ReferPointActivity::where('referred_by_id', $student->id)->where('activity', 'Withdrawal')->where('status', '1')->orderBy('id', 'desc')->get();
        $course_purchases = CoursePurchase::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();
        $product_purchases = ProductOrder::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();
        $membership_purchases = MembershipPurchase::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();
        $material_purchases = MaterialPurchase::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();

        foreach($gift_card_purchases as $gift_card_purchase) {
            $gift_card_purchase->activity = $gift_card_purchase_activity;
            $gift_card_purchase->amount = $gift_card_purchase->amount_paid;
        }
        foreach($refer_point_activities as $refer_point_activity) {
            $refer_point_activity->activity = $refer_point_activity_activity;
        }
        foreach($course_purchases as $course_purchase) {
            $course_purchase->activity = $course_purchase_activity;
            $course_purchase->amount = $course_purchase->wallet_amount;
        }
        foreach($product_purchases as $product_purchase) {
            $product_purchase->activity = $product_purchase_activity;
            $product_purchase->amount = $product_purchase->wallet_amount;
        }
        foreach($membership_purchases as $membership_purchase) {
            $membership_purchase->activity = $membership_purchase_activity;
            $membership_purchase->amount = $membership_purchase->wallet_amount;
        }
        foreach($material_purchases as $material_purchase) {
            $material_purchase->activity = $material_purchase_activity;
            $material_purchase->amount = $material_purchase->wallet_amount;
        }

        $activities = $gift_card_purchases->merge($refer_point_activities)->merge($course_purchases)->merge($product_purchases)->merge($membership_purchases)->merge($material_purchases)->sortByDesc('created_at');
        $activities = $activities->values();

        $wallet = Wallet::where('user_id', $student->id)->where('status', '1')->first();

        if(!$wallet) {
            $wallet_balance = '0.00';
        }
        else {
            $wallet_balance = $wallet->balance;
        }
    
        return view('frontend.student.wallet', [
            'student' => $student,
            'wallet_balance' => $wallet_balance,
            'activities' => $activities
        ]);
    }
}