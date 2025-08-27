@extends('frontend.layouts.app')

@section('title', 'Warehouse')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/warehouse.css') }}">
@endpush
 
@section('content')
    <div class="warehouse page-global">
        <div class="section-1 container section-margin">
            <div class="row">
                <div class="col-7 left">
                    @if($warehouse->thumbnail)
                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="main-image">
                    @else
                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="main-image">
                    @endif

                    <i class="bi bi-images slider-toggle" data-bs-toggle="modal" data-bs-target="#slide-modal"></i>
                </div>

                <div class="col-5 right">
                    @if($warehouse->outside_image)
                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->outside_image) }}" alt="Warehouse" class="side-image">
                    @else
                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="side-image">
                    @endif

                    @if($warehouse->loading_image)
                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->loading_image) }}" alt="Warehouse" class="side-image">
                    @else
                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="side-image">
                    @endif
                </div>
            </div>

            <div class="modal fade slider-modal" id="slide-modal">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    @foreach($sliders as $slider)
                                        <div class="swiper-slide">
                                            @if($slider['type'] === 'image')
                                                @if($slider['name'])
                                                    <img src="{{ asset('storage/backend/warehouses/' . $slider['name']) }}" alt="Warehouse">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse">
                                                @endif
                                            @elseif($slider['type'] === 'video')
                                                @if($slider['name'])
                                                    <video controls>
                                                        <source src="{{ asset('storage/backend/warehouses/' . $slider['name']) }}" type="video/mp4" alt="Warehouse">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse">
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach($sliders as $slider)
                                        <div class="swiper-slide">
                                            @if($slider['type'] === 'image')
                                                @if($slider['name'])
                                                    <img src="{{ asset('storage/backend/warehouses/' . $slider['name']) }}" alt="Warehouse">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse">
                                                @endif
                                            @elseif($slider['type'] === 'video')
                                                @if($slider['name'])
                                                    <video>
                                                        <source src="{{ asset('storage/backend/warehouses/' . $slider['name']) }}" type="video/mp4" alt="Warehouse">
                                                        Your browser does not support the video tag.
                                                    </video>

                                                    <i class="bi bi-play-circle-fill video-play"></i>
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse">
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-2 container section-margin">
            <div class="row">
                <div class="col-8">
                    <div class="row profile-row">
                        <div class="col-8 left">
                            @if($warehouse->user->image)
                                <img src="{{ asset('storage/backend/users/' . $warehouse->user->image) }}" alt="User" class="image">
                            @else
                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_profile_image) }}" alt="User" class="image">
                            @endif

                            <div class="profile">
                                <p class="name">{{ $warehouse->user->first_name }} {{ $warehouse->user->last_name }}</p>

                                @if($warehouse->user->landlord_experience)
                                    <p class="description">{{ $warehouse->user->landlord_experience }} {{ $contents->{'inner_page_section_2_description_' . $middleware_language} ?? $contents->inner_page_section_2_description_en }}</p>
                                @endif
                            </div>
                        </div>
         
                        <div class="col-4 right">
                            <span onClick="favoriteToggle({{ auth()->user()->id }}, {{ $warehouse->id }}, '{{ route('warehouses.favorite') }}', {{ isFavorite(auth()->user()->id, $warehouse->id) ? 1 : 0 }}, this)">
                                <i class="bi {{ isFavorite(auth()->user()->id, $warehouse->id) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                            </span>
                            
                            <p class="expert" data-bs-toggle="modal" data-bs-target="#expert-modal">{{ $contents->{'inner_page_section_2_talk_to_expert_' . $middleware_language} ?? $contents->inner_page_section_2_talk_to_expert_en }}</p>

                            <div class="modal fade expert-modal" id="expert-modal">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="modal-title">{{ $contents->{'inner_page_expert_modal_title_' . $middleware_language} ?? $contents->inner_page_expert_modal_title_en }}</p>
                                            <p class="modal-description">{{ $contents->{'inner_page_expert_modal_description_' . $middleware_language} ?? $contents->inner_page_expert_modal_description_en }}</p>

                                            <form action="{{ route('warehouses.expert') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 mb-4">
                                                        <label for="subject" class="form-label label">{{ $contents->{'inner_page_expert_modal_subject_' . $middleware_language} ?? $contents->inner_page_expert_modal_subject_en }}<span class="asterisk">*</span></label>
                                                        <input type="text" id="subject" class="form-control input-field" name="subject" placeholder="{{ $contents->{'inner_page_expert_modal_subject_placeholder_' . $middleware_language} ?? $contents->inner_page_expert_modal_subject_placeholder_en }}" value="{{ old('subject') }}" required>
                                                        <x-frontend.input-error field="subject"></x-frontend.input-error>
                                                    </div>

                                                    <div class="col-12 mb-4">
                                                        <label for="message" class="form-label label">{{ $contents->{'inner_page_expert_modal_message_' . $middleware_language} ?? $contents->inner_page_expert_modal_message_en }}<span class="asterisk">*</span></label>
                                                        <textarea id="message" class="form-control input-field textarea" name="message" rows="5" placeholder="{{ $contents->{'inner_page_expert_modal_message_placeholder_' . $middleware_language} ?? $contents->inner_page_expert_modal_message_placeholder_en }}" value="{{ old('message') }}" required>{{ old('message') }}</textarea>
                                                        <x-frontend.input-error field="message"></x-frontend.input-error>
                                                    </div>

                                                    <div class="col-12">
                                                        <input type="hidden" name="warehouse" value="{{ $warehouse->id }}">
                                                        <button type="submit" class="confirm-button">{{ $contents->{'inner_page_expert_modal_button_' . $middleware_language} ?? $contents->inner_page_expert_modal_button_en }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row title-row">
                        <div class="col-8 left">
                            <h1 class="title">{{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}</h1>
                            <p class="description">{{ $warehouse->{'city_' . $middleware_language} ?? $warehouse->city_en }}</p>
                        </div>

                        <div class="col-4 right">
                            <div class="rating">
                                <p class="score">{{ $rating }}</p>
                                <p class="label">{{ $contents->{'inner_page_section_2_rating_' . $middleware_language} ?? $contents->inner_page_section_2_rating_en }}</p>
                            </div>

                            <div class="line"></div>
                            
                            <div class="rating">
                                <p class="score">{{ $reviews->count() }}</p>
                                <p class="label">{{ $contents->{'inner_page_section_2_reviews_' . $middleware_language} ?? $contents->inner_page_section_2_reviews_en }}</p>
                            </div>
                        </div>
                    </div>

                    <p class="warehouse-description">
                        {{ $warehouse->{'description_' . $middleware_language} ?? $warehouse->description_en }}
                    </p>

                    @if($warehouse->features_en || $warehouse->features_ar)
                        <div class="row features-row">
                            @foreach(json_decode($warehouse->{'features_' . $middleware_language} ?? $warehouse->features_en) as $feature)
                                <div class="col-6 single-feature">
                                    <i class="bi-box-seam"></i>
                                    <div class="details">
                                        <p class="title">{{ $feature->title }}</p>
                                        <p class="description">{{ $feature->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-4">
                    <div class="booking-box">
                        <p class="cost">{{ $contents->{'inner_page_section_2_total_cost_' . $middleware_language} ?? $contents->inner_page_section_2_total_cost_en }}</p>
                        <p class="price">{{ $contents->{'inner_page_section_2_unlock_' . $middleware_language} ?? $contents->inner_page_section_2_unlock_en }}<i class="bi bi-lock"></i></p>

                        <div class="date-picker">
                            <div class="box">
                                <p class="check">{{ $contents->{'inner_page_section_2_tenure_start_' . $middleware_language} ?? $contents->inner_page_section_2_tenure_start_en }}</p>
                                <input type="text" class="date date-picker-field" id="tenure_start" placeholder="{{ $contents->{'inner_page_section_2_add_date_' . $middleware_language} ?? $contents->inner_page_section_2_add_date_en }}" value="{{ session('tenancy_date') }}">
                            </div>

                            <div class="line"></div>
                            
                            <div class="box">
                                <p class="check">{{ $contents->{'inner_page_section_2_tenure_end_' . $middleware_language} ?? $contents->inner_page_section_2_tenure_end_en }}</p>
                                <input type="text" class="date date-picker-field" id="tenure_end" placeholder="{{ $contents->{'inner_page_section_2_add_date_' . $middleware_language} ?? $contents->inner_page_section_2_add_date_en }}" value="{{ session('renewal_date') }}">
                            </div>
                        </div>

                        <button class="book-now-button" data-bs-toggle="modal" data-bs-target="#booking-modal">{{ $contents->{'inner_page_section_2_button_' . $middleware_language} ?? $contents->inner_page_section_2_button_en }}</button>

                        <p class="note">{{ $contents->{'inner_page_section_2_note_' . $middleware_language} ?? $contents->inner_page_section_2_note_en }}</p>
                    </div>

                    <div class="modal fade booking-modal" id="booking-modal">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="modal-title">{{ $contents->{'inner_page_modal_title_' . $middleware_language} ?? $contents->inner_page_modal_title_en }}</p>
                                    <p class="modal-description">{{ $contents->{'inner_page_modal_description_' . $middleware_language} ?? $contents->inner_page_modal_description_en }}</p>

                                    <div class="property">
                                        @if($warehouse->thumbnail)
                                            <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="image">
                                        @else
                                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="image">
                                        @endif

                                        <div class="details">
                                            <p class="type">{{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}</p>
                                            <p class="title">{{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}</p>
                                            <p class="subtitle">{{ $warehouse->{'city_' . $middleware_language} ?? $warehouse->city_en }}</p>

                                            <div class="rating">
                                                <i class="bi bi-star-fill"></i>
                                                <span class="value">{{ $rating }}</span>
                                                <span class="count">({{ $reviews->count() }} {{ $contents->{'inner_page_modal_reviews_' . $middleware_language} ?? $contents->inner_page_modal_reviews_en }})</span>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('warehouses.store') }}" method="POST" id="form">
                                        @csrf
                                        <div class="booking-details">
                                            <p class="title">{{ $contents->{'inner_page_modal_details_' . $middleware_language} ?? $contents->inner_page_modal_details_en }}</p>
                                        
                                            <div class="single-detail">
                                                <span class="text">{{ $contents->{'inner_page_modal_tenure_start_date_' . $middleware_language} ?? $contents->inner_page_modal_tenure_start_date_en }}</span>
                                                <div>
                                                    <input type="text" class="value date-picker-field" id="tenancy_date" name="tenancy_date" value="{{ old('tenancy_date') }}" required>
                                                </div>
                                            </div>

                                            <div class="single-detail">
                                                <p class="text">{{ $contents->{'inner_page_modal_tenure_end_date_' . $middleware_language} ?? $contents->inner_page_modal_tenure_end_date_en }}</p>
                                                <div>
                                                    <input type="text" class="value date-picker-field" id="renewal_date" name="renewal_date" value="{{ old('renewal_date') }}" required>
                                                </div>
                                            </div>

                                            <div class="single-detail">
                                                <p class="text">{{ $contents->{'inner_page_modal_no_of_pallets_' . $middleware_language} ?? $contents->inner_page_modal_no_of_pallets_en }}</p>
                                                <input type="number" class="value" id="no_of_pallets" name="no_of_pallets" min="1" value="{{ old('no_of_pallets') }}" required>
                                            </div>
                                        </div>

                                        <hr>

                                        <input type="hidden" name="warehouse_id" value="{{ $warehouse->id }}">
                                        <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                                        <x-backend.input-error field="recaptcha_token"></x-backend.input-error>
                                        <button type="submit" class="confirm-button">{{ $contents->{'inner_page_modal_button_' . $middleware_language} ?? $contents->inner_page_modal_button_en }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p class="report-link" data-bs-toggle="modal" data-bs-target="#report-modal">
                        <i class="bi bi-flag"></i>
                        <span>{{ $contents->{'inner_page_section_2_report_listing_' . $middleware_language} ?? $contents->inner_page_section_2_report_listing_en }}</span>
                    </p>

                    <div class="modal fade report-modal" id="report-modal">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="modal-title">{{ $contents->{'inner_page_report_modal_title_' . $middleware_language} ?? $contents->inner_page_report_modal_title_en }}</p>
                                    <p class="modal-description">{{ $contents->{'inner_page_report_modal_description_' . $middleware_language} ?? $contents->inner_page_report_modal_description_en }}</p>

                                    <form action="{{ route('warehouses.report') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <label for="reason" class="form-label label">{{ $contents->{'inner_page_report_modal_reason_' . $middleware_language} ?? $contents->inner_page_report_modal_reason_en }}<span class="asterisk">*</span></label>
                                                <textarea id="reason" class="form-control input-field textarea" name="reason" rows="5" placeholder="{{ $contents->{'inner_page_report_modal_reason_placeholder_' . $middleware_language} ?? $contents->inner_page_report_modal_reason_placeholder_en }}" value="{{ old('reason') }}" required>{{ old('reason') }}</textarea>
                                                <x-frontend.input-error field="reason"></x-frontend.input-error>
                                            </div>

                                            <div class="col-12">
                                                <input type="hidden" name="warehouse" value="{{ $warehouse->id }}">
                                                <button type="submit" class="confirm-button">{{ $contents->{'inner_page_report_modal_button_' . $middleware_language} ?? $contents->inner_page_report_modal_button_en }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-margin">
            <hr class="separator">
        </div>

        @if($contents->inner_page_section_3_title_en)
            <div class="section-3 container section-margin">
                <p class="title">{{ $contents->{'inner_page_section_3_title_' . $middleware_language} ?? $contents->inner_page_section_3_title_en }}</p>

                @if($warehouse->amenities_en || $warehouse->amenities_ar)
                    <div class="row amenities-row">
                        @foreach(json_decode($warehouse->{'amenities_' . $middleware_language} ?? $warehouse->amenities_en) as $amenity)
                            <div class="col-6 single-amenity">
                                <i class="bi-stars"></i>
                                <div class="details">
                                    <p class="detail-title">{{ $amenity->title }}</p>
                                    <p class="detail-description">{{ $amenity->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        <div class="container section-margin">
            <hr class="separator">
        </div>
        
        <div class="section-4 container section-margin">
            <div id="map"></div>
        </div>

        <div class="container section-margin">
            <hr class="separator">
        </div>

        @if($contents->inner_page_section_5_title_en)
            <div class="section-5 container section-margin">
                <p class="title">{{ $contents->{'inner_page_section_5_title_' . $middleware_language} ?? $contents->inner_page_section_5_title_en }}</p>

                @if($reviews->where('language', $middleware_language_name)->count() > 0)
                    <div class="reviews">
                        <div class="swiper mySwiper3">
                            <div class="swiper-wrapper">
                                @foreach($reviews->where('language', $middleware_language_name) as $review)
                                    <div class="swiper-slide">
                                        <div class="single-review">
                                            <div class="stars">
                                                @for($i = 1; $i <= $review->star; $i++)
                                                    <i class="bi bi-star-fill"></i>
                                                @endfor
                                            </div>

                                            <p class="content">{{ $review->content }}</p>

                                            <p class="author">
                                                <span class="name">{{ $review->user->first_name }} {{ $review->user->last_name }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                @endif
            </div>
        @endif

        <div class="container section-margin">
            <hr class="separator">
        </div>

        @if($contents->inner_page_section_6_title_en)
            <div class="section-6 container section-margin">
                <p class="policy-title">{{ $contents->{'inner_page_section_6_title_' . $middleware_language} ?? $contents->inner_page_section_6_title_en }}</p>

                @if($warehouse->details_en || $warehouse->details_ar)
                    <div class="row">
                        @foreach(json_decode($warehouse->{'details_' . $middleware_language} ?? $warehouse->details_en) as $detail)
                            <div class="col-6 single-policy">
                                <p class="title">{{ $detail->title }}</p>
                                <p class="description">{{ $detail->description }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        <div class="container section-margin">
            <hr class="separator">
        </div>

        @if($contents->inner_page_section_7_title_en && $more_warehouses->count() > 0)
            <div class="section-7 container">
                <p class="title">{{ $contents->{'inner_page_section_7_title_' . $middleware_language} ?? $contents->inner_page_section_7_title_en }}</p>

                <div class="row">
                    @foreach($more_warehouses as $key => $warehouse)
                        <div class="col-3">
                            <a href="{{ route('warehouses.show', $warehouse) }}">
                                <div class="single-warehouse">
                                    @if($warehouse->thumbnail)
                                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="image">
                                    @endif

                                    <div class="details">
                                        <p class="title">
                                            {{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}
                                        </p>
                                        <p class="subtitle">
                                            {{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}
                                        </p>
                                        <p class="price">
                                            {{ $contents->{'inner_page_section_7_unlock_' . $middleware_language} ?? $contents->inner_page_section_7_unlock_en }}
                                            <i class="bi bi-lock-fill"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <x-frontend.notification></x-frontend.notification>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/recaptcha.js') }}" async defer></script>

    <script>
        window.recaptchaAction = 'booking';
    </script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 1,
            thumbs: {
                swiper: swiper,
            },
        });

         var swiper = new Swiper(".mySwiper3", {
            // direction: "vertical",
            mousewheel: true,
            slidesPerView: 2,
            spaceBetween: 25,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // breakpoints: {
            //     481: {
            //         slidesPerView: 2,
            //         spaceBetween: 10,
            //     }
            // }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const tenancyInput = document.getElementById('tenancy_date');
            const renewalInput = document.getElementById('renewal_date');

            setTimeout(() => {
                tenancyInput.removeAttribute('readonly');
                renewalInput.removeAttribute('readonly');
            }, 100);

            tenancyInput.addEventListener('keydown', function (e) {
                e.preventDefault();
            });
            renewalInput.addEventListener('keydown', function (e) {
                e.preventDefault();
            });
        });

        $('#tenure_start').on('change', function() {
            let value = $(this).val()
            $('#tenancy_date').val(value);
        });

        $('#tenure_end').on('change', function() {
            let value = $(this).val()
            $('#renewal_date').val(value);
        });
    </script>

    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "{{ config('services.google_maps.key') }}", v: "weekly"});</script>

    <script>
        async function initMap() {
            const warehouse = @json($warehouse);
            const language = @json($middleware_language ?? 'en');

            const lat = parseFloat(warehouse.latitude);
            const lng = parseFloat(warehouse.longitude);

            const position = { lat: lat, lng: lng };
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");

            const infoTitle = warehouse[`name_${language}`] || warehouse.name_en;

            let map = new Map(document.getElementById("map"), {
                zoom: 8,
                center: position,
                mapId: "DEMO_MAP_ID",
                scrollwheel: false,
                zoomControl: false,
            });

            const icon = document.createElement('i');
            icon.className = 'bi bi-cursor-fill';
            icon.style.fontSize = '100px';
            icon.style.color = '#E31D1D';
            icon.style.cursor = 'pointer';

            const marker = new AdvancedMarkerElement({
                map,
                position,
                title: infoTitle,
                content: icon,
            });
        }

        initMap();
    </script>

    <script>
        $(document).ready(function() {
            setMinRenewalDate();
            setMinBookingRenewalDate();
        });

        $('#tenure_start').on('change', function() {
            setMinRenewalDate();
        });

        function setMinRenewalDate() {
            const tenancyDate = document.getElementById('tenure_start').value;
            
            if(tenancyDate) {
                const dateParts = tenancyDate.split('-');
                if(dateParts.length === 3) {
                    const year = parseInt(dateParts[0], 10);
                    const month = parseInt(dateParts[1], 10) - 1;
                    const day = parseInt(dateParts[2], 10);
                    const tenancyDateObj = new Date(year, month, day);
                    
                    tenancyDateObj.setMonth(tenancyDateObj.getMonth() + 1);
                    const renewalDateInput = document.getElementById('tenure_end');
                    var datePicker = renewalDateInput.DatePickerX;
                    datePicker.remove();

                    renewalDateInput.DatePickerX.init({
                        format: 'yyyy-mm-dd',
                        minDate: tenancyDateObj,
                    });

                    renewalDateInput.DatePickerX.setValue(tenancyDateObj);
                    renewalDateInput.setAttribute('min', tenancyDateObj.toISOString().split('T')[0]);
                }
            }
        }

        $('#tenancy_date').on('change', function() {
            setMinBookingRenewalDate();
        });

        function setMinBookingRenewalDate() {
            const tenancyDate = document.getElementById('tenancy_date').value;
            
            if(tenancyDate) {
                const dateParts = tenancyDate.split('-');
                if(dateParts.length === 3) {
                    const year = parseInt(dateParts[0], 10);
                    const month = parseInt(dateParts[1], 10) - 1;
                    const day = parseInt(dateParts[2], 10);
                    const tenancyDateObj = new Date(year, month, day);
                    
                    tenancyDateObj.setMonth(tenancyDateObj.getMonth() + 1);
                    const renewalDateInput = document.getElementById('renewal_date');
                    var datePicker = renewalDateInput.DatePickerX;
                    datePicker.remove();

                    renewalDateInput.DatePickerX.init({
                        format: 'yyyy-mm-dd',
                        minDate: tenancyDateObj,
                    });

                    renewalDateInput.DatePickerX.setValue(tenancyDateObj);
                    renewalDateInput.setAttribute('min', tenancyDateObj.toISOString().split('T')[0]);
                }
            }
        }
    </script>
@endpush