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
                    <div class="col-5 left">
                        @if($contents->{'section_2_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}" alt="Our Story" class="image">
                        @elseif($contents->section_2_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}" alt="Our Story" class="image">
                        @else
                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Our Story" class="image">
                        @endif
                    </div>

                    <div class="col-7 right">
                        <p class="section-title">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</p>
                        <div class="section-description">{!! $contents->{'section_2_description_' . $middleware_language} ?? $contents->section_2_description_en !!}</div>

                        <div class="row stats-row">
                            <div class="col-4 stat-box">
                                <p class="number">2100+</p>
                                <p class="text">Lorem ipsum</p>
                            </div>
                            <div class="col-4 stat-box">
                                <p class="number">17+</p>
                                <p class="text">Years of Experience</p>
                            </div>
                            <div class="col-4 stat-box">
                                <p class="number">2100+</p>
                                <p class="text">Lorem ipsum</p>
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
                        <p class="section-title">Our Value</p>
                        <p class="section-description">Where Your Growth Meets Opportunity</p>
                    </div>

                    <div class="col-6">
                        <p class="section-title">From startups to enterprises, we grow with you.</p>
                        <p class="section-description">
                            Every business, big or small, deserves a space that adapts and evolves.
                            We’re here to provide flexible warehouse solutions that scale alongside your success.
                        </p>
                    </div>
                </div>

                <div class="row single-row">
                    <div class="col-6">
                        <p class="section-title">Our Mission</p>
                        <p class="section-description">Bridging the Gap Between You and the Perfect Space</p>
                    </div>

                    <div class="col-6">
                        <p class="section-title">We make storage accessible for all anytime.</p>
                        <p class="section-description">
                            Our platform makes finding the right warehouse space effortless,
                            empowering you with the tools to manage logistics and streamline
                            operations without the hassle anytime.
                        </p>
                    </div>
                </div>

                <div class="row single-row">
                    <div class="col-6">
                        <p class="section-title">Our Vision</p>
                        <p class="section-description">Empowering Businesses to Thrive in a Boundless Future</p>
                    </div>

                    <div class="col-6">
                        <p class="section-title">Every business deserves the space to thrive.</p>
                        <p class="section-description">
                            We believe in breaking down barriers to growth. Our vision is to provide
                            every business, no matter its size, with the warehouse space it needs to
                            reach new heights.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-4 container section-margin">
            <div class="row exchange-row">
                <div class="col-6 left">
                    <p class="section-title">Who Can Use Warehouse Exchange?</p>
                    <div class="section-description">
                        <p>
                            Our Warehouse Exchange lets you easily access a variety of spaces,
                            whether you’re a business in need of inventory storage, or someone
                            seeking a safe place for personal belongings. With options to rent,
                            exchange, or share warehouse spaces, you can quickly find the perfect
                            match that meets your specific needs.
                        </p>

                        <br>

                        <p>
                            Whether it’s for short-term business storage, long-term personal use, or
                            anything in between, our platform is designed to make warehouse
                            exchanges seamless and hassle-free.
                        </p>
                    </div>

                    <a href="{{ route('website.warehouses.index') }}" class="learn-more-btn">Learn More</a>
                </div>

                <div class="col-6 right">
                    <div class="exchange-box">
                        <div class="box-header">
                            <i class="bi bi-briefcase icon"></i>
                            <p class="text">Business Storages</p>
                        </div>

                        <img src="{{ asset('storage/frontend/business-storage.png') }}" alt="Business Storage" class="image">
                    </div>

                    <div class="exchange-box">
                        <div class="box-header">
                            <i class="bi bi-person icon"></i>
                            <p class="text">Personal Storages</p>
                        </div>

                        <img src="{{ asset('storage/frontend/personal-storage.png') }}" alt="Personal Storage" class="image">
                    </div>
                </div>
            </div>
        </div>

        <div class="section-5 container section-margin">
            <div class="row">
                <div class="col-6 left video-box">
                    <img src="{{ asset('storage/frontend/video-placeholder.png') }}" alt="Video Coming Soon" class="image">

                    <!-- <video src="" class="video"></video> -->
                </div>

                <div class="col-6 right">
                    <p class="section-title">How the Procedure Works?</p>
                    <p class="section-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>

                    <div class="steps">
                        <div class="row single-row">
                            <div class="col-2 single-row-left">
                                <p class="number">1</p>
                            </div>

                            <div class="col-10 single-row-right">
                                <p class="title">Register</p>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>

                        <div class="row single-row">
                            <div class="col-2 single-row-left">
                                <p class="number">2</p>
                            </div>

                            <div class="col-10 single-row-right">
                                <p class="title">Search for Space</p>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>

                        <div class="row single-row">
                            <div class="col-2 single-row-left">
                                <p class="number">3</p>
                            </div>

                            <div class="col-10 single-row-right">
                                <p class="title">Receive Quotes</p>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>

                        <div class="row single-row">
                            <div class="col-2 single-row-left">
                                <p class="number">4</p>
                            </div>

                            <div class="col-10 single-row-right">
                                <p class="title">Make Payment</p>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>

                        <div class="row single-row">
                            <div class="col-2 single-row-left">
                                <p class="number">5</p>
                            </div>

                            <div class="col-10 single-row-right">
                                <p class="title">Space is Yours</p>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-6 section-margin">
            <div class="container">
                <p class="section-title">Lorem ipsum</p>
                
                <div class="row">
                    <div class="col-4 single-column">
                        <p class="section-description">Lorem ipsum</p>
                        <p class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="col-4 single-column">
                        <p class="section-description">Lorem ipsum</p>
                        <p class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="col-4 single-column">
                        <p class="section-description">Lorem ipsum</p>
                        <p class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="col-4 single-column">
                        <p class="section-description">Lorem ipsum</p>
                        <p class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="col-4 single-column">
                        <p class="section-description">Lorem ipsum</p>
                        <p class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="col-4 single-column">
                        <p class="section-description">Lorem ipsum</p>
                        <p class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-7 container section-margin">
            <div class="row founders-row">
                <div class="col-6 left">
                    <p class="section-title">A Note from the Founders</p>
                    <div class="section-description">
                        <p>
                            “We started with a simple idea – to provide businesses of all sizes with flexible, scalable warehouse solutions that grow with them. 
                            We know firsthand the challenges of finding the right space, and our mission is to make that process seamless, efficient, and tailored to your needs.”
                        </p>

                        <br>

                        <p>
                            We believe every business, whether it’s just starting or scaling, deserves a space where it can thrive. Our team is committed to your success, 
                            and we’re excited to be part of your journey. Let’s build something great together.”
                        </p>
                    </div>
                    
                    <p class="signature">— The Founders Team</p>
                </div>

                <div class="col-6 right">
                    <img src="{{ asset('storage/frontend/founders-image.png') }}" alt="Founders" class="image">
                </div>
            </div>
        </div>

        <div class="section-8 container section-margin">
            <div class="row form-row">
                <div class="col-6">
                    <p class="section-title">Instant Access to Transparent Storage Pricing – Right in Your Inbox Now!
                    </p>
                    <p class="section-description">
                        Enter your details to receive a straightforward storage price list sent straight to you!
                    </p>

                    <form action="" method="POST">
                        <div class="mb-4">
                            <label for="name" class="form-label label">Name</label>
                            <input type="text" class="form-control input-field" id="name" name="name" placeholder="Please enter your name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label label">Email</label>
                            <input type="email" class="form-control input-field" id="email" name="email" placeholder="Ex: johnmercury@gmail.com" required>
                        </div>

                        <div class="form-check d-flex align-items-center mb-4">
                            <input type="checkbox" class="form-check-input checkbox" id="terms">
                            <label class="form-check-label terms" for="terms">I have read and agree to the Terms and Conditions of the platform.</label>
                        </div>

                        <button type="submit" class="submit-button">Submit Now</button>
                    </form>
                </div>

                <div class="col-6">
                    <img src="{{ asset('storage/frontend/video-placeholder.png') }}" alt="Video Coming Soon" class="image">

                    <!-- <video src="" class="video"></video> -->
                </div>
            </div>
        </div>

        <div class="section-9 container section-margin">
            <p class="section-title">Trusted by Many, See What Our Customers Think</p>
            <p class="section-description">
                See why our customers love us! Feedback from those who trust us with their business needs.
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

        <div class="section-10 section-margin">
            <p class="text">
                A network that provides smooth access to and from every<br>
                corner of the world, anytime.
            </p>
        </div>

        <div class="section-11 container">
            <div class="row">
                <div class="col-6">
                    <p class="section-title">Have questions?</p>
                    <p class="section-description">
                        We’ve compiled answers to the most common inquiries.<br>
                        Browse through our FAQs for quick and easy information.<br>
                        If you need further assistance, feel free to reach out!
                    </p>
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
    </div>
@endsection

@push('after-scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
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