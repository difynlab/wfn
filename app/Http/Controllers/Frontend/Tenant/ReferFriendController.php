<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\ReferFriend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferFriendMail;
use App\Models\ReferPointActivity;
use App\Models\Setting;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ReferFriendController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->middleware_language_name;

        if($language == 'English') {
            $referral_account_registered = 'Referral account registered';
            $addition = 'Addition';
            $referral_account_course_purchased = 'Referral account course purchased';
            $referral_link_created = 'Referral link created';
            $withdrawal = 'Withdrawal';
            $deduction = 'Deduction';
        }
        elseif($language == 'Chinese') {
            $referral_account_registered = '被推荐人注册';
            $addition = '增加';
            $referral_account_course_purchased = '被推荐人课程购买';
            $referral_link_created = '推荐链接创建';
            $withdrawal = '提现';
            $deduction = '扣除';
        }
        else {
            $referral_account_registered = '紹介アカウントが登録されました';
            $addition = '追加';
            $referral_account_course_purchased = '紹介アカウントコースを購入しました';
            $referral_link_created = '紹介リンクを作成しました';
            $withdrawal = '撤退';
            $deduction = '控除';
        }

        $student = Auth::user();

        $invites = ReferFriend::where('user_id', $student->id)->where('status', '1')->get();
        $refer_point_activities = ReferPointActivity::where('referred_by_id', $student->id)->where('status', '1')->orderBy('id', 'desc')->get();

        foreach($refer_point_activities as $refer_point_activity) {
            if($refer_point_activity->activity == 'Withdrawal') {
                $refer_point_activity->activity = $withdrawal;
            }
            elseif($refer_point_activity->activity == 'Referral link created') {
                $refer_point_activity->activity = $referral_link_created;
            }
            elseif(strpos($refer_point_activity->activity, 'Referral account registered') !== false) {
                $refer_point_activity->activity = str_replace('Referral account registered', $referral_account_registered, $refer_point_activity->activity);
            }
            else {
                $refer_point_activity->activity = str_replace('Referral account course purchased', $referral_account_course_purchased, $refer_point_activity->activity);
            }


            if($refer_point_activity->type == 'Addition') {
                $refer_point_activity->type = $addition;
            }
            else {
                $refer_point_activity->type = $deduction;
            }
        }

        if(count($refer_point_activities) > 0) {
            $refer_point_balance = $refer_point_activities->first()->balance;
        }
        else {
            $refer_point_balance = '0.00';
        }
    
        return view('frontend.student.refer-friends', [
            'invites' => $invites,
            'student' => $student,
            'refer_point_activities' => $refer_point_activities,
            'refer_point_balance' => $refer_point_balance
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $check = ReferFriend::where('user_id', $user->id)->where('email', $request->email)->where('status', '1')->first();

        if($check) {
            return redirect()->back()->with('error', 'Already invited!');
        }

        $code = Str::random(40) . microtime(true);
        $code = Str::substr(md5($code), 0, 60);

        $refer = ReferFriend::create([
            'user_id' => $user->id,
            'email' => $request->email,
            'code' => $code,
            'status' => '1',
        ]);

        if($refer) {
            ReferPointActivity::create([
                'refer_id' => $refer->id,
                'referred_by_id' => $refer->user_id,
                'activity' => 'Referral link created',
                'date' => Carbon::now()->toDateString(),
                'time' => Carbon::now()->toTimeString(),
                'points' => 0,
                'balance' => 0,
                'amount' => 0,
                'type' => 'Addition',
                'status' => '1'
            ]);
        }

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'code' => $code
        ];

        Mail::to([$request->email])->send(new ReferFriendMail($mail_data));

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }

    public function withdraw(Request $request)
    {
        $student = Auth::user();
        
        $refer_point_activity = ReferPointActivity::where('referred_by_id', $student->id)->where('status', '1')->orderBy('id', 'desc')->first();

        if($refer_point_activity) {
            if($refer_point_activity->balance < $request->points) {
                return redirect()->route('frontend.refer-friends.index')->with('error', 'No sufficient points');
            }

            $setting = Setting::find(1);
            $conversion_field = 'referral_point_conversion_' . '' . $request->middleware_language;
            $amount = $setting->$conversion_field * $request->points;

            ReferPointActivity::create([
                'referred_by_id' => $student->id,
                'activity' => 'Withdrawal',
                'date' => Carbon::now()->toDateString(),
                'time' => Carbon::now()->toTimeString(),
                'points' => $request->points,
                'balance' => ($refer_point_activity->balance) - ($request->points),
                'amount' => $amount,
                'type' => 'Deduction',
                'status' => '1'
            ]);

            $wallet_exist = Wallet::where('user_id', $student->id)->where('status', '1')->first();

            if($wallet_exist) {
                $wallet_exist->balance = $wallet_exist->balance + $amount;
                $wallet_exist->save();
            }
            else {
                if($request->middleware_language == 'en') {
                    $currency = 'usd';
                }
                elseif($request->middleware_language == 'zh') {
                    $currency = 'cny';
                }
                else {
                    $currency = 'jpy';
                }

                $wallet = new Wallet();
                $wallet->user_id = $student->id;
                $wallet->currency = $currency;
                $wallet->balance = $amount;
                $wallet->status = '1';
                $wallet->save();
            }
        }

        return redirect()->route('frontend.refer-friends.index')->with('success', 'Withdrawal successfully completed');
    }
}