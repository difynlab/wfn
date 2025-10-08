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

    public function filterWarehouses(Request $request)
    {
        // For now, we'll return hardcoded data to test the design
        // Later this will be replaced with actual database queries based on search criteria
        
        $searchCriteria = [
            'city' => $request->input('city'),
            'warehouseType' => $request->input('warehouseType'),
            'licensing' => $request->input('licensing'),
            'storageType' => $request->input('storageType'),
            'palletPositions' => $request->input('palletPositions'),
            'duration' => $request->input('duration'),
        ];

        // Hardcoded warehouse data for testing - detailed version
        $warehouses = [
            (object) [
                'id' => 1,
                'name' => 'Riyadh Logistics Hub',
                'description' => 'Orem ipsum dolor sit amet, consectetur Lorem ipsum consect tur Lorem ipsum dolor sit amt onsectetu.',
                'address' => 'Al Quds St., Riyadh',
                'type' => 'Temp Controlled',
                'operating_hours' => '08.00 AM - 05:00 PM (Except Fridays)',
                'rating' => 4.5,
                'inbound_rating' => 4.3,
                'outbound_rating' => 4.7,
                'q_commerce' => false,
                'licenses' => ['Cosmetics', 'Food', 'Pharmaceuticals'],
                'image' => asset('storage/frontend/test_w'),
                'pricing' => [
                    [
                        'name' => 'Standard Pallet',
                        'range_1_50' => '150',
                        'range_51_100' => '140',
                        'range_101_200' => '130',
                        'range_200_plus' => '120'
                    ],
                    [
                        'name' => 'Cold Storage',
                        'range_1_50' => '180',
                        'range_51_100' => '170',
                        'range_101_200' => '160',
                        'range_200_plus' => '150'
                    ]
                ]
            ],
            (object) [
                'id' => 2,
                'name' => 'Jeddah Distribution Center',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.',
                'address' => 'King Fahd Road, Jeddah',
                'type' => 'Dry Storage',
                'operating_hours' => '07.00 AM - 06:00 PM (Except Fridays)',
                'rating' => 4.2,
                'inbound_rating' => 4.0,
                'outbound_rating' => 4.4,
                'q_commerce' => true,
                'licenses' => ['Food', 'Electronics'],
                'image' => asset('storage/frontend/test_w'),
                'pricing' => [
                    [
                        'name' => 'Standard Pallet',
                        'range_1_50' => '120',
                        'range_51_100' => '110',
                        'range_101_200' => '100',
                        'range_200_plus' => '90'
                    ]
                ]
            ],
            (object) [
                'id' => 3,
                'name' => 'Dammam Storage Facility',
                'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.',
                'address' => 'Prince Mohammed St., Dammam',
                'type' => 'General Storage',
                'operating_hours' => '08.30 AM - 05:30 PM (Except Fridays)',
                'rating' => 4.7,
                'inbound_rating' => 4.5,
                'outbound_rating' => 4.9,
                'q_commerce' => true,
                'licenses' => ['Automotive', 'Industrial', 'Food'],
                'image' => asset('storage/frontend/test_w'),
                'pricing' => [
                    [
                        'name' => 'Standard Pallet',
                        'range_1_50' => '110',
                        'range_51_100' => '100',
                        'range_101_200' => '90',
                        'range_200_plus' => '80'
                    ],
                    [
                        'name' => 'Hazmat Storage',
                        'range_1_50' => '200',
                        'range_51_100' => '190',
                        'range_101_200' => '180',
                        'range_200_plus' => '170'
                    ]
                ]
            ],
            (object) [
                'id' => 4,
                'name' => 'Mecca Logistics Complex',
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'address' => 'Al Haram St., Mecca',
                'type' => 'Cold Storage',
                'operating_hours' => '09.00 AM - 04:00 PM (Except Fridays)',
                'rating' => 4.1,
                'inbound_rating' => 3.9,
                'outbound_rating' => 4.3,
                'q_commerce' => false,
                'licenses' => ['Halal Food', 'Pharmaceuticals'],
                'image' => asset('storage/frontend/test_w'),
                'pricing' => [
                    [
                        'name' => 'Cold Storage',
                        'range_1_50' => '160',
                        'range_51_100' => '150',
                        'range_101_200' => '140',
                        'range_200_plus' => '130'
                    ]
                ]
            ],
            (object) [
                'id' => 5,
                'name' => 'Central Kingdom Warehouse',
                'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.',
                'address' => 'King Abdulaziz St., Riyadh',
                'type' => 'Dry Storage',
                'operating_hours' => '08.00 AM - 06:00 PM (Except Fridays)',
                'rating' => 4.6,
                'inbound_rating' => 4.4,
                'outbound_rating' => 4.8,
                'q_commerce' => true,
                'licenses' => ['Electronics', 'Fashion', 'Home Goods'],
                'image' => asset('storage/frontend/test_w'),
                'pricing' => [
                    [
                        'name' => 'Standard Pallet',
                        'range_1_50' => '130',
                        'range_51_100' => '120',
                        'range_101_200' => '110',
                        'range_200_plus' => '100'
                    ]
                ]
            ],
            (object) [
                'id' => 6,
                'name' => 'Eastern Province Hub',
                'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.',
                'address' => 'King Faisal St., Dammam',
                'type' => 'Hazmat Storage',
                'operating_hours' => '07.30 AM - 05:00 PM (Except Fridays)',
                'rating' => 4.3,
                'inbound_rating' => 4.1,
                'outbound_rating' => 4.5,
                'q_commerce' => false,
                'licenses' => ['Chemicals', 'Pharmaceuticals', 'Industrial'],
                'image' => asset('storage/frontend/test_w'),
                'pricing' => [
                    [
                        'name' => 'Hazmat Storage',
                        'range_1_50' => '180',
                        'range_51_100' => '170',
                        'range_101_200' => '160',
                        'range_200_plus' => '150'
                    ]
                ]
            ]
        ];

        return view('backend.tenant.warehouses.filter-results', [
            'warehouses' => $warehouses,
            'searchCriteria' => $searchCriteria
        ]);
    }

    public function approveQuote(Request $request)
    {
        // For now, we'll return hardcoded data for the approve quote page
        return view('backend.tenant.warehouses.approve-quote');
    }
}