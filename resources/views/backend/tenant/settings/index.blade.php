@extends('backend.layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="inner-page">
        <div class="row align-items-center mb-4">
            <div class="col-12">
                <p class="inner-page-top-title">Settings</p>
                <p class="inner-page-top-description">Manage your account and adjust settings to optimize your workflow.</p>
            </div>
        </div>

        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-company-tab" data-bs-toggle="pill" data-bs-target="#pills-company" type="button" role="tab" aria-controls="pills-company" aria-selected="false">Company</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-update-password-tab" data-bs-toggle="pill" data-bs-target="#pills-update-password" type="button" role="tab" aria-controls="pills-update-password" aria-selected="false">Update Password</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <p class="tab-content-title">Profile Settings</p>

                <form action="{{ route('tenant.settings.profile', $user) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf

                    <div class="row mb-5">
                        <div class="col-6 mb-4">
                            <label for="first_name" class="form-label label">First Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name) }}" required>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="last_name" class="form-label label">Last Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}" required>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                            <input type="email" class="form-control input-field" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                            <x-backend.input-error field="email"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="phone" class="form-label label">Phone</label>
                            <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                            <x-backend.input-error field="phone"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="address" class="form-label label">Address</label>
                            <input type="text" class="form-control input-field" id="address" name="address" placeholder="Address" value="{{ old('address', $user->address) }}">
                            <x-backend.input-error field="address"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="city" class="form-label label">City</label>
                            <input type="text" class="form-control input-field" id="city" name="city" placeholder="City" value="{{ old('city', $user->city) }}">
                            <x-backend.input-error field="city"></x-backend.input-error>
                        </div>

                        <div class="col-12 mb-4">
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

                    <x-backend.notification></x-backend.notification>
                </form>
            </div>

            <div class="tab-pane fade" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab" tabindex="0">
                <p class="tab-content-title">Company Details</p>
                
                <form action="{{ route('tenant.settings.company', [$user, $company]) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="name" name="name" placeholder="Name" value="{{ old('name', $company->name) }}" required>
                            <x-backend.input-error field="name"></x-backend.input-error>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="address" class="form-label label">Address<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="address" name="address" placeholder="Address" value="{{ old('address', $company->address) }}" required>
                            <x-backend.input-error field="address"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                            <input type="email" class="form-control input-field" id="email" name="email" placeholder="Email" value="{{ old('email', $company->email) }}" required>
                            <x-backend.input-error field="email"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="phone" class="form-label label">Phone<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $company->phone) }}" required>
                            <x-backend.input-error field="phone"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="website" class="form-label label">Website</label>
                            <input type="url" class="form-control input-field" id="website" name="website" placeholder="Website" value="{{ old('website', $company->website) }}">
                            <x-backend.input-error field="website"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="industry" class="form-label label">Industry<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="industry" name="industry" placeholder="Industry" value="{{ old('industry', $company->industry) }}" required>
                            <x-backend.input-error field="industry"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="company_size" class="form-label label">Company Size</label>
                            <input type="text" class="form-control input-field" id="company_size" name="company_size" placeholder="Company Size" value="{{ old('company_size', $company->company_size) }}">
                        </div>

                        <div class="col-6 mb-4">
                            <label for="establishment_date" class="form-label label">Establishment Date</label>
                            <input type="date" class="form-control input-field" id="establishment_date" name="establishment_date" placeholder="Establishment Date" value="{{ old('establishment_date', $company->establishment_date) }}">
                            <x-backend.input-error field="establishment_date"></x-backend.input-error>
                        </div>

                        <div class="col-12 mb-4">
                            <x-backend.upload-multi-images image_count="3" old_name="old_registration_certificates" old_value="{{ $company->registration_certificates ?? old('registration_certificates') }}" new_name="new_registration_certificates[]" path="warehouses" label="Registration Certificate"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_registration_certificates.*"></x-backend.input-error>
                        </div>

                        <div class="col-12">
                            <label for="status" class="form-label label">Status<span class="asterisk">*</span></label>

                            <div class="radios">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="1" id="active" {{ old('status', $company->status) == 1 ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0" id="inactive" {{ old('status', $company->status) == 0 ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                            </div>

                            <x-backend.input-error field="status"></x-backend.input-error>
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Save Changes</button>

                    <x-backend.notification></x-backend.notification>
                </form>
            </div>

            <div class="tab-pane fade" id="pills-update-password" role="tabpanel" aria-labelledby="pills-update-password-tab" tabindex="0">
                <p class="tab-content-title">Update Password</p>

                <form action="{{ route('tenant.settings.password', $user) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf

                    <div class="row mb-5">
                        <div class="col-12 mb-4 position-relative">
                            <label for="old_password" class="form-label label">Old Password<span class="asterisk">*</span></label>
                            <input type="password" class="form-control input-field" id="old_password" name="old_password" placeholder="* * * * * * * *" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-backend.input-error field="old_password"></x-backend.input-error>
                        </div>

                        <div class="col-12 mb-4 position-relative">
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

                    <x-backend.notification></x-backend.notification>
                </form>
            </div>
        </div>
    </div>
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
@endpush