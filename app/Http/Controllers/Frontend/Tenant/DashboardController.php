<?php

namespace App\Http\Controllers\Frontend\Tenant;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        dd($auth);
        $current_month = Carbon::now()->month;
        $current_year = Carbon::now()->year;
        $last_month_date = Carbon::now()->subMonth();
        $last_month = $last_month_date->month;
        $last_month_year = $last_month_date->year;

        // Total bookings
            $total_bookings = $auth->bookings()->where('status', 1)->count();

            $this_month_bookings = $auth->bookings()
                ->where('status', 1)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_bookings = $auth->bookings()
                ->where('status', 1)
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->count();

            if($last_month_bookings == 0) {
                if($this_month_bookings > 0) {
                    $booking_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $booking_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_bookings - $last_month_bookings) / $last_month_bookings) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $booking_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }
        // Total bookings

        // Total pending bookings
            $total_pending_bookings = $auth->bookings()
                ->where('status', 0)
                ->count();

            $this_month_pending_bookings = $auth->bookings()
                ->where('status', 0)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_pending_bookings = $auth->bookings()
                ->where('status', 0)
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->count();

            if($last_month_pending_bookings == 0) {
                if($this_month_pending_bookings > 0) {
                    $pending_booking_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $pending_booking_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_pending_bookings - $last_month_pending_bookings) / $last_month_pending_bookings) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $pending_booking_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }
        // Total pending bookings

        // Total paid
            $total_paid = $auth->bookings()
                ->where('status', 1)
                ->sum('total_rent');

            $this_month_paid = $auth->bookings()
                ->where('status', 1)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->sum('total_rent');

            $last_month_paid = $auth->bookings()
                ->where('status', 1)
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->sum('total_rent');

            if($last_month_paid == 0) {
                if($this_month_paid > 0) {
                    $paid_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $paid_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_paid - $last_month_paid) / $last_month_paid) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $paid_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }
        // Total paid
        
        $items = $auth->bookings()->orderBy('id', 'desc')->take(5)->get();

        foreach($items as $item) {
            $item->action = '
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->warehouse = $item->warehouse->name;

            $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        $todos = $auth->todos()->orderBy('id', 'desc')->take(5)->get();

        return view('backend.tenant.dashboard', [
            'total_bookings' => $total_bookings,
            'booking_month_percentage' => $booking_month_percentage,

            'total_pending_bookings' => $total_pending_bookings,
            'pending_booking_month_percentage' => $pending_booking_month_percentage,

            'total_paid' => $total_paid,
            'paid_month_percentage' => $paid_month_percentage,

            'items' => $items,
            'todos' => $todos,
        ]);
    }
}