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
                @if($contents->section_3_left_title_1_en)
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
                @endif

                @if($contents->section_3_left_title_2_en)
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
                @endif

                @if($contents->section_3_left_title_3_en)
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
                @endif
            </div>
        </div>

        @if($contents->section_4_title_en)
            <div class="section-4 container section-margin">
                <div class="row exchange-row">
                    <div class="col-6 left">
                        <p class="section-title">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</p>
                        <div class="section-description">{!! $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en !!}</div>

                        <a href="{{ route('warehouses.index') }}" class="learn-more-btn">{!! $contents->{'section_4_button_' . $middleware_language} ?? $contents->section_4_button_en !!}</a>
                    </div>

                    <div class="col-6 right">
                        <div class="exchange-box">
                            <div class="box-header">
                                <i class="bi bi-briefcase icon"></i>
                                <p class="text">{{ $contents->{'section_4_image_1_title_' . $middleware_language} ?? $contents->section_4_image_1_title_en }}</p>
                            </div>

                            @if($contents->{'section_4_image_1_' . $middleware_language})
                                <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_1_' . $middleware_language}) }}" alt="Business Storage" class="image">
                            @elseif($contents->section_4_image_1_en)
                                <img src="{{ asset('storage/backend/pages/' . $contents->section_4_image_1_en) }}" alt="Business Storage" class="image">
                            @else
                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Business Storage" class="image">
                            @endif
                        </div>

                        <div class="exchange-box">
                            <div class="box-header">
                                <i class="bi bi-person icon"></i>
                                <p class="text">{{ $contents->{'section_4_image_2_title_' . $middleware_language} ?? $contents->section_4_image_2_title_en }}</p>
                            </div>

                            @if($contents->{'section_4_image_2_' . $middleware_language})
                                <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_2_' . $middleware_language}) }}" alt="Business Storage" class="image">
                            @elseif($contents->section_4_image_2_en)
                                <img src="{{ asset('storage/backend/pages/' . $contents->section_4_image_2_en) }}" alt="Business Storage" class="image">
                            @else
                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Business Storage" class="image">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_5_title_en)
            <div class="section-5 container section-margin">
                <div class="row">
                    <div class="col-6 left video-box">
                        @if($contents->{'section_5_video_' . $middleware_language})
                            <video controls src="{{ asset('storage/backend/pages/' . $contents->{'section_5_video_' . $middleware_language}) }}" class="image"></video>
                        @elseif($contents->section_5_video_en)
                            <video controls src="{{ asset('storage/backend/pages/' . $contents->section_5_video_en) }}" class="image"></video>
                        @else
                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Video" class="image">
                        @endif
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
                    <p class="section-title">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section_6_title_en }}</p>
                    
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
                        <div class="section-description">{!! $contents->{'section_7_description_' . $middleware_language} ?? $contents->section_7_description_en !!}</div>
                        
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

                        <!-- In future -->
                            <form action="" method="POST">
                                <div class="mb-4">
                                    <label for="name" class="form-label label">{{ $contents->{'section_8_name_' . $middleware_language} ?? $contents->section_8_name_en }}</label>
                                    <input type="text" class="form-control input-field" id="name" name="name" placeholder="{{ $contents->{'section_8_name_placeholder_' . $middleware_language} ?? $contents->section_8_name_placeholder_en }}">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label label">{{ $contents->{'section_8_email_' . $middleware_language} ?? $contents->section_8_email_en }}</label>
                                    <input type="email" class="form-control input-field" id="email" name="email" placeholder="{{ $contents->{'section_8_email_placeholder_' . $middleware_language} ?? $contents->section_8_email_placeholder_en }}">
                                </div>

                                <div class="form-check d-flex align-items-center mb-4">
                                    <input type="checkbox" class="form-check-input checkbox" id="terms">
                                    <label class="form-check-label terms" for="terms">{{ $contents->{'section_8_check_label_' . $middleware_language} ?? $contents->section_8_check_label_en }}</label>
                                </div>

                                <button type="submit" class="submit-button">{{ $contents->{'section_8_button_' . $middleware_language} ?? $contents->section_8_button_en }}</button>
                            </form>
                        <!-- In future -->
                    </div>

                    <div class="col-6">
                        @if($contents->{'section_8_video_' . $middleware_language})
                            <video controls src="{{ asset('storage/backend/pages/' . $contents->{'section_8_video_' . $middleware_language}) }}" alt="Video" class="image"></video>
                        @elseif($contents->section_8_video_en)
                            <video controls src="{{ asset('storage/backend/pages/' . $contents->section_8_video_en) }}" alt="Video" class="image"></video>
                        @else
                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Video" class="image">
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_9_title_en)
            <div class="section-9 container section-margin">
                <p class="section-title">{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</p>
                <p class="section-description">{{ $contents->{'section_9_description_' . $middleware_language} ?? $contents->section_9_description_en }}</p>

                @if(count($reviews) > 0)
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="testimonial-row">
                                        <div class="left">
                                            <div class="stars">
                                                @for($i = 1; $i <= $review->star; $i++ )
                                                    <i class="bi bi-star-fill"></i>
                                                @endfor
                                            </div>

                                            <p class="content">{{ $review->content }}</p>

                                            <p class="author">
                                                <span class="name">{{ $review->name }}</span>
                                                <span class="line">|</span>
                                                <span class="designation">{{ $review->designation }}</span>
                                            </p>
                                        </div>

                                        <div class="right">
                                            @if($review->image)
                                                <img src="{{ asset('storage/backend/reviews/' . $review->image) }}" alt="Image" class="image">
                                            @else
                                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="swiper-pagination"></div>
                @endif
            </div>
        @endif

        @if($contents->section_10_title_en)
            @if($contents->{'section_10_image_' . $middleware_language})
                <div class="section-10 section-margin" style="background-image: url('{{ asset('storage/backend/pages/' . $contents->{'section_10_image_' . $middleware_language}) }}')">
            @elseif($contents->section_10_image_en)
                <div class="section-10 section-margin" style="background-image: url('{{ asset('storage/backend/pages/' . $contents->section_10_image_en) }}')">
            @else
                <div class="section-10 section-margin" style="background-image: url('{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}')">
            @endif
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

                    @if($contents->section_11_faqs_en)
                        <div class="col-6">
                            <div class="accordion" id="faqAccordion">
                                @foreach(json_decode(($contents->{'section_11_faqs_' . $middleware_language} ?? $contents->section_11_faqs_en)) as $key => $section_11_faq)
                                    <div class="accordion-item">
                                        <p class="accordion-header" id="faq-{{ $key }}">
                                            <button class="accordion-button {{ $key == 0 ? 'button-active' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}">
                                                <span class="symbol">
                                                    <i class="{{ $key == 0 ? 'bi bi-dash' : 'bi bi-plus' }} {{ $key == 0 ? 'active' : '' }}"></i>
                                                </span>
                                                {{ $section_11_faq->question }}
                                            </button>
                                        </p>
                                        <div id="collapse-{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="faq-{{ $key }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <span class="symbol"></span>
                                                {{ $section_11_faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
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
            mousewheel: true,
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