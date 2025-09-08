@extends('frontend.layouts.app')

@section('title', 'Register')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
@endpush

@section('content')
    <div class="container page-global page-auth register">
        <p class="title">{{ $contents->{'register_title_' . $middleware_language} ?? $contents->register_title_en }}</p>
        <p class="description">{{ $contents->{'register_description_' . $middleware_language} ?? $contents->register_description_en }}</p>

        <form action="{{ route('register') }}" method="POST" id="form">
            @csrf

            <div class="row mb-3 mb-md-4">
                <div class="col-6 col-lg-3">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input radio" type="radio" name="role" id="flexRadioDefault1" value="tenant" checked required>
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
                    <label for="firstName" class="form-label label">{{ $contents->{'register_first_name_' . $middleware_language} ?? $contents->register_first_name_en }}<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="firstName" name="first_name" value="{{ old('first_name') }}" placeholder="{{ $contents->{'register_first_name_placeholder_' . $middleware_language} ?? $contents->register_first_name_placeholder_en }}" required>
                    <x-frontend.input-error field="first_name"></x-frontend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <label for="lastName" class="form-label label">{{ $contents->{'register_last_name_' . $middleware_language} ?? $contents->register_last_name_en }}<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="lastName" name="last_name" value="{{ old('last_name') }}" placeholder="{{ $contents->{'register_last_name_placeholder_' . $middleware_language} ?? $contents->register_last_name_placeholder_en }}" required>
                    <x-frontend.input-error field="last_name"></x-frontend.input-error>
                </div>
            </div>

            <div class="row mb-0 mb-md-4">
                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <label for="email" class="form-label label">{{ $contents->{'register_email_' . $middleware_language} ?? $contents->register_email_en }}<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="email" name="email" value="{{ old('email') }}" placeholder="{{ $contents->{'register_email_placeholder_' . $middleware_language} ?? $contents->register_email_placeholder_en }}" required>
                    <x-frontend.input-error field="email"></x-frontend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <label class="form-label label">{{ $contents->{'register_country_' . $middleware_language} ?? $contents->register_country_en }}<span class="asterisk">*</span></label>
                    <select class="form-select js-single input-field" id="country" name="country" required>
                        <option value="">{{ $contents->{'register_country_placeholder_' . $middleware_language} ?? $contents->register_country_placeholder_en }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="country"></x-backend.input-error>
                </div>
            </div>

            <div class="row mb-0 mb-md-4">
                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <label for="phone" class="form-label label">{{ $contents->{'register_phone_' . $middleware_language} ?? $contents->register_phone_en }}<span class="asterisk">*</span></label>
                    <div class="phone-div">
                        <input type="text" class="form-control input-field" id="phone_code" name="phone_code" placeholder="+XXX" value="{{ old('phone_code') }}" readonly required>
                        
                        <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="{{ $contents->{'register_phone_placeholder_' . $middleware_language} ?? $contents->register_phone_placeholder_en }}" value="{{ old('phone') }}" required>
                    </div>
                    <x-frontend.input-error field="phone"></x-frontend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <label for="city" class="form-label label">{{ $contents->{'register_city_' . $middleware_language} ?? $contents->register_city_en }}<span class="asterisk">*</span></label>
                    <select class="form-select js-single input-field" name="city" placeholder="{{ $contents->{'register_city_placeholder_' . $middleware_language} ?? $contents->register_city_placeholder_en }}" required>
                    </select>
                    <x-backend.input-error field="city"></x-backend.input-error>
                </div>
            </div>

            <div class="row mb-0 mb-md-4">
                <div class="col-12 mb-3 mb-md-0 col-md-6">
                    <div class="position-relative">
                        <label for="password" class="form-label label">{{ $contents->{'register_password_' . $middleware_language} ?? $contents->register_password_en }}<span class="asterisk">*</span></label>
                        <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * *" required>
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="password"></x-backend.input-error>
                    </div>
                </div>

                <div class="col-12 mb-4 mb-md-0 col-md-6">
                    <div class="position-relative">
                        <label for="passwordConfirmation" class="form-label label">{{ $contents->{'register_confirm_password_' . $middleware_language} ?? $contents->register_confirm_password_en }}<span class="asterisk">*</span></label>
                        <input type="password" class="form-control input-field" id="passwordConfirmation" name="password_confirmation" placeholder="* * * * * * *" required/>
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="password_confirmation"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
            
            <button type="submit" class="submit-button">{{ $contents->{'register_button_' . $middleware_language} ?? $contents->register_button_en }}</button>

            <p class="text">{{ $contents->{'register_have_account_' . $middleware_language} ?? $contents->register_have_account_en }}
                <a href="{{ route('login') }}" class="span-link">{{ $contents->{'register_login_' . $middleware_language} ?? $contents->register_login_en }}</a>
            </p>
        </form>

        <x-frontend.notification></x-frontend.notification>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/recaptcha.js') }}"></script>

    <script>
        window.recaptchaAction = 'register';
    </script>

    <script>
        $(document).ready(function() {
            $('.js-single').select2();
        });

        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");

            if ($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });

        $('#email').on('blur', function () {
            const email = $(this).val();
            const $error = $(this).next('.error-message');

            $error.remove();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if(!emailRegex.test(email)) {
                $(this).after('<div class="error-message">Please enter a valid email address.</div>');
            }
        });

        $('#phone').on('blur', function () {
            const phone = $(this).val();
            const $error = $(this).parent().next('.error-message');

            $error.remove();
            const phoneRegex = /^\d{9}$/;

            if(!phoneRegex.test(phone)) {
                $(this).parent().after('<div class="error-message">Phone number must be exactly 9 digits.</div>');
            }
        });
    </script>

    <script>
        function fetchCities(country, selectedCity = '') {
            if(!country) return;

            $.ajax({
                url: 'https://countriesnow.space/api/v0.1/countries/cities',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(
                    { country: country }
                ),
                success: function (response) {
                    if(response.error === false) {
                        const citySelect = $('select[name="city"]');
                        citySelect.empty();
                        citySelect.append('<option value="">Select city</option>');

                        $.each(response.data, function (index, city) {
                            const selected = city === selectedCity ? 'selected' : '';
                            citySelect.append(`<option value="${city}" ${selected}>${city}</option>`);
                        });
                    }
                    else {
                        console.error("No cities found.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching cities:", error);
                }
            });

            $.ajax({
                url: 'https://countriesnow.space/api/v0.1/countries/codes',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(
                    { country: country }
                ),
                success: function (response) {
                    if(response.error === false) {
                        $('#phone_code').val(response.data['dial_code']);
                    }
                    else {
                        console.error("No code found.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching code:", error);
                }
            });
        }

        $(document).ready(function () {
            let initialCountry = $('#country').val();
            let initialCity = '{{ old("city" ?? "") }}';

            if(initialCountry) {
                fetchCities(initialCountry, initialCity);
            }

            $('#country').on('change', function () {
                let selectedCountry = $(this).val();
                fetchCities(selectedCountry);
            });
        });
    </script>
@endpush