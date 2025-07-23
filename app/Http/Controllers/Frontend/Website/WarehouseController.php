<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\HomepageContent;
use App\Models\StorageType;
use App\Models\Warehouse;
use App\Models\WarehouseContent;
use App\Models\WarehouseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    public function index()
    {
        $contents = WarehouseContent::find(1);
        $warehouses = Warehouse::where('status', 1)->orderBy('id', 'desc');
        $all_warehouses = $warehouses->get();

        $all_warehouses->transform(function ($warehouse) {
            $warehouse->url = route('warehouses.show', $warehouse->id);
            return $warehouse;
        });

        $warehouses = $warehouses->paginate(3);
        $more_warehouses = Warehouse::where('status', 1)->inRandomOrder()->take(4)->get();

        // Top rated warehouses
            $grouped_reviews = WarehouseReview::where('status', 1)->get()->groupBy('warehouse_id');
            $warehouse_ratings = $grouped_reviews->map(function ($reviews, $warehouse_id) {
                $star_count = $reviews->sum('star');
                $review_count = $reviews->count();

                $rating = $review_count > 0 ? number_format($star_count / $review_count, 2) : 0;

                return [
                    'warehouse_id' => $warehouse_id,
                    'total_stars' => $star_count,
                    'review_count' => $review_count,
                    'average_rating' => $rating
                ];
            });
            $top_rated_warehouses = $warehouse_ratings->sortByDesc('average_rating')->take(5);
            $top_ids = $top_rated_warehouses->pluck('warehouse_id')->toArray();
            $top_rated_warehouses = Warehouse::whereIn('id', $top_ids)->get();
        // Top rated warehouses

        // Popular warehouses
            $popular_warehouses = Booking::where('status', 1)->get()->groupBy('warehouse_id')
                                ->map(function ($group) {
                                    return $group->count();
                                })
                                ->sortDesc()
                                ->take(5);

            $top_warehouse_ids = $popular_warehouses->keys();
            $popular_warehouses = Warehouse::whereIn('id', $top_warehouse_ids)->get();
        // Popular warehouses

        $storage_types = StorageType::where('status', 1)->orderBy('id', 'desc')->get();

        return view('frontend.website.warehouses.index', [
            'contents' => $contents,
            'warehouses' => $warehouses,
            'more_warehouses' => $more_warehouses,
            'all_warehouses' => $all_warehouses,
            'storage_types' => $storage_types,
            'popular_warehouses' => $popular_warehouses,
            'top_rated_warehouses' => $top_rated_warehouses
        ]);
    }

    public function filter(Request $request)
    {
        $location = $request->location;
        $warehouse_size = $request->warehouse_size;
        $storage_type = $request->storage_type;
        $price = $request->price;

        $warehouses = Warehouse::where('status', 1)->orderBy('id', 'desc');

        if($location) {
            $warehouses->where(function ($query) use ($location) {
                $query->where('city_en', 'like', '%' . $location . '%')
                    ->orWhere('city_ar', 'like', '%' . $location . '%');
            });
        }

        if($warehouse_size != 'all') {
            if($warehouse_size == 50) {
                $warehouses->where('available_pallets', '<=', 50);
            }
            else if($warehouse_size == 100) {
                $warehouses->where('available_pallets', '<=', 100);
            }
            else if($warehouse_size == 200) {
                $warehouses->where('available_pallets', '<=', 200);
            }
            else {
                $warehouses->where('available_pallets', '>', 200);
            }
        }

        if($storage_type != 'all') {
            $warehouses->where('storage_type_id', $storage_type);
        }

        if($price != 'all') {
            if($price == 50) {
                $warehouses->where('rent_per_pallet', '<=', 50);
            }
            else if($price == 100) {
                $warehouses->where('rent_per_pallet', '>=', 50)->where('rent_per_pallet', '<=', 100);
            }
            else if($price == 150) {
                $warehouses->where('rent_per_pallet', '>=', 100)->where('rent_per_pallet', '<=', 150);
            }
            else if($price == 200) {
                $warehouses->where('rent_per_pallet', '>=', 150)->where('rent_per_pallet', '<=', 200);
            }
            else {
                $warehouses->where('rent_per_pallet', '>', 200);
            }
        }

        $contents = WarehouseContent::find(1);
        $all_warehouses = $warehouses->get();
        $warehouses = $warehouses->paginate(3);

        $all_warehouses->transform(function ($warehouse) {
            $warehouse->url = route('warehouses.show', $warehouse->id);
            return $warehouse;
        });

        $more_warehouses = Warehouse::where('status', 1)->inRandomOrder()->take(4)->get();

        // Top rated warehouses
            $grouped_reviews = WarehouseReview::where('status', 1)->get()->groupBy('warehouse_id');
            $warehouse_ratings = $grouped_reviews->map(function ($reviews, $warehouse_id) {
                $star_count = $reviews->sum('star');
                $review_count = $reviews->count();

                $rating = $review_count > 0 ? number_format($star_count / $review_count, 2) : 0;

                return [
                    'warehouse_id' => $warehouse_id,
                    'total_stars' => $star_count,
                    'review_count' => $review_count,
                    'average_rating' => $rating
                ];
            });
            $top_rated_warehouses = $warehouse_ratings->sortByDesc('average_rating')->take(5);
            $top_ids = $top_rated_warehouses->pluck('warehouse_id')->toArray();
            $top_rated_warehouses = Warehouse::whereIn('id', $top_ids)->get();
        // Top rated warehouses

        // Popular warehouses
            $popular_warehouses = Booking::where('status', 1)->get()->groupBy('warehouse_id')
                                ->map(function ($group) {
                                    return $group->count();
                                })
                                ->sortDesc()
                                ->take(5);

            $top_warehouse_ids = $popular_warehouses->keys();
            $popular_warehouses = Warehouse::whereIn('id', $top_warehouse_ids)->get();
        // Popular warehouses

        $storage_types = StorageType::where('status', 1)->orderBy('id', 'desc')->get();

        return view('frontend.website.warehouses.index', [
            'contents' => $contents,
            'warehouses' => $warehouses,
            'more_warehouses' => $more_warehouses,
            'all_warehouses' => $all_warehouses,
            'storage_types' => $storage_types,
            'popular_warehouses' => $popular_warehouses,
            'top_rated_warehouses' => $top_rated_warehouses,
            'location' => $location,
            'warehouse_size' => $warehouse_size,
            'selected_storage_type' => $storage_type,
            'price' => $price
        ]);
    }

    public function show(Request $request, Warehouse $warehouse)
    {
        $sliders = [
            ['type' => 'image', 'name' => $warehouse->thumbnail],
            ['type' => 'image', 'name' => $warehouse->outside_image],
            ['type' => 'image', 'name' => $warehouse->loading_image],
            ['type' => 'image', 'name' => $warehouse->off_loading_image],
            ['type' => 'image', 'name' => $warehouse->handling_equipment_image],
            ['type' => 'image', 'name' => $warehouse->storage_area_image]
        ];

        if($warehouse->videos) {
            foreach(json_decode($warehouse->videos) as $video) {
                $sliders[] = [
                    'type' => 'video',
                    'name' => $video,
                ];
            }
        }

        shuffle($sliders);

        $contents = WarehouseContent::find(1);
        $reviews = $warehouse->reviews()->where('status', 1)->orderBy('id', 'desc')->get();
        $star_count = $reviews->sum('star');

        if($star_count > 0) {
            $rating = number_format($star_count / $reviews->count(), 2);
        }
        else {
            $rating = 0;
        }

        $more_warehouses = Warehouse::where('id', '!=', $warehouse->id)->where('city_en', $warehouse->city_en)->where('status', 1)->inRandomOrder()->take(4)->get();

        return view('frontend.website.warehouses.show', [
            'contents' => $contents,
            'warehouse' => $warehouse,
            'sliders' => $sliders,
            'reviews' => $reviews,
            'rating' => $rating,
            'more_warehouses' => $more_warehouses,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'required|integer',
            'tenancy_date' => 'required|date',
            'renewal_date' => 'required|date'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(
                [
                    'error' => 'Booking Failed',
                    'message' => 'Please recheck and submit again.',
                ]
            );
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 2;
        $booking = Booking::create($data); 

        return redirect()->route('warehouses.show', $request->warehouse_id)->with(
            [
                'success' => 'Booking Confirmed',
                'message' => 'We will get back to you as soon as possible.',
            ]
        );
    }

    public function area(Request $request, $area)
    {
        $contents = HomepageContent::find(1);

        return view('frontend.website.warehouses.area', [
            'contents' => $contents,
            'area' => $area
        ]);
    }

    public function toggleFavorite(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['status' => 'not_logged_in']);
        }

        $userId = auth()->id();
        $warehouseId = $request->warehouse_id;

        $favorited = toggle_favorite($userId, $warehouseId);

        return response()->json(['favorited' => $favorited]);
    }
}