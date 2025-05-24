@extends('frontend.layouts.app')

@section('title', 'Register')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
@endpush

@section('content')

    <div class="container page-global register">
        <p class="title">User Registration Form</p>
        <p class="description">Fill out this quick form and get started with your complete experience with us.</p>

        <form action="">
            <div class="row mb-4">
                <div class="col-3">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input radio" type="radio" name="role" id="flexRadioDefault1" value="tenant" checked>
                        <label class="form-check-label radio-label" for="flexRadioDefault1">
                            Register as a tenant
                        </label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input radio" type="radio" name="role" id="flexRadioDefault2" value="landlord">
                        <label class="form-check-label radio-label" for="flexRadioDefault2">
                            Register as a landlord
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="firstName" class="form-label label">First Name</label>
                    <input type="text" class="form-control input-field" id="firstName" name="first_name" placeholder="Please enter your first name" required>
                </div>

                <div class="col-6">
                    <label for="lastName" class="form-label label">Last Name</label>
                    <input type="text" class="form-control input-field" id="lastName" name="last_name" placeholder="Please enter your last name" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-4">
                    <label for="email" class="form-label label">Email Address</label>
                    <input type="text" class="form-control input-field" id="email" name="email" placeholder="Ex: johnmercury@gmail.com" required>
                </div>

                <div class="col-4">
                    <label for="phone" class="form-label label">Phone Number</label>
                    <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="Eg: 999 999 9999" required>
                </div>

                <div class="col-4">
                    <label for="city" class="form-label label">Phone Number</label>
                    <input type="text" class="form-control input-field" id="city" name="city" placeholder="Please enter your city" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="password" class="form-label label">Password</label>
                    <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * *" required>
                </div>

                <div class="col-6">
                    <label for="passwordConfirmation" class="form-label label">Password Confirmation</label>
                    <input type="password" class="form-control input-field" id="passwordConfirmation" name="password_confirmation" placeholder="* * * * * * *" required/>
                </div>
            </div>

            <button type="submit" class="btn register-button">Register Now</button>

            <p class="exist-account">Already have an account?
                <a href="{{ route('frontend-auth.login') }}" class="span-link">Login</a>
            </p>
        </form>
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