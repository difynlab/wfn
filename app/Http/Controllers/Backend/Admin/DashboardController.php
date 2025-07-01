<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Warehouse;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $current_month = Carbon::now()->month;
        $current_year = Carbon::now()->year;
        $last_year = Carbon::now()->subYear();
        $last_month_date = Carbon::now()->subMonth();
        $last_month = $last_month_date->month;
        $last_month_year = $last_month_date->year;
        $months = range(1, 12);

        // Total tenants
            $this_month_tenants = User::where('role', 'tenant')
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_tenants = User::where('role', 'tenant')
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->count();

            if($last_month_tenants == 0) {
                if($this_month_tenants > 0) {
                    $tenant_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $tenant_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_tenants - $last_month_tenants) / $last_month_tenants) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $tenant_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }
        // Total tenants

        // Total landlords
            $this_month_landlords = User::where('role', 'landlord')
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_landlords = User::where('role', 'landlord')
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->count();

            if($last_month_landlords == 0) {
                if($this_month_landlords > 0) {
                    $landlord_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $landlord_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_landlords - $last_month_landlords) / $last_month_landlords) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $landlord_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }
        // Total landlords

        // Total warehouses
            $this_month_warehouses = Warehouse::whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_warehouses = Warehouse::whereMonth('created_at', $last_month)
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

        // Total income
            $this_month_income = Booking::where('status', 1)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->sum('total_rent');

            $last_month_income = Booking::where('status', 1)
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
            $current_year_income = Booking::selectRaw('MONTH(created_at) as month, SUM(total_rent) as total')
            ->where('status', 1)
            ->whereYear('created_at', $current_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $last_year_income = Booking::selectRaw('MONTH(created_at) as month, SUM(total_rent) as total')
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
        
        // Users chart
            $current_year_users = User::selectRaw('MONTH(created_at) as month, COUNT(id) as user_count')
            ->where('role', '!=', 'admin')
            ->whereYear('created_at', $current_year)
            ->groupBy('month')
            ->pluck('user_count', 'month');

            $last_year_users = User::selectRaw('MONTH(created_at) as month, COUNT(id) as user_count')
            ->where('role', '!=', 'admin')
            ->whereYear('created_at', $last_year)
            ->groupBy('month')
            ->pluck('user_count', 'month');

            $this_month_users = User::where('role', '!=', 'admin')
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_users = User::where('role', '!=', 'admin')
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->count();

            if($last_month_users == 0) {
                if($this_month_users > 0) {
                    $user_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $user_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_users - $last_month_users) / $last_month_users) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $user_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }

            $current_year_user_data = [];
            $last_year_user_data = [];

            foreach($months as $month) {
                $current_year_user_data[] = $current_year_users[$month] ?? 0;
                $last_year_user_data[] = $last_year_users[$month] ?? 0;
            }
        // Users chart

        // Bookings chart
            $current_year_bookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(id) as total')
            ->where('status', 1)
            ->whereYear('created_at', $current_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $last_year_bookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(id) as total')
            ->where('status', 1)
            ->whereYear('created_at', $last_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $this_month_bookings = Booking::where('status', 1)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->count();

            $last_month_bookings = Booking::where('status', 1)
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

            $current_year_booking_data = [];
            $last_year_booking_data = [];

            foreach($months as $month) {
                $current_year_booking_data[] = $current_year_bookings[$month] ?? 0;
                $last_year_booking_data[] = $last_year_bookings[$month] ?? 0;
            }
        // Bookings chart

        // Pallets
            $warehouses = Warehouse::get();
            $total_pallets = $warehouses->sum('total_pallets');
            $available_pallets = $warehouses->sum('available_pallets');
            $rented_pallets = Booking::where('status', 1)->get()->sum('no_of_pallets');
            $occupancy_rate = $rented_pallets != 0 ? ($rented_pallets / $total_pallets) * 100 : 0;
        // Pallets

        // Pallet distribution chart
            $current_year_pallets = Booking::selectRaw('MONTH(created_at) as month, SUM(no_of_pallets) as total')
            ->where('status', 1)
            ->whereYear('created_at', $current_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $last_year_pallets = Booking::selectRaw('MONTH(created_at) as month, SUM(no_of_pallets) as total')
            ->where('status', 1)
            ->whereYear('created_at', $last_year)
            ->groupBy('month')
            ->pluck('total', 'month');

            $this_month_pallets = Booking::where('status', 1)
                ->whereMonth('created_at', $current_month)
                ->whereYear('created_at', $current_year)
                ->sum('no_of_pallets');

            $last_month_pallets = Booking::where('status', 1)
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $last_month_year)
                ->sum('no_of_pallets');

            if($last_month_pallets == 0) {
                if($this_month_pallets > 0) {
                    $pallet_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>100.0%</span>up from last month</p>';
                }
                else {
                    $pallet_month_percentage = '<span class="green"><i class="bi bi-graph-up-arrow"></i>0.0%</span>up from last month</p>';
                }
            }
            else {
                $change = (($this_month_pallets - $last_month_pallets) / $last_month_pallets) * 100;

                if($change >= 0) {
                    $temp1 = '<span class="green"><i class="bi bi-graph-up-arrow"></i>';
                    $temp2 = '</span>up from last month</p>';
                }
                else {
                    $temp1 = '<span class="red"><i class="bi bi-graph-down-arrow"></i>';
                    $temp2 = '</span>down from last month</p>';
                }

                $pallet_month_percentage = $temp1 . number_format($change, 1) . $temp2;
            }

            $current_year_pallet_data = [];
            $last_year_pallet_data = [];
            $current_year_pallet_occupancy_data = [];
            $last_year_pallet_occupancy_data = [];

            foreach($months as $month) {
                $current_year_pallet_data[] = $current_year_pallets[$month] ?? 0;
                $last_year_pallet_data[] = $last_year_pallets[$month] ?? 0;

                $current_rented = $current_year_pallets[$month] ?? 0;
                $last_rented = $last_year_pallets[$month] ?? 0;

                $current_year_pallet_occupancy_data[] = $total_pallets > 0 ? round(($current_rented / $total_pallets) * 100, 2) : 0;
                $last_year_pallet_occupancy_data[] = $total_pallets > 0 ? round(($last_rented / $total_pallets) * 100, 2) : 0;
            }
        // Pallet distribution chart
        
        $items = Booking::orderBy('id', 'desc')->take(5)->get();
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.bookings.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a href="'. route('admin.users.company.index', $item->warehouse->user_id) .'" class="action-button" title="Company"><i class="bi bi-building"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $tenant_name = $item->user->first_name . ' ' . $item->user->last_name;
            $item->tenant = '<a href="'. route('admin.users.edit', $item->user_id) .'" class="table-link">' . $tenant_name . '</a>';

            $item->warehouse = '<a href="'. route('admin.warehouses.edit', $item->warehouse_id) .'" class="table-link">' . $item->warehouse->name . '</a>';

            $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        return view('backend.admin.dashboard', [
            'this_month_tenants' => $this_month_tenants,
            'tenant_month_percentage' => $tenant_month_percentage,
            'this_month_landlords' => $this_month_landlords,
            'landlord_month_percentage' => $landlord_month_percentage,
            'this_month_warehouses' => $this_month_warehouses,
            'warehouse_month_percentage' => $warehouse_month_percentage,
            'this_month_income' => $this_month_income,
            'income_month_percentage' => $income_month_percentage,

            'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

            'current_year_income_data' => $current_year_income_data,
            'last_year_income_data' => $last_year_income_data,

            'current_year_user_data' => $current_year_user_data,
            'last_year_user_data' => $last_year_user_data,
            'user_month_percentage' => $user_month_percentage,

            'current_year_booking_data' => $current_year_booking_data,
            'last_year_booking_data' => $last_year_booking_data,
            'booking_month_percentage' => $booking_month_percentage,

            'total_pallets' => $total_pallets,
            'available_pallets' => $available_pallets,
            'rented_pallets' => $rented_pallets,
            'occupancy_rate' => $occupancy_rate,

            'current_year_pallet_data' => $current_year_pallet_data,
            'last_year_pallet_data' => $last_year_pallet_data,
            'pallet_month_percentage' => $pallet_month_percentage,
            'current_year_pallet_occupancy_data' => $current_year_pallet_occupancy_data,
            'last_year_pallet_occupancy_data' => $last_year_pallet_occupancy_data,

            'items' => $items,
        ]);
    }
}