@extends('backend.layouts.guest')

@section('title', 'Log In')

@section('content')
    <form action="{{ route('backend.login.store') }}" method="POST" class="form">
        @csrf

        <p class="title">Get Started Now</p>
        <p class="description">Log in to access portal, track progress, and manage requests</p>

        <div class="mb-4 mb-md-5">
            <label for="email" class="form-label label">Email Address</label>
            <input type="email" class="form-control input-field" id="email" name="email" value="{{ old('email') }}" placeholder="Please enter your email address" required>
            <x-backend.input-error field="email"></x-backend.input-error>
        </div>

        <div class="mb-3 mb-md-4 position-relative">
            <label for="password" class="form-label label">Password</label>
            <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * *" required>
            <span class="bi bi-eye-slash-fill toggle-password"></span>
        </div>

        <div class="row align-items-center mb-4 mb-md-5">
            <div class="col-6">
                <div class="form-check d-flex align-items-center">
                    <input type="checkbox" class="form-check-input checkbox" id="remember">
                    <label class="form-check-label remember" for="remember">Remember Me</label>
                </div>
            </div>

            <div class="col-6 text-end">
                <a href="{{ route('backend.forgot-password') }}" class="forgot-password">Forgot Password?</a>
            </div>
        </div>
        
        <button type="submit" class="btn button">Login Now</button>
    </form>
@endsection

@push('after-scripts')
    <script>
        $(".toggle-password").on('click', function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");

            if($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush