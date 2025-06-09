@extends('frontend.layouts.app')

@section('title', 'Confirm Booking')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/confirm-booking.css') }}">
@endpush

@section('content')
    <div class="confirm-booking page-global">
        <div class="section-1 container section-margin">
            <p class="page-title">Confirm Booking</p>
            <p class="page-description">
                Review your booking details and confirm your reservation.
            </p>
        </div>

        <div class="section-2 container section-margin">
            <div class="row">
                <div class="col-6 left">
                    <div class="top-box">
                        <div class="property">
                            <img src="{{ asset('storage/frontend/sw-1.png') }}" alt="Image" class="image">

                            <div class="details">
                                <p class="title">Al-Falah Distribution Center</p>
                                <p class="subtitle">Entire Blog (25,000 sq ft)</p>

                                <div class="rating">
                                    <i class="bi bi-star-fill"></i>
                                    <span class="value">4.50</span>
                                    <span class="count">(91 reviews)</span>
                                </div>
                            </div>
                        </div>

                        <div class="price-details">
                            <p class="title">Price Details</p>

                            <div class="single-price">
                                <p class="text">Lorem ipsum dolor</p>
                                <p class="price">SAR 13,250.62</p>
                            </div>

                            <div class="single-price">
                                <p class="text">Duis aute irure</p>
                                <p class="price">SAR 2,994.72</p>
                            </div>

                            <hr>

                            <div class="single-price total">
                                <p class="text">Total (USD)</p>
                                <p class="price">SAR 16,273.90</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bottom-box">
                        <p class="title">Booking Details</p>

                        <div class="single-booking">
                            <div class="details">
                                <p class="label">Reserved Duration</p>
                                <p class="value">Mar 5 – Jun 5</p>
                            </div>

                            <a href="#" class="edit">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                        </div>

                        <hr>

                        <div class="single-booking">
                            <div class="details">
                                <p class="label">Lot Details</p>
                                <p class="value">Lorem ipsum dolor</p>
                            </div>

                            <a href="#" class="edit">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                        </div>

                        <hr>

                        <div class="single-booking">
                            <div class="details">
                                <p class="label">Reserved Duration</p>
                                <p class="value">Mar 5 – Jun 5</p>
                            </div>

                            <a href="#" class="edit">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-6 right">
                    <div class="box">
                        <p class="title">Sign in or sign up to proceed with your booking.</p>

                        <form action="" class="form">
                            <div class="mb-4">
                                <label for="email" class="form-label label">Email Address</label>
                                <input type="email" class="form-control input-field" id="email" name="email" placeholder="Please enter your email address" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label label">Password</label>
                                <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * *" required>
                            </div>

                            <div class="row align-items-center mb-4">
                                <div class="col-6">
                                    <div class="form-check d-flex align-items-center">
                                        <input type="checkbox" class="form-check-input checkbox" id="remember">
                                        <label class="form-check-label remember" for="remember">Remember Me</label>
                                    </div>
                                </div>

                                <div class="col-6 text-end">
                                    <a href="{{ route('frontend-auth.forgot-password') }}" class="forgot-password">Forgot Password?</a>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn login-button">Continue</button>
                        </form>

                        <a href="{{ route('frontend-auth.register') }}" class="register-button">
                            <i class="bi bi-envelope"></i>
                            Register with Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection