@extends('frontend.layouts.app')

@section('title', 'About')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
@endpush

@section('content')
    <div class="about page-global">
        @if($contents->section_1_title_en)
            <div class="section-1 container section-margin">
                <h1 class="page-title">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>

                <p class="page-description">{{ $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en }}</p>
            </div>
        @endif

        @if($contents->section_2_title_en)
            <div class="section-2 container section-margin">
                <div class="row our-story-row">
                    <div class="col-12 col-md-5 col-lg-5 col-xxl-5 left">
                        @if($contents->{'section_2_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}" alt="Our Story" class="image">
                        @elseif($contents->section_2_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}" alt="Our Story" class="image">
                        @else
                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Our Story" class="image">
                        @endif
                    </div>

                    <div class="col-12 col-md-7 col-lg-7 col-xxl-7 right">
                        <p class="section-title">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</p>
                        <div class="section-description">{!! $contents->{'section_2_description_' . $middleware_language} ?? $contents->section_2_description_en !!}</div>

                        <div class="row stats-row">
                            <div class="col-4 stat-box">
                                <p class="number">{{ $contents->{'section_2_number_1_' . $middleware_language} ?? $contents->section_2_number_1_en }}</p>
                                <p class="text">{{ $contents->{'section_2_text_1_' . $middleware_language} ?? $contents->section_2_text_1_en }}</p>
                            </div>
                            <div class="col-4 stat-box">
                                <p class="number">{{ $contents->{'section_2_number_2_' . $middleware_language} ?? $contents->section_2_number_2_en }}</p>
                                <p class="text">{{ $contents->{'section_2_text_2_' . $middleware_language} ?? $contents->section_2_text_2_en }}</p>
                            </div>
                            <div class="col-4 stat-box">
                                <p class="number">{{ $contents->{'section_2_number_3_' . $middleware_language} ?? $contents->section_2_number_3_en }}</p>
                                <p class="text">{{ $contents->{'section_2_text_3_' . $middleware_language} ?? $contents->section_2_text_3_en }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

            <div class="section-3 section-margin">
                <div class="container">
                    <div class="row single-row">
                        <div class="col-6">
                            <p class="section-title">{{ $contents->{'section_3_left_title_1_' . $middleware_language} ?? $contents->section_3_left_title_1_en }}</p>
                            <p class="section-description">{{ $contents->{'section_3_left_description_1_' . $middleware_language} ?? $contents->section_3_left_description_1_en }}</p>
                        </div>

                        <div class="col-6">
                            <p class="section-title">{{ $contents->{'section_3_right_title_1_' . $middleware_language} ?? $contents->section_3_right_title_1_en }}</p>
                            <p class="section-description">{{ $contents->{'section_3_right_description_1_' . $middleware_language} ?? $contents->section_3_right_description_1_en }}</p>
                        </div>
                    </div>

                    <div class="row single-row">
                        <div class="col-6">
                            <p class="section-title">{{ $contents->{'section_3_left_title_2_' . $middleware_language} ?? $contents->section_3_left_title_2_en }}</p>
                            <p class="section-description">{{ $contents->{'section_3_left_description_2_' . $middleware_language} ?? $contents->section_3_left_description_2_en }}</p>
                        </div>

                        <div class="col-6">
                            <p class="section-title">{{ $contents->{'section_3_right_title_2_' . $middleware_language} ?? $contents->section_3_right_title_2_en }}</p>
                            <p class="section-description">{{ $contents->{'section_3_right_description_2_' . $middleware_language} ?? $contents->section_3_right_description_2_en }}</p>
                        </div>
                    </div>

                    <div class="row single-row">
                        <div class="col-6">
                            <p class="section-title">{{ $contents->{'section_3_left_title_3_' . $middleware_language} ?? $contents->section_3_left_title_3_en }}</p>
                            <p class="section-description">{{ $contents->{'section_3_left_description_3_' . $middleware_language} ?? $contents->section_3_left_description_3_en }}</p>
                        </div>

                        <div class="col-6">
                            <p class="section-title">{{ $contents->{'section_3_right_title_3_' . $middleware_language} ?? $contents->section_3_right_title_3_en }}</p>
                            <p class="section-description">{{ $contents->{'section_3_right_description_3_' . $middleware_language} ?? $contents->section_3_right_description_3_en }}</p>
                        </div>
                    </div>
                </div>
            </div>

        @if($contents->section_4_title_en)
            <div class="section-4 container section-margin">
                <div class="row exchange-row">
                    <div class="col-6 left">
                        <p class="section-title">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</p>
                        <div class="section-description">
                            <p>
                                {!! $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en !!}
                            </p>

                            <br>

                            <p>
                                {!! $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en !!}
                            </p>
                        </div>

                        <a href="{{ route('website.warehouses.index') }}" class="learn-more-btn">Learn More</a>
                    </div>

                    <div class="col-6 right">
                        <div class="exchange-box">
                            <div class="box-header">
                                <i class="bi bi-briefcase icon"></i>
                                <p class="text">{{ $contents->{'section_4_image_1_title_' . $middleware_language} ?? $contents->section_4_image_1_title_en }}</p>
                            </div>

                            <img src="{{ asset('storage/frontend/business-storage.png') }}" alt="Business Storage" class="image">
                        </div>

                        <div class="exchange-box">
                            <div class="box-header">
                                <i class="bi bi-person icon"></i>
                                <p class="text">{{ $contents->{'section_4_image_2_title_' . $middleware_language} ?? $contents->section_4_image_2_title_en }}</p>
                            </div>

                            <img src="{{ asset('storage/frontend/personal-storage.png') }}" alt="Personal Storage" class="image">
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_5_title_en)
            <div class="section-5 container section-margin">
                <div class="row">
                    <div class="col-6 left video-box">
                        <img src="{{ asset('storage/frontend/video-placeholder.png') }}" alt="Video Coming Soon" class="image">

                        <!-- <video src="" class="video"></video> -->
                    </div>

                    <div class="col-6 right">
                        <p class="section-title">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</p>
                        <p class="section-description">{{ $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en }}</p>

                        <div class="steps">
                            <div class="row single-row">
                                <div class="col-2 single-row-left">
                                    <p class="number">1</p>
                                </div>

                                <div class="col-10 single-row-right">
                                    <p class="title">{{ $contents->{'section_5_point_1_' . $middleware_language} ?? $contents->section_5_point_1_en }}</p>
                                    <p class="description">{{ $contents->{'section_5_point_1_description_' . $middleware_language} ?? $contents->section_5_point_1_description_en }}</p>
                                </div>
                            </div>

                            <div class="row single-row">
                                <div class="col-2 single-row-left">
                                    <p class="number">2</p>
                                </div>

                                <div class="col-10 single-row-right">
                                    <p class="title">{{ $contents->{'section_5_point_2_' . $middleware_language} ?? $contents->section_5_point_2_en }}</p>
                                    <p class="description">{{ $contents->{'section_5_point_2_description_' . $middleware_language} ?? $contents->section_5_point_2_description_en }}</p>
                                </div>
                            </div>

                            <div class="row single-row">
                                <div class="col-2 single-row-left">
                                    <p class="number">3</p>
                                </div>

                                <div class="col-10 single-row-right">
                                    <p class="title">{{ $contents->{'section_5_point_3_' . $middleware_language} ?? $contents->section_5_point_3_en }}</p>
                                    <p class="description">{{ $contents->{'section_5_point_3_description_' . $middleware_language} ?? $contents->section_5_point_3_description_en }}</p>
                                </div>
                            </div>

                            <div class="row single-row">
                                <div class="col-2 single-row-left">
                                    <p class="number">4</p>
                                </div>

                                <div class="col-10 single-row-right">
                                    <p class="title">{{ $contents->{'section_5_point_4_' . $middleware_language} ?? $contents->section_5_point_4_en }}</p>
                                    <p class="description">{{ $contents->{'section_5_point_4_description_' . $middleware_language} ?? $contents->section_5_point_4_description_en }}</p>
                                </div>
                            </div>

                            <div class="row single-row">
                                <div class="col-2 single-row-left">
                                    <p class="number">5</p>
                                </div>

                                <div class="col-10 single-row-right">
                                    <p class="title">{{ $contents->{'section_5_point_5_' . $middleware_language} ?? $contents->section_5_point_5_en }}</p>
                                    <p class="description">{{ $contents->{'section_5_point_5_description_' . $middleware_language} ?? $contents->section_5_point_5_description_en }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        @if($contents->section_6_title_en)
            <div class="section-6 section-margin">
                <div class="container">
                    <p class="section-title">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section__image_6_title_en }}</p>
                    
                    <div class="row">
                        <div class="col-4 single-column">
                            <p class="section-description">{{ $contents->{'section_6_point_1_' . $middleware_language} ?? $contents->section_6_point_1_en }}</p>
                            <p class="content">{{ $contents->{'section_6_point_1_description_' . $middleware_language} ?? $contents->section_6_point_1_description_en }}</p>
                        </div>

                        <div class="col-4 single-column">
                            <p class="section-description">{{ $contents->{'section_6_point_2_' . $middleware_language} ?? $contents->section_6_point_2_en }}</p>
                            <p class="content">{{ $contents->{'section_6_point_2_description_' . $middleware_language} ?? $contents->section_6_point_2_description_en }}</p>
                        </div>

                        <div class="col-4 single-column">
                            <p class="section-description">{{ $contents->{'section_6_point_3_' . $middleware_language} ?? $contents->section_6_point_3_en }}</p>
                            <p class="content">{{ $contents->{'section_6_point_3_description_' . $middleware_language} ?? $contents->section_6_point_3_description_en }}</p>
                        </div>

                        <div class="col-4 single-column">
                            <p class="section-description">{{ $contents->{'section_6_point_4_' . $middleware_language} ?? $contents->section_6_point_4_en }}</p>
                            <p class="content">{{ $contents->{'section_6_point_4_description_' . $middleware_language} ?? $contents->section_6_point_4_description_en }}</p>
                        </div>

                        <div class="col-4 single-column">
                            <p class="section-description">{{ $contents->{'section_6_point_5_' . $middleware_language} ?? $contents->section_6_point_5_en }}</p>
                            <p class="content">{{ $contents->{'section_6_point_5_description_' . $middleware_language} ?? $contents->section_6_point_5_description_en }}</p>
                        </div>

                        <div class="col-4 single-column">
                            <p class="section-description">{{ $contents->{'section_6_point_6_' . $middleware_language} ?? $contents->section__6_point_6_en }}</p>
                            <p class="content">{{ $contents->{'section_6_point_6_description_' . $middleware_language} ?? $contents->section__6_point_6_description_en }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_7_title_en)
            <div class="section-7 container section-margin">
                <div class="row founders-row">
                    <div class="col-6 left">
                        <p class="section-title">{{ $contents->{'section_7_title_' . $middleware_language} ?? $contents->section_7_title_en }}</p>
                        <div class="section-description">
                            <p>
                                {!! $contents->{'section_7_description_' . $middleware_language} ?? $contents->section_7_description_en !!}
                            </p>

                            <br>

                            <p>
                               {!! $contents->{'section_7_description_' . $middleware_language} ?? $contents->section_7_description_en !!}
                            </p>
                        </div>
                        
                        <p class="signature">{{ $contents->{'section_7_signature_' . $middleware_language} ?? $contents->section_7_signature_en }}</p>
                    </div>

                    <div class="col-6 right">
                        @if($contents->{'section_7_image_' . $middleware_language})
                                <img src="{{ asset('storage/backend/pages/' . $contents->{'section_7_image_' . $middleware_language}) }}" alt="Founders" class="image">
                            @elseif($contents->section_7_image_en)
                                <img src="{{ asset('storage/backend/pages/' . $contents->section_7_image_en) }}" alt="Founders" class="image">
                            @else
                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Founders" class="image">
                            @endif
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_8_title_en)
            <div class="section-8 container section-margin">
                <div class="row form-row">
                    <div class="col-6">
                        <p class="section-title">{{ $contents->{'section_8_title_' . $middleware_language} ?? $contents->section_8_title_en }}</p>
                        <p class="section-description">{{ $contents->{'section_8_description_' . $middleware_language} ?? $contents->section_8_description_en }}</p>

                        <form action="" method="POST">
                            <div class="mb-4">
                                <label for="name" class="form-label label">{{ $contents->{'section_8_name_' . $middleware_language} ?? $contents->section_8_name_en }}</label>
                                <input type="text" class="form-control input-field" id="name" name="name" placeholder="{{ $contents->{'section_8_name_placeholder_' . $middleware_language} ?? $contents->section_8_name_placeholder_en }}"
                                @if(!empty($contents->section_8_name_required)) required @endif>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label label">{{ $contents->{'section_8_email_' . $middleware_language} ?? $contents->section_8_email_en }}</label>
                                <input type="email" class="form-control input-field" id="email" name="email" placeholder="{{ $contents->{'section_8_email_placeholder_' . $middleware_language} ?? $contents->section_8_email_placeholder_en }}"
                                @if(!empty($contents->section_8_email_required)) required @endif>
                            </div>

                            <div class="form-check d-flex align-items-center mb-4">
                                <input type="checkbox" class="form-check-input checkbox" id="terms">
                                <label class="form-check-label terms" for="terms">{{ $contents->{'section_8_check_label_' . $middleware_language} ?? $contents->section_8_check_label_en }}</label>
                            </div>

                            <button type="submit" class="submit-button">Submit Now</button>
                        </form>
                    </div>

                    <div class="col-6">
                        <img src="{{ asset('storage/frontend/video-placeholder.png') }}" alt="Video Coming Soon" class="image">

                        {{-- @if($contents->{'section_8_video_' . $middleware_language})
                                <video src="{{ asset('storage/backend/pages/' . $contents->{'section_8_video_' . $middleware_language}) }}" alt="Founders" class="video">
                            @elseif($contents->section_8_video_en)
                                <video src="{{ asset('storage/backend/pages/' . $contents->section_8_video_en) }}" alt="Video Coming Soon" class="video">
                            @else
                                <video src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_video) }}" alt="Founders" class="video">
                            @endif --}}

                        <!-- <video src="" class="video">Video Coming Soon</video> -->
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_9_title_en)
            <div class="section-9 container section-margin">
                <p class="section-title">{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</p>
                <p class="section-description">
                    {{ $contents->{'section_9_description_' . $middleware_language} ?? $contents->section_9_description_en }}
                </p>

                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-row">
                                <div class="left">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                    <p class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <p class="author">
                                        <span class="name">Danial Mark</span>
                                        <span class="line">|</span>
                                        <span class="designation">Marketing Coordinator</span>
                                    </p>
                                </div>

                                <div class="right">
                                    <img src="{{ asset('storage/frontend/testimonial-1.png') }}" alt="Image" class="image">
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-row">
                                <div class="left">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                    <p class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <p class="author">
                                        <span class="name">Danial Mark</span>
                                        <span class="line">|</span>
                                        <span class="designation">Marketing Coordinator</span>
                                    </p>
                                </div>

                                <div class="right">
                                    <img src="{{ asset('storage/frontend/testimonial-2.png') }}" alt="Image" class="image">
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-row">
                                <div class="left">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                    <p class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <p class="author">
                                        <span class="name">Danial Mark</span>
                                        <span class="line">|</span>
                                        <span class="designation">Marketing Coordinator</span>
                                    </p>
                                </div>

                                <div class="right">
                                    <img src="{{ asset('storage/frontend/testimonial-1.png') }}" alt="Image" class="image">
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-row">
                                <div class="left">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                    <p class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <p class="author">
                                        <span class="name">Danial Mark</span>
                                        <span class="line">|</span>
                                        <span class="designation">Marketing Coordinator</span>
                                    </p>
                                </div>

                                <div class="right">
                                    <img src="{{ asset('storage/frontend/testimonial-2.png') }}" alt="Image" class="image">
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-row">
                                <div class="left">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                    <p class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <p class="author">
                                        <span class="name">Danial Mark</span>
                                        <span class="line">|</span>
                                        <span class="designation">Marketing Coordinator</span>
                                    </p>
                                </div>

                                <div class="right">
                                    <img src="{{ asset('storage/frontend/testimonial-1.png') }}" alt="Image" class="image">
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-row">
                                <div class="left">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                    <p class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <p class="author">
                                        <span class="name">Danial Mark</span>
                                        <span class="line">|</span>
                                        <span class="designation">Marketing Coordinator</span>
                                    </p>
                                </div>

                                <div class="right">
                                    <img src="{{ asset('storage/frontend/testimonial-2.png') }}" alt="Image" class="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        @endif

        @if($contents->section_10_title_en)
            <div class="section-10 section-margin">
                <div class="container">
                    <p class="text">{{ $contents->{'section_10_title_' . $middleware_language} ?? $contents->section_10_title_en }}</p>
                </div>
            </div>
        @endif

        @if($contents->section_11_title_en)
            <div class="section-11 container">
                <div class="row">
                    <div class="col-6">
                        <p class="section-title">{{ $contents->{'section_11_title_' . $middleware_language} ?? $contents->section_11_title_en }}</p>
                        <p class="section-description">{{ $contents->{'section_11_description_' . $middleware_language} ?? $contents->section_11_description_en }}</p>
                    </div>

                    <div class="col-6">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <p class="accordion-header" id="faqOne">
                                    <button class="accordion-button button-active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="symbol">
                                            <i class="bi bi-dash active"></i>
                                        </span>
                                        Lorem ipsum dolor sit amet consectetur?
                                    </button>
                                </p>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <span class="symbol"></span>

                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <p class="accordion-header" id="faqTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="symbol">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                    </button>
                                </p>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <span class="symbol"></span>

                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <p class="accordion-header" id="faqThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="symbol">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                    </button>
                                </p>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <span class="symbol"></span>

                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('after-scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                481: {
                    slidesPerView: 2, // Show one slide on smaller screens
                    spaceBetween: 10, // Adjust space between slides
                }
            }
        });
    </script>

    <script>
        $('.section-11 .accordion .accordion-button').on('click', function() {
            $('.section-11 .accordion .accordion-button').each(function(){
                $(this).removeClass('button-active');
                $(this).find('.symbol').html('<i class="bi bi-plus"></i>');
            });

            $(this).addClass('button-active');
            $(this).find('.symbol').html('<i class="bi bi-dash active"></i>');
        });
    </script>
@endpush