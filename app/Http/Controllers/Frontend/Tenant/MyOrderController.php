<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use App\Models\GiftCardPurchase;
use App\Models\MaterialPurchase;
use App\Models\MembershipPurchase;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class MyOrderController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->middleware_language_name;

        if($language == 'English') {
            $course_purchase_activity = 'Course Purchase';
            $product_purchase_activity = 'Product Purchase';
            $membership_purchase_activity = 'Membership Purchase';
            $material_purchase_activity = 'Material Purchase';
            $completed = 'Completed';
            $pending = 'Pending';
            $failed = 'Failed';
        }
        elseif($language == 'Chinese') {
            $course_purchase_activity = '课程购买';
            $product_purchase_activity = '产品购买';
            $membership_purchase_activity = '会员购买';
            $material_purchase_activity = '教材购买';
            $completed = '已完成';
            $pending = '待处理';
            $failed = '失败';
        }
        else {
            $course_purchase_activity = 'コース購入';
            $product_purchase_activity = '製品購入';
            $membership_purchase_activity = '会員購入';
            $material_purchase_activity = '資材購入';
            $completed = '完了';
            $pending = '保留中';
            $failed = '失敗';
        }

        $student = Auth::user();

        $course_purchases = CoursePurchase::where('user_id', $student->id)
            ->where('status', '1')
            ->get()
            ->map(function ($item) use ($course_purchase_activity) {
                $item->order_type = $course_purchase_activity;
                return $item;
            });

        $product_orders = ProductOrder::where('user_id', $student->id)
            ->where('status', '1')
            ->get()
            ->map(function ($item) use ($product_purchase_activity) {
                $item->order_type = $product_purchase_activity;
                return $item;
            });

        $material_purchases = MaterialPurchase::where('user_id', $student->id)
            ->where('status', '1')
            ->get()
            ->map(function ($item) use ($material_purchase_activity) {
                $item->order_type = $material_purchase_activity;
                return $item;
            });

        $membership_purchases = MembershipPurchase::where('user_id', $student->id)
            ->where('status', '1')
            ->get()
            ->map(function ($item) use ($membership_purchase_activity) {
                $item->order_type = $membership_purchase_activity;
                return $item;
            });

        $purchases = $course_purchases
                        ->concat($product_orders)
                        ->concat($material_purchases)
                        ->concat($membership_purchases)
                        ->sortByDesc(['date', 'time']);

        foreach($purchases as $purchase) {
            if($purchase->payment_status == 'Completed') {
                $purchase->payment_status = $completed;
            }
            elseif($purchase->payment_status == 'Pending') {
                $purchase->payment_status = $pending;
            }
            else {
                $purchase->payment_status = $failed;
            }
        }

        return view('frontend.student.my-orders', [
            'purchases' => $purchases,
            'student' => $student
        ]);
    }
}