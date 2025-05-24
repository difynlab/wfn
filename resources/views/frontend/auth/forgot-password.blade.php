@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}">
@endpush

@section('content')
    
    <div class="container page-global forgot-password">
        <div class="row justify-content-center">
            <div class="col-5">
                <p class="title">Forgot Your Password</p>
                <p class="description">Don't worry! Resetting your password is easy. Just type in the email you registered to Warehouse Exchange.</p>

                <form action="">
                    <div class="mb-4">
                        <label for="email" class="form-label label">Email Address</label>
                        <input type="email" class="form-control input-field" id="email" name="email" placeholder="Please enter your email address" required>
                    </div>

                    <button type="submit" class="btn forgot-password-button">Send Now</button>
                </form>

                <p class="remember-password">Did you remember your password?
                    <a href="{{ route('frontend-auth.login') }}" class="span-link">Login</a>
                </p>
            </div>
        </div>
    </div>

@endsection