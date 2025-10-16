<?php

namespace App\Http\Controllers\Backend\Tenant;

use App\Http\Controllers\Controller;
use App\Models\StorageType;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('tenant.bookings.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $item->warehouse = $item->warehouse->name_en;

            switch ($item->status) {
                case 1:
                    $item->status = '<span class="status active-status">Active</span>';
                    break;

                case 2:
                    $item->status = '<span class="status pending-status">Pending</span>';
                    break;

                default:
                    $item->status = '<span class="status inactive-status">Inactive</span>';
                    break;
            }
        }

        return $items;
    }

    public function index(Request $request)
    {
        $auth = Auth::user();
        $warehouses = Warehouse::where('status', 1)->get();
        
        $pagination = $request->pagination ?? 10;
        $items = $auth->bookings()->orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        $cities = Warehouse::get()->pluck('city_en')->unique()->toArray();
        $storage_types = StorageType::where('status', 1)->orderBy('id', 'desc')->get();

        return view('backend.tenant.warehouses.index', [
            'items' => $items,
            'pagination' => $pagination,
            'warehouses' => $warehouses,
            'cities' => $cities,
            'storage_types' => $storage_types
        ]);
    }

    public function filter(Request $request)
    {
        $location = $request->location;
        $storage_type = $request->storage_type ?? 'all';
        $license = $request->license;

        session([
            'tenancy_date' => $request->tenancy_date ?? null,
            'renewal_date' => $request->renewal_date ?? null,
            'number_of_pallets' => $request->number_of_pallets ?? null,
            'square_meters' => $request->square_meters ?? null,
        ]);

        $warehouses = Warehouse::where('status', 1)->orderBy('id', 'desc');

        if($location) {
            $warehouses->where(function ($query) use ($location) {
                $query->where('city_en', 'like', '%' . $location . '%')
                    ->orWhere('city_ar', 'like', '%' . $location . '%');
            });
        }

        if($storage_type != 'all') {
            $warehouses->where('storage_type_id', $storage_type);
        }

        if($license) {
            $warehouses->where('license', $license);
        }

        $warehouses = $warehouses->paginate(6);

        return view('backend.tenant.warehouses.results', [
            'warehouses' => $warehouses
        ]);
    }

    public function approveQuote(Request $request)
    {
        // For now, we'll return hardcoded data for the approve quote page
        return view('backend.tenant.warehouses.approve-quote');
    }
}