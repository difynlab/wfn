@extends('frontend.layouts.app')

@section('title', 'Log In')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
@endpush

@section('content')
    <div class="container page-global page-auth login">
        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4 left">
                @if($contents->{'login_image_' . $middleware_language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'login_image_' . $middleware_language}) }}" alt="Log In" class="image">
                @elseif($contents->login_image_en)
                    <img src="{{ asset('storage/backend/pages/' . $contents->login_image_en) }}" alt="Log In" class="image">
                @else
                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Log In" class="image">
                @endif
            </div>

            <div class="col-12 col-lg-7 col-xl-8 right">
                <p class="title">{{ $contents->{'login_title_' . $middleware_language} ?? $contents->login_title_en }}</p>
                <p class="description">{{ $contents->{'login_description_' . $middleware_language} ?? $contents->login_description_en }}</p>

                <form action="{{ route('login.store') }}" method="POST" class="form">
                    @csrf
                    <div class="mb-3 mb-md-4">
                        <label for="email" class="form-label label">{{ $contents->{'login_username_' . $middleware_language} ?? $contents->login_username_en }}</label>
                        <input type="email" class="form-control input-field" id="email" name="email" value="{{ old('email') }}" placeholder="{{ $contents->{'login_username_placeholder_' . $middleware_language} ?? $contents->login_username_placeholder_en }}" required>
                        <x-backend.input-error field="email"></x-backend.input-error>
                    </div>

                    <div class="mb-3 mb-md-4 position-relative">
                        <label for="password" class="form-label label">{{ $contents->{'login_password_' . $middleware_language} ?? $contents->login_password_en }}</label>
                        <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * *" required>
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-6">
                            <div class="form-check d-flex align-items-center mb-0">
                                <input type="checkbox" class="form-check-input checkbox" id="remember">
                                <label class="form-check-label remember" for="remember">{{ $contents->{'login_remember_' . $middleware_language} ?? $contents->login_remember_en }}</label>
                            </div>
                        </div>

                        <div class="col-6 text-end">
                            <a href="{{ route('forgot-password') }}" class="forgot-password">{{ $contents->{'login_forgot_password_' . $middleware_language} ?? $contents->login_forgot_password_en }}</a>
                        </div>
                    </div>
                    
                    <button type="submit" class="submit-button">{{ $contents->{'login_button_' . $middleware_language} ?? $contents->login_button_en }}</button>
                </form>

                <p class="text">{{ $contents->{'login_no_account_' . $middleware_language} ?? $contents->login_no_account_en }}
                    <a href="{{ route('register') }}" class="span-link">{{ $contents->{'login_register_' . $middleware_language} ?? $contents->login_register_en }}</a>
                </p>
            </div>
        </div>

        <x-frontend.notification></x-frontend.notification>
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