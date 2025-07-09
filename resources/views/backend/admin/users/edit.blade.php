@extends('backend.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">User Details</p>
                <p class="description">View or update user details. Save changes to apply.</p>
            </div>

            <div class="row">
                <div class="col-6 mb-4">
                    <label for="first_name" class="form-label label">First Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name) }}" required>
                    <x-backend.input-error field="first_name"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="last_name" class="form-label label">Last Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}" required>
                    <x-backend.input-error field="last_name"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                    <input type="email" class="form-control input-field" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                    <x-backend.input-error field="email"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label class="form-label label">Country<span class="asterisk">*</span></label>
                    <select class="form-select js-single input-field" id="country" name="country" required>
                        <option value="">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ old('country', $user->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="country"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="phone" class="form-label label">Phone<span class="asterisk">*</span></label>
                    <div class="phone-div">
                        <input type="text" class="form-control input-field" id="phone_code" name="phone_code" placeholder="+XXX" value="{{ old('phone_code', $user->phone_code) }}" readonly required>
                        
                        <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="5X XXX XXXX" value="{{ old('phone', $user->phone) }}" required>
                    </div>
                    <x-backend.input-error field="phone"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="address" class="form-label label">Address<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="address" name="address" placeholder="Address" value="{{ old('address', $user->address) }}" required>
                    <x-backend.input-error field="address"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="city" class="form-label label">City<span class="asterisk">*</span></label>
                    <select class="form-select js-single input-field" name="city" required>
                    </select>
                    <x-backend.input-error field="city"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label class="form-label label">Role<span class="asterisk">*</span></label>
                    <select class="form-select input-field" id="role" name="role" required>
                        <option value="">Select role</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="landlord" {{ old('role', $user->role) == 'landlord' ? 'selected' : '' }}>Landlord</option>
                        <option value="tenant" {{ old('role', $user->role) == 'tenant' ? 'selected' : '' }}>Tenant</option>
                    </select>
                    <x-backend.input-error field="role"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4 position-relative">
                    <label for="password" class="form-label label">Password</label>
                    <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * * *">
                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                    <x-backend.input-error field="password"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4 position-relative">
                    <label for="confirm_password" class="form-label label">Confirm Password</label>
                    <input type="password" class="form-control input-field" id="confirm_password" name="confirm_password" placeholder="* * * * * * * *">
                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                    <x-backend.input-error field="confirm_password"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_image" old_value="{{ $user->image ?? old('image') }}" new_name="new_image" path="users" label="User"></x-backend.upload-image>
                    <x-backend.input-error field="new_image"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$user"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

    <x-backend.modal-image-preview></x-backend.modal-image-preview>
@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>

    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");
            
            if($(this).prev().attr("type") == "password") {
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
            let initialCity = '{{ old("city", $user->city ?? "") }}';

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