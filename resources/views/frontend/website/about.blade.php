@extends('frontend.layouts.app')

@section('title', 'About')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
@endpush

@section('content')
<div class="aboutpage">

    <div class="section-1 container">
        <p class="title">About</p>
        <p class="description">
            We make storage easy and accessible with transparent pricing and flexible options.
            Whether it’s seasonal items, business supplies, or personal belongings, we keep your things safe and secure,
            ready for you whenever you need them.
        </p>
        <div class="row story-block">
            <div class="col-md-5">
                <img src="{{ asset('storage/frontend/about-us.png') }}" alt="Our Story">
            </div>
            <div class="col-md-7">
                <h2 class="section-title">Our Story</h2>
                <p class="section-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </p>
                <p class="section-description">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="row stats-row text-center mt-4">
                    <div class="col-md-4 stat-box">
                        <h3 class="text-red">2100+</h3>
                        <p class="text-muted">Lorem ipsum</p>
                    </div>
                    <div class="col-md-4 stat-box">
                        <h3 class="text-red">17+</h3>
                        <p class="text-muted">Years of Experience</p>
                    </div>
                    <div class="col-md-4 stat-box">
                        <h3 class="text-red">2100+</h3>
                        <p class="text-muted">Lorem ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section-2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h3 class="section-title">Our Value</h3>
                    <p class="section-description">Where Your Growth Meets Opportunity</p>
                </div>
                <div class="col-md-6">
                    <h3 class="section-title">From startups to enterprises, we grow with you.</h3>
                    <p class="section-description">
                        Every business, big or small, deserves a space that adapts and evolves.
                        We’re here to provide flexible warehouse solutions that scale alongside your success.
                    </p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <h3 class="section-title">Our Mission</h3>
                    <p class="section-description">Bridging the Gap Between You and the Perfect Space</p>
                </div>
                <div class="col-md-6">
                    <h3 class="section-title">We make storage accessible for all anytime.</h3>
                    <p class="section-description">
                        Our platform makes finding the right warehouse space effortless,
                        empowering you with the tools to manage logistics and streamline
                        operations without the hassle anytime.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="section-title">Our Vision</h3>
                    <p class="section-description">Empowering Businesses to Thrive in a Boundless Future</p>
                </div>
                <div class="col-md-6">
                    <h3 class="section-title">Every business deserves the space to thrive.</h3>
                    <p class="section-description">
                        We believe in breaking down barriers to growth. Our vision is to provide
                        every business, no matter its size, with the warehouse space it needs to
                        reach new heights.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="section-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">Who Can Use Warehouse Exchange?</h2>
                    <p class="section-description">
                        Our Warehouse Exchange lets you easily access a variety of spaces,
                        whether you’re a business in need of inventory storage, or someone
                        seeking a safe place for personal belongings. With options to rent,
                        exchange, or share warehouse spaces, you can quickly find the perfect
                        match that meets your specific needs.
                    </p>
                    <p class="section-description">
                        Whether it’s for short-term business storage, long-term personal use, or
                        anything in between, our platform is designed to make warehouse
                        exchanges seamless and hassle-free.
                    </p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
                <div class="col-md-6">
                    <div class="exchange-box">
                        <div class="box-header">
                            <i class="bi bi-briefcase icon"></i>
                            <span class="label">Business Storages</span>
                        </div>
                        <img src="{{ asset('storage/frontend/business-storage.png') }}" alt="Business Storage">
                    </div>
                    <div class="exchange-box">
                        <div class="box-header">
                            <i class="bi bi-person icon"></i>
                            <span class="label">Personal Storages</span>
                        </div>
                        <img src="{{ asset('storage/frontend/personal-storage.png') }}" alt="Personal Storage">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section-4 container">
        <div class="row">
            <div class="col-md-6">
                <div class="video-box">
                    <img src="{{ asset('storage/frontend/video-placeholder.png') }}" alt="Video Coming Soon">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="section-title">How the Procedure Works?</h2>
                <p class="section-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="procedure-steps">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <span class="step-number">1</span>
                        </div>
                        <div class="col">
                            <span>Register</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <span class="step-number">2</span>
                        </div>
                        <div class="col">
                            <span>Search for Space</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <span class="step-number">3</span>
                        </div>
                        <div class="col">
                            <span>Receive Quotes</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <span class="step-number">4</span>
                        </div>
                        <div class="col">
                            <span>Make Payment</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <span class="step-number">5</span>
                        </div>
                        <div class="col">
                            <span>Space is Yours</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="section-5">
        <div class="container">
            <h2 class="section-title">Lorem ipsum</h2>
            <div class="row gx-5 gy-4">
                <div class="col-4">
                    <h4 class="section-description">Lorem ipsum</h4>
                    <p class="section-paragraph">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="section-description">Lorem ipsum</h4>
                    <p class="section-paragraph">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="section-description">Lorem ipsum</h4>
                    <p class="section-paragraph">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="section-description">Lorem ipsum</h4>
                    <p class="section-paragraph">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="section-description">Lorem ipsum</h4>
                    <p class="section-paragraph">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="section-description">Lorem ipsum</h4>
                    <p class="section-paragraph">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="section-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">A Note from the Founders</h2>
                    <p class="section-description">
                        “We started with a simple idea – to provide businesses of all sizes with flexible, scalable warehouse solutions that grow with them. 
                        We know firsthand the challenges of finding the right space, and our mission is to make that process seamless, efficient, and tailored to your needs.”
                    </p>
                    <p class="section-description">
                        We believe every business, whether it’s just starting or scaling, deserves a space where it can thrive. Our team is committed to your success, 
                        and we’re excited to be part of your journey. Let’s build something great together.”
                    </p>
                    <p class="founder-signature">— The Founders Team</p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('storage/frontend/founders-image.png') }}" alt="Founders">
                </div>
            </div>
        </div>
    </div>


    <div class="section-7">
        <div class="container">
            <div class="form-wrapper">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="form-title">
                            Instant Access to Transparent<br>
                            Storage Pricing – Right in Your Inbox Now!
                        </h2>
                        <p class="form-subtitle">
                            Enter your details to receive a straightforward storage price list sent straight to you!
                        </p>

                        <form class="pricing-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Please enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Ex: johnmercury@gmail.com">
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms">
                                <label class="form-check-label" for="terms">
                                    I have read and agree to the Terms and Conditions of the platform.
                                </label>
                            </div>
                            <button type="submit" class="submit-btn">Submit Now</button>
                        </form>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="video-placeholder">
                            <img src="{{ asset('storage/frontend/video-placeholder.png') }}" alt="Video Coming Soon" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section-8">
        <div class="container text-center">
            <h2 class="section-title">Trusted by Many, See What Our Customers Think</h2>
            <p class="section-description">
                See why our customers love us! Feedback from those who trust us with their business needs.
            </p>
            <div class="row justify-content-center mt-5">
                <div class="col-6">
                    <div class="testimonial-card d-flex flex-wrap rounded">
                        <div class="testimonial-content p-4 col-6">
                            <div class="stars mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <p class="testimonial-author mt-3">
                                <strong>Danial Mark</strong> <span class="role">| Marketing Coordinator</span>
                            </p>
                        </div>
                        <div class="testimonial-image col-6 p-0">
                            <img src="{{ asset('storage/frontend/testimonial-1.png') }}" alt="Customer 1">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="testimonial-card d-flex flex-wrap rounded">
                        <div class="testimonial-content p-4 col-6">
                            <div class="stars mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <p class="testimonial-author mt-3">
                                <strong>Danial Mark</strong> <span class="role">| Marketing Coordinator</span>
                            </p>
                        </div>
                        <div class="testimonial-image col-6 p-0">
                            <img src="{{ asset('storage/frontend/testimonial-2.png') }}" alt="Customer 2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-dots mt-4">
                <span class="dot"></span>
                <span class="dot active"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>


    <div class="section-9">
        <img src="{{ asset('storage/frontend/network-bg.png') }}" alt="Network Background" class="network-bg-img">
        <div class="overlay-content container text-center">
            <h2 class="network-text">
                A network that provides smooth access to and from every<br>
                corner of the world, anytime.
            </h2>
        </div>
    </div>


    <div class="section-10">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="section-title">Have questions?</h3>
                    <p class="section-description">
                        We’ve compiled answers to the most common inquiries.<br>
                        Browse through our FAQs for quick and easy information.<br>
                        If you need further assistance, feel free to reach out!
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="bi bi-dash text-red me-2"></i> Lorem ipsum dolor sit amet consectetur?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="bi bi-plus-lg text-muted me-2"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="bi bi-plus-lg text-muted me-2"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
