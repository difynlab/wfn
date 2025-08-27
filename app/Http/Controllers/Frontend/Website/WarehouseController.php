<?php

namespace App\Http\Controllers\Frontend\Website;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingMail;
use App\Mail\AdminReportMail;
use App\Mail\AdminExpertMail;
use App\Mail\BookingMail;
use App\Mail\LandlordBookingMail;
use App\Mail\ReportMail;
use App\Mail\ExpertMail;
use App\Models\Booking;
use App\Models\Favorite;
use App\Models\HomepageContent;
use App\Models\Message;
use App\Models\Report;
use App\Models\StorageType;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\WarehouseContent;
use App\Models\WarehouseReview;
use App\Services\Recaptcha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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

        $cities = Warehouse::get()->pluck('city_en')->unique()->toArray();

        return view('frontend.website.warehouses.index', [
            'contents' => $contents,
            'warehouses' => $warehouses,
            'more_warehouses' => $more_warehouses,
            'all_warehouses' => $all_warehouses,
            'storage_types' => $storage_types,
            'popular_warehouses' => $popular_warehouses,
            'top_rated_warehouses' => $top_rated_warehouses,
            'cities' => $cities
        ]);
    }

    public function filter(Request $request)
    {
        $location = $request->location;
        $warehouse_size = $request->warehouse_size ?? 'all';
        $storage_type = $request->storage_type ?? 'all';
        // $price = $request->price ?? 'all';

        session([
            'tenancy_date' => $request->tenancy_date ?? null,
            'renewal_date' => $request->renewal_date ?? null,
        ]);

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

        // if($price != 'all') {
        //     if($price == 50) {
        //         $warehouses->where('rent_per_pallet', '<=', 50);
        //     }
        //     else if($price == 100) {
        //         $warehouses->where('rent_per_pallet', '>=', 50)->where('rent_per_pallet', '<=', 100);
        //     }
        //     else if($price == 150) {
        //         $warehouses->where('rent_per_pallet', '>=', 100)->where('rent_per_pallet', '<=', 150);
        //     }
        //     else if($price == 200) {
        //         $warehouses->where('rent_per_pallet', '>=', 150)->where('rent_per_pallet', '<=', 200);
        //     }
        //     else {
        //         $warehouses->where('rent_per_pallet', '>', 200);
        //     }
        // }

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

        $cities = Warehouse::get()->pluck('city_en')->unique()->toArray();

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
            // 'price' => $price,
            'cities' => $cities
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
            'more_warehouses' => $more_warehouses
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'warehouse_id' => 'required|integer',
            'no_of_pallets' => 'required|integer',
            'tenancy_date' => 'required|date',
            'renewal_date' => 'required|date',
            'recaptcha_token' => 'required|string',
        ]);

        $validator->after(function ($validator) use ($request) {
            $check = Recaptcha::verify($request->input('recaptcha_token'), 'booking');

            if(!$check['passes']) {
                $validator->errors()->add('recaptcha_token', 'reCAPTCHA verification failed.');

                Log::warning('Captcha verification failed', [
                    'ip' => $request->ip(),
                    'score' => $check['score'],
                    'activity' => 'subscription',
                    'user_agent' => $request->userAgent(),
                ]);
            }
        });
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(
                [
                    'error' => 'Booking Failed',
                    'message' => 'Please recheck and submit again.',
                ]
            );
        }

        $tenant = Auth::user();
        $warehouse = Warehouse::find($request->warehouse_id);
        $landlord = User::find($warehouse->user_id);

        $data = $request->except('recaptcha_token');
        $data['user_id'] = $tenant->id;
        $data['status'] = 2;
        $booking = Booking::create($data);

        $mail_data = [
            'tenant_name' => $tenant->first_name . ' ' . $tenant->last_name,
            'tenant_email' => $tenant->email,
            'landlord_name' => $landlord->first_name . ' ' . $landlord->last_name,
            'landlord_email' => $landlord->email,
            'warehouse_name' => $warehouse->name_en,
            'tenancy_date' => $booking->tenancy_date,
            'renewal_date' => $booking->renewal_date,
            'no_of_pallets' => $booking->no_of_pallets,
            'booking_id' => $booking->id,
        ];

        send_email(new BookingMail($mail_data), $tenant->email);
        send_email(new LandlordBookingMail($mail_data), $landlord->email);
        send_email(new AdminBookingMail($mail_data), config('app.admin_email'));

        return redirect()->route('warehouses.show', $request->warehouse_id)->with(
            [
                'success' => 'Your warehouse is now ready',
                'message' => 'Thanks for your time. An expert will be reaching out to you soon to finalize your agreement.',
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

    public function favorite(Request $request)
    {
        $check = Favorite::where('user_id', $request->user_id)->where('warehouse_id', $request->data_id)->first();

        if($check) {
            $check->delete();
            $status = false;
        }
        else {
            $favorite = Favorite::create(
                [
                    'user_id' => $request->user_id,
                    'warehouse_id' => $request->data_id,
                ]
            );
            $status = true;
        }

        return response($status);
    }

    public function expert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|min:3|max:255',
            'warehouse' => 'required',
            'message' => 'required',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(
                [
                    'error' => 'Sending Failed',
                    'message' => 'Please recheck and submit again.',
                ]
            );
        }

        $user = Auth::user();
        $warehouse = Warehouse::find($request->warehouse);

        $data = $request->except(['message']);
        $data['creator'] = $user->id;
        $data['date'] = Carbon::now()->toDateString();
        $data['time'] = Carbon::now()->toTimeString();
        $data['category'] = 'general';
        $data['warehouse'] = $warehouse->id;
        $data['admin_view'] = 0;
        $data['user_view'] = 1;
        $data['user_id'] = $user->id;
        $data['initial_message'] = $request->message;
        $message = Message::create($data);

        $mail_data = [
            'subject'   => $request->subject,
            'warehouse' => $warehouse->name_en,
            'message'   => $request->message,
            'date'      => Carbon::now()->toFormattedDateString(),
            'time'      => Carbon::now()->format('h:i A'),
            'user'      => $user->first_name . ' ' . $user->last_name,
            'message_id' => $message->id,
        ];

        send_email(new ExpertMail($mail_data), $user->email);
        send_email(new AdminExpertMail($mail_data), config('app.admin_email'));

        return redirect()->route('warehouses.show', $request->warehouse)->with(
            [
                'success' => 'Message Sent Successfully',
                'message' => 'Our expert will get back to you as soon as possible.',
            ]
        );
    }

    public function report(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'warehouse' => 'required',
            'reason' => 'required|min:3|max:255',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(
                [
                    'error' => 'Reporting Failed',
                    'message' => 'Please recheck and submit again.',
                ]
            );
        }

        $user = Auth::user();
        $warehouse = Warehouse::find($request->warehouse);

        $report = Report::create([
            'reason' => $request->reason,
            'user_id' => $user->id,
            'warehouse_id' => $warehouse->id,
        ]);

        $mail_data = [
            'reason'   => $request->reason,
            'warehouse' => $warehouse->name_en,
            'user'      => $user->first_name . ' ' . $user->last_name,
            'user_email' => $user->email,
            'report_id' => $report->id,
        ];

        send_email(new ReportMail($mail_data), $user->email);
        send_email(new AdminReportMail($mail_data), config('app.admin_email'));

        return redirect()->route('warehouses.show', $request->warehouse)->with(
            [
                'success' => 'Report Sent Successfully',
                'message' => 'Our team will review this report.',
            ]
        );
    }
}