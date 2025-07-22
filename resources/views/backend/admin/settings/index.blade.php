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
                <button class="nav-link" id="pills-website-tab" data-bs-toggle="pill" data-bs-target="#pills-website" type="button" role="tab" aria-controls="pills-website" aria-selected="false">Website</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-update-password-tab" data-bs-toggle="pill" data-bs-target="#pills-update-password" type="button" role="tab" aria-controls="pills-update-password" aria-selected="false">Update Password</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <p class="tab-content-title">Profile Settings</p>

                <form action="{{ route('admin.settings.profile', $user) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf

                    <div class="row mb-4 mb-lg-5">
                        <div class="col-12 col-lg-6 mb-3 mb-lg-4">
                            <label for="first_name" class="form-label label">First Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name) }}" required>
                        </div>

                        <div class="col-12 col-lg-6 mb-3 mb-lg-4">
                            <label for="last_name" class="form-label label">Last Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}" required>
                        </div>

                        <div class="col-12 mb-3 mb-lg-4">
                            <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                            <input type="email" class="form-control input-field" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                            <x-backend.input-error field="email"></x-backend.input-error>
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

            <div class="tab-pane fade" id="pills-website" role="tabpanel" aria-labelledby="pills-website-tab" tabindex="0">
                <p class="tab-content-title">Website Settings</p>
                
                <form action="{{ route('admin.settings.website', 1) }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    
                    <div class="row mb-5">
                        <div class="col-12 mb-4">
                            <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control input-field" id="name" name="name" value="{{ old('name', $items->name) }}" placeholder="Name" required>
                        </div>

                        <div class="col-6 mb-4">
                            <x-backend.upload-image-must old_name="old_logo" old_value="{{ $items->logo ?? '' }}" new_name="new_logo" label="Logo" path="global"></x-backend.upload-image-must>
                            <x-backend.input-error field="new_logo"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <x-backend.upload-image-must old_name="old_favicon" old_value="{{ $items->favicon ?? '' }}" new_name="new_favicon" label="Favicon" path="global"></x-backend.upload-image-must>
                            <x-backend.input-error field="new_favicon"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <x-backend.upload-image-must old_name="old_guest_image" old_value="{{ $items->guest_image ?? '' }}" new_name="new_guest_image" label="Guest" path="global"></x-backend.upload-image-must>
                            <x-backend.input-error field="new_guest_image"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <x-backend.upload-image-must old_name="old_footer_logo" old_value="{{ $items->footer_logo ?? '' }}" new_name="new_footer_logo" label="Footer Logo" path="global"></x-backend.upload-image-must>
                            <x-backend.input-error field="new_footer_logo"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <x-backend.upload-image-must old_name="old_no_image" old_value="{{ $items->no_image ?? '' }}" new_name="new_no_image" label="No" path="global"></x-backend.upload-image-must>
                            <x-backend.input-error field="new_no_image"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <x-backend.upload-image-must old_name="old_no_profile_image" old_value="{{ $items->no_profile_image ?? '' }}" new_name="new_no_profile_image" label="No Profile" path="global"></x-backend.upload-image-must>
                            <x-backend.input-error field="new_no_profile_image"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4">
                            <label for="fb_en" class="form-label label">FB (English)</label>
                            <input type="url" class="form-control input-field" id="fb_en" name="fb_en" value="{{ old('fb_en', $items->fb_en) }}" placeholder="FB">
                        </div>

                        <div class="col-6 mb-4">
                            <label for="instagram_en" class="form-label label">Instagram (English)</label>
                            <input type="url" class="form-control input-field" id="instagram_en" name="instagram_en" value="{{ old('instagram_en', $items->instagram_en) }}" placeholder="Instagram">
                        </div>

                        <div class="col-6">
                            <label for="fb_ar" class="form-label label">FB (Arabic)</label>
                            <input type="url" class="form-control input-field" id="fb_ar" name="fb_ar" value="{{ old('fb_ar', $items->fb_ar) }}" placeholder="FB">
                        </div>

                        <div class="col-6">
                            <label for="instagram_ar" class="form-label label">Instagram (Arabic)</label>
                            <input type="url" class="form-control input-field" id="instagram_ar" name="instagram_ar" value="{{ old('instagram_ar', $items->instagram_ar) }}" placeholder="Instagram">
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Save Changes</button>

                    <x-backend.notification></x-backend.notification>
                </form>
            </div>

            <div class="tab-pane fade" id="pills-update-password" role="tabpanel" aria-labelledby="pills-update-password-tab" tabindex="0">
                <p class="tab-content-title">Update Password</p>

                <form action="{{ route('admin.settings.password', $user) }}" method="POST" enctype="multipart/form-data" class="form">
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
    </script>
@endpush