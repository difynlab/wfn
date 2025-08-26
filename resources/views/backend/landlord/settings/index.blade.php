@extends('backend.layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="inner-page">
        <div class="row align-items-center mb-3 mb-md-4">
            <div class="col-12">
                <p class="inner-page-top-title">Settings</p>
                <p class="inner-page-top-description">Manage your account and adjust settings to optimize your workflow.</p>
            </div>
        </div>

        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ !session('active_tab') ? 'active' : '' }}" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ session('active_tab') == 'company' ? 'active' : '' }}" id="pills-company-tab" data-bs-toggle="pill" data-bs-target="#pills-company" type="button" role="tab" aria-controls="pills-company" aria-selected="false">Company</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ session('active_tab') == 'password' ? 'active' : '' }}" id="pills-update-password-tab" data-bs-toggle="pill" data-bs-target="#pills-update-password" type="button" role="tab" aria-controls="pills-update-password" aria-selected="false">Update Password</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade {{ !session('active_tab') ? 'show active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <p class="tab-content-title">Profile Settings</p>

                <form action="{{ route('landlord.settings.profile', $user) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf

                    <div class="row mb-3 mb-md-4">
                        <div class="col-12 col-md-6 mb-3 mb-md-4">
                            <label for="first_name" class="form-label label">First Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name) }}" required>
                        </div>

                        <div class="col-12 col-md-6 mb-3 mb-md-4">
                            <label for="last_name" class="form-label label">Last Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}" required>
                        </div>

                        <div class="col-12 col-md-6 mb-3 mb-md-4">
                            <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                            <input type="email" class="form-control input-field" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                            <x-backend.input-error field="email"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-md-6 mb-3 mb-md-4">
                            <label for="phone" class="form-label label">Phone</label>
                            <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                            <x-backend.input-error field="phone"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-md-6 mb-3 mb-md-4">
                            <label for="address" class="form-label label">Address</label>
                            <input type="text" class="form-control input-field" id="address" name="address" placeholder="Address" value="{{ old('address', $user->address) }}">
                            <x-backend.input-error field="address"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-md-6 mb-3 mb-md-4">
                            <label for="city" class="form-label label">City</label>
                            <input type="text" class="form-control input-field" id="city" name="city" placeholder="City" value="{{ old('city', $user->city) }}">
                            <x-backend.input-error field="city"></x-backend.input-error>
                        </div>

                        <div class="col-12 mb-3 mb-md-4">
                            <label for="country" class="form-label label">Country</label>
                            <select class="form-control form-select input-field" name="country">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country }}" {{ old('country', $user->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <x-backend.upload-image old_name="old_image" old_value="{{ $user->image ?? old('image') }}" new_name="new_image" path="users" label="Profile"></x-backend.upload-image>
                            <x-backend.input-error field="new_image"></x-backend.input-error>
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Save Changes</button>
                </form>
            </div>

            <div class="tab-pane fade {{ session('active_tab') == 'company' ? 'show active' : '' }}" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab" tabindex="0">
                <p class="tab-content-title">Company Details</p>
                
                <form action="{{ route('landlord.settings.company', [$user, $company]) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    
                    <div class="row mb-3 mb-md-4">
                        <div class="col-12 mb-3 mb-md-4">
                            <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="name" name="name" placeholder="Name" value="{{ old('name', $company->name) }}" required>
                            <x-backend.input-error field="name"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="address" class="form-label label">Address<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="address" name="address" placeholder="Address" value="{{ old('address', $company->address) }}" required>
                            <x-backend.input-error field="address"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="cr_number" class="form-label label">CR Number (10 Digits)<span class="asterisk">*</span></label>
                            <input type="number" class="form-control input-field" id="cr_number" name="cr_number" placeholder="CR Number" value="{{ old('cr_number', $company->cr_number) }}" required>
                            <x-backend.input-error field="cr_number"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                            <input type="email" class="form-control input-field" id="company_email" name="email" placeholder="Email" value="{{ old('email', $company->email) }}" required>
                            <x-backend.input-error field="email"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="phone" class="form-label label">Phone<span class="asterisk">*</span></label>
                            <div class="phone-div">
                                <input type="text" class="form-control input-field" id="phone_code" name="phone_code" placeholder="+XXX" value="{{ old('phone_code', $company->phone_code) }}" required>
                                
                                <input type="text" class="form-control input-field" id="company_phone" name="phone" placeholder="5X XXX XXXX" value="{{ old('phone', $company->phone) }}" required>
                            </div>
                            <x-backend.input-error field="phone"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="website" class="form-label label">Website</label>
                            <input type="text" class="form-control input-field" id="website" name="website" placeholder="Website" value="{{ old('website', $company->website) }}">
                            <x-backend.input-error field="website"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="industry" class="form-label label">Industry<span class="asterisk">*</span></label>
                            <select class="form-select input-field js-single" id="industry" name="industry" required>
                                <option value="">Select industry</option>
                                <option value="retail" {{ old('industry', $company->industry) == 'retail' ? 'selected' : '' }}>Retail</option>
                                <option value="e-commerce" {{ old('industry', $company->industry) == 'e-commerce' ? 'selected' : '' }}>E-commerce</option>
                                <option value="manufacturing" {{ old('industry', $company->industry) == 'manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                <option value="logistics and transportation" {{ old('industry', $company->industry) == 'logistics and transportation' ? 'selected' : '' }}>Logistics & Transportation</option>
                                <option value="food and beverage" {{ old('industry', $company->industry) == 'food-and-beverage' ? 'selected' : '' }}>Food & Beverage</option>
                                <option value="pharmaceuticals" {{ old('industry', $company->industry) == 'pharmaceuticals' ? 'selected' : '' }}>Pharmaceuticals</option>
                                <option value="automotive" {{ old('industry', $company->industry) == 'automotive' ? 'selected' : '' }}>Automotive</option>
                                <option value="textiles and apparel" {{ old('industry', $company->industry) == 'textiles and apparel' ? 'selected' : '' }}>Textiles & Apparel</option>
                                <option value="electronics" {{ old('industry', $company->industry) == 'electronics' ? 'selected' : '' }}>Electronics</option>
                                <option value="construction" {{ old('industry', $company->industry) == 'construction' ? 'selected' : '' }}>Construction</option>
                                <option value="consumer goods" {{ old('industry', $company->industry) == 'consumer goods' ? 'selected' : '' }}>Consumer Goods</option>
                                <option value="chemicals" {{ old('industry', $company->industry) == 'chemicals' ? 'selected' : '' }}>Chemicals</option>
                                <option value="furniture and home goods" {{ old('industry', $company->industry) == 'furniture and home goods' ? 'selected' : '' }}>Furniture & Home Goods</option>
                                <option value="aerospace" {{ old('industry', $company->industry) == 'aerospace' ? 'selected' : '' }}>Aerospace</option>
                                <option value="energy and utilities" {{ old('industry', $company->industry) == 'energy and utilities' ? 'selected' : '' }}>Energy & Utilities</option>
                            </select>
                            <x-backend.input-error field="industry"></x-backend.input-error>
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="company_size" class="form-label label">Company Size</label>
                            <input type="text" class="form-control input-field" id="company_size" name="company_size" placeholder="Company Size" value="{{ old('company_size', $company->company_size) }}">
                        </div>

                        <div class="col-12 col-xl-6 mb-3 mb-md-4">
                            <label for="establishment_date" class="form-label label">Establishment Date</label>
                            <input type="text" class="form-control input-field date-picker-field" id="establishment_date" name="establishment_date" placeholder="Establishment Date" value="{{ old('establishment_date', $company->establishment_date) }}">
                            <x-backend.input-error field="establishment_date"></x-backend.input-error>
                        </div>

                        <div class="col-12">
                            <x-backend.upload-multi-images image_count="3" old_name="old_registration_certificates" old_value="{{ $company->registration_certificates ?? old('registration_certificates') }}" new_name="new_registration_certificates[]" path="warehouses" label="Registration Certificate"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_registration_certificates.*"></x-backend.input-error>
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Save Changes</button>
                </form>
            </div>

            <div class="tab-pane fade {{ session('active_tab') == 'password' ? 'show active' : '' }}" id="pills-update-password" role="tabpanel" aria-labelledby="pills-update-password-tab" tabindex="0">
                <p class="tab-content-title">Update Password</p>

                <form action="{{ route('landlord.settings.password', $user) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf

                    <div class="row mb-3 mb-md-4">
                        <div class="col-12 mb-3 mb-md-4 position-relative">
                            <label for="old_password" class="form-label label">Old Password<span class="asterisk">*</span></label>
                            <input type="password" class="form-control input-field" id="old_password" name="old_password" placeholder="* * * * * * * *" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-backend.input-error field="old_password"></x-backend.input-error>
                        </div>

                        <div class="col-12 mb-3 mb-md-4 position-relative">
                            <label for="password" class="form-label label">Password<span class="asterisk">*</span></label>
                            <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * * *" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-backend.input-error field="password"></x-backend.input-error>
                        </div>

                        <div class="col-12 position-relative">
                            <label for="confirm_password" class="form-label label">Confirm Password<span class="asterisk">*</span></label>
                            <input type="password" class="form-control input-field" id="confirm_password" name="confirm_password" placeholder="* * * * * * * *" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-backend.input-error field="confirm_password"></x-backend.input-error>
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <x-backend.notification></x-backend.notification>
    <x-backend.modal-image-preview></x-backend.modal-image-preview>
@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>

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
    </script>

    <script>
        $('#email').on('blur', function () {
            const email = $(this).val();
            const $error = $(this).next('.error-message');

            $error.remove();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if(!emailRegex.test(email)) {
                $(this).after('<div class="error-message">Please enter a valid email address.</div>');
            }
        });

        $('#company_email').on('blur', function () {
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

        $('#company_phone').on('blur', function () {
            const phone = $(this).val();
            const $error = $(this).parent().next('.error-message');

            $error.remove();
            const phoneRegex = /^\d{9}$/;

            if(!phoneRegex.test(phone)) {
                $(this).parent().after('<div class="error-message">Phone number must be exactly 9 digits.</div>');
            }
        });

        $('#website').on('blur', function () {
            const website = $(this).val().trim();
            const $error = $(this).next('.error-message');

            $error.remove();

            if(website !== '') {
                const websiteRegex = /^(https?:\/\/)?([\w-]+\.)+[\w-]{2,}(\/[\w\-._~:/?#[\]@!$&'()*+,;=]*)?$/i;

                if(!websiteRegex.test(website)) {
                    $(this).after('<div class="error-message">Please enter a valid website URL.</div>');
                }
            }
        });

        $('#cr_number').on('blur', function () {
            const cr_number = $(this).val();
            const $error = $(this).next('.error-message');

            $error.remove();
            const crNumberRegex = /^\d{10}$/;

            if(!crNumberRegex.test(cr_number)) {
                $(this).after('<div class="error-message">CR number must be exactly 10 digits.</div>');
            }
        });
    </script>
@endpush