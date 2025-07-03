<?php

namespace App\Http\Controllers\Frontend\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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
        $last_year = Carbon::now()->subYear();
        $last_month_date = Carbon::now()->subMonth();
        $last_month = $last_month_date->month;
        $last_month_year = $last_month_date->year;
        $months = range(1, 12);

        // Total warehouses
            $total_warehouses = $auth->warehouses()->count();

            $this_month_warehouses = $auth->warehouses()->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_warehouses = $auth->warehouses()->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->count();

            if($last_month_warehouses == 0) {
                if($this_month_warehouses > 0) {
                    $warehouse_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $warehouse_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_warehouses - $last_month_warehouses) / $last_month_warehouses) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $warehouse_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }
        // Total warehouses

        // Total bookings
            $total_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->where('status', 1)
                ->count();

            $this_month_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->where('status', 1)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
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
            $total_pending_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->where('status', 0)
                ->count();

            $this_month_pending_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->where('status', 0)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_pending_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
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

        // Total income
            $total_income = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->where('status', 1)
                ->sum('total_rent');

            $this_month_income = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->where('status', 1)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->sum('total_rent');

            $last_month_income = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->where('status', 1)
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->sum('total_rent');

            if($last_month_income == 0) {
                if($this_month_income > 0) {
                    $income_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $income_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_income - $last_month_income) / $last_month_income) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $income_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }
        // Total income

        // Revenue chart
            $current_year_income = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
            ->selectRaw('MONTH(created_at) as month, SUM(total_rent) as total')
            ->where('status', 1)
            ->whereYear('created_at', $current_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $last_year_income = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
            ->selectRaw('MONTH(created_at) as month, SUM(total_rent) as total')
            ->where('status', 1)
            ->whereYear('created_at', $last_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $current_year_income_data = [];
            $last_year_income_data = [];

            foreach($months as $month) {
                $current_year_income_data[] = $current_year_income[$month] ?? 0;
                $last_year_income_data[] = $last_year_income[$month] ?? 0;
            }
        // Revenue chart

        // Bookings chart
            $current_year_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
            })
            ->selectRaw('MONTH(created_at) as month, COUNT(id) as total')
            ->where('status', 1)
            ->whereYear('created_at', $current_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $last_year_bookings = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
            })
            ->selectRaw('MONTH(created_at) as month, COUNT(id) as total')
            ->where('status', 1)
            ->whereYear('created_at', $last_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $current_year_booking_data = [];
            $last_year_booking_data = [];

            foreach($months as $month) {
                $current_year_booking_data[] = $current_year_bookings[$month] ?? 0;
                $last_year_booking_data[] = $last_year_bookings[$month] ?? 0;
            }
        // Bookings chart
        
        $items = Booking::whereHas('warehouse', function ($query) use ($auth) {
                $query->where('user_id', $auth->id)
                    ->where('status', 1);
                })
                ->orderBy('id', 'desc')->take(5)->get();

        foreach($items as $item) {
            $item->action = '
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->tenant = $item->user->first_name . ' ' . $item->user->last_name;

            $item->warehouse = '<a href="'. route('landlord.warehouses.edit', $item->warehouse_id) .'" class="table-link">' . $item->warehouse->name . '</a>';

            $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        return view('backend.landlord.dashboard', [
            'total_warehouses' => $total_warehouses,
            'warehouse_month_percentage' => $warehouse_month_percentage,

            'total_bookings' => $total_bookings,
            'booking_month_percentage' => $booking_month_percentage,

            'total_pending_bookings' => $total_pending_bookings,
            'pending_booking_month_percentage' => $pending_booking_month_percentage,

            'total_income' => $total_income,
            'income_month_percentage' => $income_month_percentage,

            'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

            'current_year_income_data' => $current_year_income_data,
            'last_year_income_data' => $last_year_income_data,

            'current_year_booking_data' => $current_year_booking_data,
            'last_year_booking_data' => $last_year_booking_data,

            'items' => $items,
        ]);
    }
}