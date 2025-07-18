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
                    <img src="{{ asset('storage/frontend/sw-1.png') }}" class="main-image" alt="Warehouse" data-bs-toggle="modal" data-bs-target="#sliderModal">
                </div>

                <div class="col-5 right">
                    <img src="{{ asset('storage/frontend/sw-2.png') }}" class="side-image" alt="Warehouse" data-bs-toggle="modal" data-bs-target="#sliderModal">
                    <img src="{{ asset('storage/frontend/sw-3.png') }}" class="side-image" alt="Warehouse" data-bs-toggle="modal" data-bs-target="#sliderModal">
                </div>
            </div>
        </div>
        
        <div class="section-2 container section-margin">
            <div class="row">
                <div class="col-8">
                    <div class="row profile-row">
                        <div class="col-8 left">
                            <img src="{{ asset('storage/frontend/wsp-1.png') }}" class="image" alt="Image">
                            <div class="profile">
                                <p class="name">{{ $warehouse->user->first_name }} {{ $warehouse->user->last_name }}</p>
                                <p class="description">3 years of experience as lender</p>
                            </div>
                        </div>

                        <div class="col-4 right">
                            <i class="bi bi-heart"></i>
                            <i class="bi bi-chat-left"></i>
                            <p class="expert">Talk to an Expert</p>
                        </div>
                    </div>

                    <div class="row title-row">
                        <div class="col-8 left">
                            <h1 class="title">{{ $warehouse->name }}</h1>

                            @if($middleware_language == 'en')
                                <p class="description">{{ $warehouse->address_en }}</p>
                            @else
                                <p class="description">{{ $warehouse->address_ar }}</p>
                            @endif
                        </div>

                        <div class="col-4 right">
                            <div class="rating">
                                <p class="score">4.84</p>
                                <p class="label">Rating</p>
                            </div>

                            <div class="line"></div>
                            
                            <div class="rating">
                                <p class="score">120</p>
                                <p class="label">Reviews</p>
                            </div>
                        </div>
                    </div>

                    <p class="warehouse-description">Welcome to a premium industrial-grade storage facility located in the bustling commercial corridor of Saudi Arabia. Designed for flexibility and scale, this space is perfect for logistics companies, wholesalers, or retailers looking for a secure and convenient warehousing solution in Saudi Arabia. Whether you're expanding your operations or need temporary overflow capacity, our facility offers the infrastructure and access you need to operate efficiently.</p>

                    <div class="row features-row">
                        <div class="col-6 single-feature">
                            <i class="bi bi-calendar4"></i>
                            <div class="details">
                                <p class="title">Free Cancellation</p>
                                <p class="description">Cancel up to 7 days before check-in for a full refund</p>
                            </div>
                        </div>

                        <div class="col-6 single-feature">
                            <i class="bi bi-people"></i>
                            <div class="details">
                                <p class="title">Private Washrooms</p>
                                <p class="description">Dedicated washroom facilities for staff</p>
                            </div>
                        </div>
                    </div>

                    <hr class="separator">

                    <div class="amenities">
                        <p class="amenity-title">Other Amenities</p>

                        <div class="row amenities-row">
                            <div class="col-6 single-amenity">
                                <i class="bi bi-box"></i>
                                <div class="details">
                                    <p class="title">Size</p>
                                    <p class="description">25,000 sq ft of open-plan warehouse space</p>
                                </div>
                            </div>

                            <div class="col-6 single-amenity">
                                <i class="bi bi-box"></i>
                                <div class="details">
                                    <p class="title">Ceiling Height</p>
                                    <p class="description">10 meters - suitable for high stacking and large equipment</p>
                                </div>
                            </div>

                            <div class="col-6 single-amenity">
                                <i class="bi bi-box"></i>
                                <div class="details">
                                    <p class="title">Loading Docks</p>
                                    <p class="description">Multiple truck-accessible loading bays for easy logistics</p>
                                </div>
                            </div>

                            <div class="col-6 single-amenity">
                                <i class="bi bi-box"></i>
                                <div class="details">
                                    <p class="title">Ventilation & Lighting</p>
                                    <p class="description">Industrial-grade air circulation system</p>
                                </div>
                            </div>

                            <div class="col-6 single-amenity">
                                <i class="bi bi-box"></i>
                                <div class="details">
                                    <p class="title">Parking</p>
                                    <p class="description">On-site parking available for staff and delivery trucks</p>
                                </div>
                            </div>

                            <div class="col-6 single-amenity">
                                <i class="bi bi-box"></i>
                                <div class="details">
                                    <p class="title">Fire Safety</p>
                                    <p class="description">Equipped with smoke detectors and sprinkler systems</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="booking-box">
                        <p class="cost">Total Cost</p>
                        <p class="price">Unlock Pricing<i class="bi bi-lock"></i></p>

                        <div class="date-picker">
                            <div class="box">
                                <p class="check">Tenure Start</p>
                                <p class="date">Add date</p>
                            </div>

                            <div class="line"></div>
                            
                            <div class="box">
                                <p class="check">Tenure End</p>
                                <p class="date">Add date</p>
                            </div>
                        </div>

                        <button class="book-now-button" data-bs-toggle="modal" data-bs-target="#lotModal">Book Now</button>

                        <p class="note">You won't be charged yet</p>
                    </div>
                    
                    <p class="report-link">
                        <i class="bi bi-flag"></i>
                        <span>Report this listing</span>
                    </p>

                    <div class="lender">
                        <p class="heading">More about Lender</p>
                        <div class="details">
                            <p class="single">
                                <i class="bi bi-flag"></i>
                                Speaks in English & Arabic
                            </p>
                            <p class="single">
                                <i class="bi bi-flag"></i>
                                Usually replies within an hour
                            </p>
                            <p class="single">
                                <i class="bi bi-flag"></i>
                                Lives in Saudi Arabia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-margin">
            <hr class="separator">
        </div>
        
        <div class="section-3 container section-margin">
            <img src="{{ asset('storage/frontend/single-warehouse-map.png') }}" class="image" alt="Map">
        </div>

        <div class="container section-margin">
            <hr class="separator">
        </div>

        <div class="section-4 container section-margin">
            <p class="title">Client Reviews</p>

            <div class="reviews">
                <div class="single-review">
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <p class="content">The facility is spacious, clean, and professionally managed. We had zero issues moving in, and the owner was very responsive throughout. Highly recommend for any business needing reliable storage.</p>

                    <p class="author">
                        <span class="name">Danial Mark</span>
                        <span class="line">|</span>
                        <span class="role">Marketing Coordinator</span>
                    </p>
                </div>

                <div class="single-review">
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <p class="content">Everything from the booking to the actual use of the space was seamless. Security was tight, and the premises were well-lit at night — perfect for our logistics operations.</p>

                    <p class="author">
                        <span class="name">Zajjith Ahmath</span>
                        <span class="line">|</span>
                        <span class="role">Manager</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="container section-margin">
            <hr class="separator">
        </div>

        <div class="section-5 container section-margin">
            <p class="policy-title">More Details on Policies & Safety</p>

            <div class="row">
                <div class="col-6 single-policy">
                    <p class="title">Strict Access Control</p>
                    <p class="description">Entry is limited to authorized personnel only, with digital access tracking and visitor log protocols in place.</p>
                </div>

                <div class="col-6 single-policy">
                    <p class="title">Fire & Emergency Compliance</p>
                    <p class="description">The warehouse is equipped with smoke detectors, sprinkler systems, and accessible fire exits — all maintained per Civil Defense regulations.</p>
                </div>

                 <div class="col-6 single-policy">
                    <p class="title">Insurance Compatibility</p>
                    <p class="description">Our facility supports commercial insurance requirements for both inventory and operations. Documentation can be provided upon request.</p>
                </div>

                <div class="col-6 single-policy">
                    <p class="title">Cleanliness Protocols</p>
                    <p class="description">Regular pest control and cleaning schedules ensure a hygienic environment suitable for sensitive goods or food-related storage.</p>
                </div>
            </div>
        </div>

        <div class="container section-margin">
            <hr class="separator">
        </div>

        <div class="section-6 container">
            <p class="title">More available warehouses in the same area</p>

            <div class="row">
                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-1.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-2.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-3.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-4.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade slider-modal" id="sliderModal">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-1.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-2.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-3.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-4.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouses-1.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouses-2.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouses-3.png') }}"/>
                                </div>
                            </div>
                        </div>

                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-1.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-2.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-3.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouse-c-4.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouses-1.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouses-2.png') }}"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/frontend/warehouses-3.png') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade lot-modal" id="lotModal">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="title">Choose Your Warehouse Spaces</p>
                        <p class="description">Select the warehouse lots that meet your storage requirements</p>

                        <div class="top-row">
                            <p class="top-row-title">Lot Reservation</p>

                            <div class="legends">
                                <p class="legend available"><span class="box"></span>Available</p>
                                <p class="legend reserved"><span class="box"></span>Reserved</p>
                                <p class="legend selected"><span class="box"></span>Selected</p>
                            </div>
                        </div>

                        <div class="lots">
                            <div class="row">
                                <div class="col available">
                                    <div class="lot-box">
                                        A1
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A2
                                    </div>
                                </div>
                                <div class="col reserved">
                                    <div class="lot-box">
                                        A3
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A4
                                    </div>
                                </div>
                                <div class="col reserved">
                                    <div class="lot-box">
                                        A5
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A6
                                    </div>
                                </div>
                                <div class="col reserved">
                                    <div class="lot-box">
                                        A7
                                    </div>
                                </div>
                                <div class="col reserved">
                                    <div class="lot-box">
                                        A8
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A9
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A10
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A11
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A12
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A13
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A14
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A15
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A16
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A17
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        A18
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col available">
                                    <div class="lot-box">
                                        B1
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B2
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B3
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B4
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B5
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B6
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B7
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B8
                                    </div>
                                </div>
                                <div class="col selected">
                                    <div class="lot-box">
                                        B9
                                    </div>
                                </div>
                                <div class="col selected">
                                    <div class="lot-box">
                                        B10
                                    </div>
                                </div>
                                <div class="col selected">
                                    <div class="lot-box">
                                        B11
                                    </div>
                                </div>
                                <div class="col selected">
                                    <div class="lot-box">
                                        B12
                                    </div>
                                </div>
                                <div class="col selected">
                                    <div class="lot-box">
                                        B13
                                    </div>
                                </div>
                                <div class="col selected">
                                    <div class="lot-box">
                                        B14
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B15
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B16
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B17
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        B18
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col available">
                                    <div class="lot-box">
                                        C1
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C2
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C3
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C4
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C5
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C6
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C7
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C8
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C9
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C10
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C11
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C12
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C13
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C14
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C15
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C16
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C17
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        C18
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col available">
                                    <div class="lot-box">
                                        D1
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D2
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D3
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D4
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D5
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D6
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D7
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D8
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D9
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D10
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D11
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D12
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D13
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D14
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D15
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D16
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D17
                                    </div>
                                </div>
                                <div class="col available">
                                    <div class="lot-box">
                                        D18
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('warehouses.book', 1) }}" class="confirm-button">Confirm Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
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
    </script>
@endpush