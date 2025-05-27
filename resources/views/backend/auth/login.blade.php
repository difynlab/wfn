@extends('frontend.layouts.app')

@section('title', 'Log In')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
@endpush

@section('content')

    <div class="container page-global login">
        <div class="row">
            <div class="col-4 left">
                <img src="{{ asset('storage/frontend/login.jpg') }}" alt="Log In" class="image">
            </div>

            <div class="col-8 right">
                <p class="title">Get Started Now</p>
                <p class="description">Log in to access portal, track progress, and manage requests</p>

                <form action="">
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
                    
                    <button type="submit" class="btn login-button">Login Now</button>
                </form>

                <p class="no-account">Don't have an account?
                    <a href="{{ route('frontend-auth.register') }}" class="span-link">Register here</a>
                </p>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");

            if ($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush