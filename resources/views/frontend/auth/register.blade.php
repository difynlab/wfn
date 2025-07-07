@extends('frontend.layouts.app')

@section('title', 'Register')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
@endpush

@section('content')
    <div class="container page-global register">
        <p class="title">{{ $contents->{'register_title_' . $middleware_language} ?? $contents->register_title_en }}</p>
        <p class="description">{{ $contents->{'register_description_' . $middleware_language} ?? $contents->register_description_en }}</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="row mb-3 mb-md-4">
                <div class="col-6 col-lg-3">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input radio" type="radio" name="role" id="flexRadioDefault1" value="tenant" {{ old('role') == 'tenant' ? 'checked' : '' }} required>
                        <label class="form-check-label radio-label" for="flexRadioDefault1">
                            {{ $contents->{'register_agent_' . $middleware_language} ?? $contents->register_agent_en }}
                        </label>
                    </div>
                    <x-frontend.input-error field="role"></x-frontend.input-error>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input radio" type="radio" name="role" id="flexRadioDefault2" value="landlord" {{ old('role') == 'landlord' ? 'checked' : '' }} required>
                        <label class="form-check-label radio-label" for="flexRadioDefault2">
                            {{ $contents->{'register_company_' . $middleware_language} ?? $contents->register_company_en }}
                        </label>
                    </div>
                    <x-frontend.input-error field="role"></x-frontend.input-error>
                </div>
            </div>

            <div class="row mb-0 mb-md-4">
                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <label for="firstName" class="form-label label">{{ $contents->{'register_first_name_' . $middleware_language} ?? $contents->register_first_name_en }}</label>
                    <input type="text" class="form-control input-field" id="firstName" name="first_name" value="{{ old('first_name') }}" placeholder="{{ $contents->{'register_first_name_placeholder_' . $middleware_language} ?? $contents->register_first_name_placeholder_en }}" required>
                    <x-frontend.input-error field="first_name"></x-frontend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <label for="lastName" class="form-label label">{{ $contents->{'register_last_name_' . $middleware_language} ?? $contents->register_last_name_en }}</label>
                    <input type="text" class="form-control input-field" id="lastName" name="last_name" value="{{ old('last_name') }}" placeholder="{{ $contents->{'register_last_name_placeholder_' . $middleware_language} ?? $contents->register_last_name_placeholder_en }}" required>
                    <x-frontend.input-error field="last_name"></x-frontend.input-error>
                </div>
            </div>

            <div class="row mb-0 mb-md-4">
                <div class="col-12 mb-3 mb-md-0 col-md-4">
                    <label for="email" class="form-label label">{{ $contents->{'register_email_' . $middleware_language} ?? $contents->register_email_en }}</label>
                    <input type="text" class="form-control input-field" id="email" name="email" value="{{ old('email') }}" placeholder="{{ $contents->{'register_email_placeholder_' . $middleware_language} ?? $contents->register_email_placeholder_en }}" required>
                    <x-frontend.input-error field="email"></x-frontend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4">
                    <label for="phone" class="form-label label">{{ $contents->{'register_phone_' . $middleware_language} ?? $contents->register_phone_en }}</label>
                    <input type="text" class="form-control input-field" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ $contents->{'register_phone_placeholder_' . $middleware_language} ?? $contents->register_phone_placeholder_en }}" required>
                    <x-frontend.input-error field="phone"></x-frontend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4">
                    <label for="city" class="form-label label">{{ $contents->{'register_city_' . $middleware_language} ?? $contents->register_city_en }}</label>
                    <input type="text" class="form-control input-field" id="city" name="city" value="{{ old('city') }}" placeholder="{{ $contents->{'register_city_placeholder_' . $middleware_language} ?? $contents->register_city_placeholder_en }}" required>
                </div>
            </div>

            <div class="row mb-0 mb-md-4">
                <div class="col-12 mb-3 mb-md-0 col-md-6 position-relative">
                    <label for="password" class="form-label label">{{ $contents->{'register_password_' . $middleware_language} ?? $contents->register_password_en }}</label>
                    <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * *" required>
                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                    <x-backend.input-error field="password"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4 mb-md-0 col-md-6 position-relative">
                    <label for="passwordConfirmation" class="form-label label">{{ $contents->{'register_confirm_password_' . $middleware_language} ?? $contents->register_confirm_password_en }}</label>
                    <input type="password" class="form-control input-field" id="passwordConfirmation" name="password_confirmation" placeholder="* * * * * * *" required/>
                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                    <x-backend.input-error field="password_confirmation"></x-backend.input-error>
                </div>
            </div>

            <button type="submit" class="btn register-button">{{ $contents->{'register_button_' . $middleware_language} ?? $contents->register_button_en }}</button>

            <p class="exist-account">{{ $contents->{'register_have_account_' . $middleware_language} ?? $contents->register_have_account_en }}
                <a href="{{ route('login') }}" class="span-link">{{ $contents->{'register_login_' . $middleware_language} ?? $contents->register_login_en }}</a>
            </p>
        </form>

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