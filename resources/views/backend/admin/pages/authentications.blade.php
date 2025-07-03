@extends('backend.layouts.app')

@section('title', 'Authentications')

@section('content')
    <div class="inner-page">
        <form action="{{ route('backend.pages.authentications.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="page-details">
                <p class="title">{{ ucfirst($language) }} Language</p>
                <p class="description">View or update page content here.</p>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Log In</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="login_name_{{ $short_code }}" class="form-label label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control input-field" id="login_name_{{ $short_code }}" name="login_name_{{ $short_code }}" value="{{ $contents->{'login_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="login_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="login_title_{{ $short_code }}" name="login_title_{{ $short_code }}" value="{{ $contents->{'login_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="login_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="login_description_{{ $short_code }}" name="login_description_{{ $short_code }}" value="{{ $contents->{'login_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_username_{{ $short_code }}" class="form-label label">Username</label>
                        <input type="text" class="form-control input-field" id="login_username_{{ $short_code }}" name="login_username_{{ $short_code }}" value="{{ $contents->{'login_username_' . $short_code} ?? '' }}" placeholder="Username">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_username_placeholder_{{ $short_code }}" class="form-label label">Username Placeholder</label>
                        <input type="text" class="form-control input-field" id="login_username_placeholder_{{ $short_code }}" name="login_username_placeholder_{{ $short_code }}" value="{{ $contents->{'login_username_placeholder_' . $short_code} ?? '' }}" placeholder="Username Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_password_{{ $short_code }}" class="form-label label">Password</label>
                        <input type="text" class="form-control input-field" id="login_password_{{ $short_code }}" name="login_password_{{ $short_code }}" value="{{ $contents->{'login_password_' . $short_code} ?? '' }}" placeholder="Password">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_remember_{{ $short_code }}" class="form-label label">Remember Me</label>
                        <input type="text" class="form-control input-field" id="login_remember_{{ $short_code }}" name="login_remember_{{ $short_code }}" value="{{ $contents->{'login_remember_' . $short_code} ?? '' }}" placeholder="Remember Me">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_forgot_password_{{ $short_code }}" class="form-label label">Forgot Password</label>
                        <input type="text" class="form-control input-field" id="login_forgot_password_{{ $short_code }}" name="login_forgot_password_{{ $short_code }}" value="{{ $contents->{'login_forgot_password_' . $short_code} ?? '' }}" placeholder="Forgot Password">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="login_button_{{ $short_code }}" name="login_button_{{ $short_code }}" value="{{ $contents->{'login_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_no_account_{{ $short_code }}" class="form-label label">No Account</label>
                        <input type="text" class="form-control input-field" id="login_no_account_{{ $short_code }}" name="login_no_account_{{ $short_code }}" value="{{ $contents->{'login_no_account_' . $short_code} ?? '' }}" placeholder="No Account">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="login_register_{{ $short_code }}" class="form-label label">Register</label>
                        <input type="text" class="form-control input-field" id="login_register_{{ $short_code }}" name="login_register_{{ $short_code }}" value="{{ $contents->{'login_register_' . $short_code} ?? '' }}" placeholder="Register">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_login_image" old_value="{{ $contents->{'login_image_' . $short_code} ?? '' }}" new_name="new_login_image" path="pages"></x-backend.upload-image>
                        <x-backend.input-error field="new_login_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Register</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="register_name_{{ $short_code }}" class="form-label label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control input-field" id="register_name_{{ $short_code }}" name="register_name_{{ $short_code }}" value="{{ $contents->{'register_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="register_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="register_title_{{ $short_code }}" name="register_title_{{ $short_code }}" value="{{ $contents->{'register_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="register_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="register_description_{{ $short_code }}" name="register_description_{{ $short_code }}" value="{{ $contents->{'register_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_agent_{{ $short_code }}" class="form-label label">Agent</label>
                        <input type="text" class="form-control input-field" id="register_agent_{{ $short_code }}" name="register_agent_{{ $short_code }}" value="{{ $contents->{'register_agent_' . $short_code} ?? '' }}" placeholder="Agent">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_company_{{ $short_code }}" class="form-label label">Company</label>
                        <input type="text" class="form-control input-field" id="register_company_{{ $short_code }}" name="register_company_{{ $short_code }}" value="{{ $contents->{'register_company_' . $short_code} ?? '' }}" placeholder="Company">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_first_name_{{ $short_code }}" class="form-label label">First Name</label>
                        <input type="text" class="form-control input-field" id="register_first_name_{{ $short_code }}" name="register_first_name_{{ $short_code }}" value="{{ $contents->{'register_first_name_' . $short_code} ?? '' }}" placeholder="First Name">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_first_name_placeholder_{{ $short_code }}" class="form-label label">First Name Placeholder</label>
                        <input type="text" class="form-control input-field" id="register_first_name_placeholder_{{ $short_code }}" name="register_first_name_placeholder_{{ $short_code }}" value="{{ $contents->{'register_first_name_placeholder_' . $short_code} ?? '' }}" placeholder="First Name Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_last_name_{{ $short_code }}" class="form-label label">Last Name</label>
                        <input type="text" class="form-control input-field" id="register_last_name_{{ $short_code }}" name="register_last_name_{{ $short_code }}" value="{{ $contents->{'register_last_name_' . $short_code} ?? '' }}" placeholder="Last Name">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_last_name_placeholder_{{ $short_code }}" class="form-label label">Last Name Placeholder</label>
                        <input type="text" class="form-control input-field" id="register_last_name_placeholder_{{ $short_code }}" name="register_last_name_placeholder_{{ $short_code }}" value="{{ $contents->{'register_last_name_placeholder_' . $short_code} ?? '' }}" placeholder="Last Name Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_email_{{ $short_code }}" class="form-label label">Email</label>
                        <input type="text" class="form-control input-field" id="register_email_{{ $short_code }}" name="register_email_{{ $short_code }}" value="{{ $contents->{'register_email_' . $short_code} ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_email_placeholder_{{ $short_code }}" class="form-label label">Email Placeholder</label>
                        <input type="text" class="form-control input-field" id="register_email_placeholder_{{ $short_code }}" name="register_email_placeholder_{{ $short_code }}" value="{{ $contents->{'register_email_placeholder_' . $short_code} ?? '' }}" placeholder="Email Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_phone_{{ $short_code }}" class="form-label label">Phone</label>
                        <input type="text" class="form-control input-field" id="register_phone_{{ $short_code }}" name="register_phone_{{ $short_code }}" value="{{ $contents->{'register_phone_' . $short_code} ?? '' }}" placeholder="Phone">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_phone_placeholder_{{ $short_code }}" class="form-label label">Phone Placeholder</label>
                        <input type="text" class="form-control input-field" id="register_phone_placeholder_{{ $short_code }}" name="register_phone_placeholder_{{ $short_code }}" value="{{ $contents->{'register_phone_placeholder_' . $short_code} ?? '' }}" placeholder="Phone Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_city_{{ $short_code }}" class="form-label label">City</label>
                        <input type="text" class="form-control input-field" id="register_city_{{ $short_code }}" name="register_city_{{ $short_code }}" value="{{ $contents->{'register_city_' . $short_code} ?? '' }}" placeholder="City">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_city_placeholder_{{ $short_code }}" class="form-label label">City Placeholder</label>
                        <input type="text" class="form-control input-field" id="register_city_placeholder_{{ $short_code }}" name="register_city_placeholder_{{ $short_code }}" value="{{ $contents->{'register_city_placeholder_' . $short_code} ?? '' }}" placeholder="City Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_password_{{ $short_code }}" class="form-label label">Password</label>
                        <input type="text" class="form-control input-field" id="register_password_{{ $short_code }}" name="register_password_{{ $short_code }}" value="{{ $contents->{'register_password_' . $short_code} ?? '' }}" placeholder="Password">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_confirm_password_{{ $short_code }}" class="form-label label">Confirm Password</label>
                        <input type="text" class="form-control input-field" id="register_confirm_password_{{ $short_code }}" name="register_confirm_password_{{ $short_code }}" value="{{ $contents->{'register_confirm_password_' . $short_code} ?? '' }}" placeholder="Confirm Password">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="register_button_{{ $short_code }}" name="register_button_{{ $short_code }}" value="{{ $contents->{'register_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="register_have_account_{{ $short_code }}" class="form-label label">Have Account</label>
                        <input type="text" class="form-control input-field" id="register_have_account_{{ $short_code }}" name="register_have_account_{{ $short_code }}" value="{{ $contents->{'register_have_account_' . $short_code} ?? '' }}" placeholder="Have Account">
                    </div>

                    <div class="col-6">
                        <label for="register_login_{{ $short_code }}" class="form-label label">Log In</label>
                        <input type="text" class="form-control input-field" id="register_login_{{ $short_code }}" name="register_login_{{ $short_code }}" value="{{ $contents->{'register_login_' . $short_code} ?? '' }}" placeholder="Log In">
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Forgot Password</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="forgot_name_{{ $short_code }}" class="form-label label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control input-field" id="forgot_name_{{ $short_code }}" name="forgot_name_{{ $short_code }}" value="{{ $contents->{'forgot_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="forgot_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="forgot_title_{{ $short_code }}" name="forgot_title_{{ $short_code }}" value="{{ $contents->{'forgot_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="forgot_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="forgot_description_{{ $short_code }}" name="forgot_description_{{ $short_code }}" value="{{ $contents->{'forgot_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="forgot_email_{{ $short_code }}" class="form-label label">Email</label>
                        <input type="text" class="form-control input-field" id="forgot_email_{{ $short_code }}" name="forgot_email_{{ $short_code }}" value="{{ $contents->{'forgot_email_' . $short_code} ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="forgot_email_placeholder_{{ $short_code }}" class="form-label label">Email Placeholder</label>
                        <input type="text" class="form-control input-field" id="forgot_email_placeholder_{{ $short_code }}" name="forgot_email_placeholder_{{ $short_code }}" value="{{ $contents->{'forgot_email_placeholder_' . $short_code} ?? '' }}" placeholder="Email Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="forgot_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="forgot_button_{{ $short_code }}" name="forgot_button_{{ $short_code }}" value="{{ $contents->{'forgot_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="forgot_remember_{{ $short_code }}" class="form-label label">Remember</label>
                        <input type="text" class="form-control input-field" id="forgot_remember_{{ $short_code }}" name="forgot_remember_{{ $short_code }}" value="{{ $contents->{'forgot_remember_' . $short_code} ?? '' }}" placeholder="Remember">
                    </div>

                    <div class="col-6">
                        <label for="forgot_login_{{ $short_code }}" class="form-label label">Log In</label>
                        <input type="text" class="form-control input-field" id="forgot_login_{{ $short_code }}" name="forgot_login_{{ $short_code }}" value="{{ $contents->{'forgot_login_' . $short_code} ?? '' }}" placeholder="Log In">
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Reset Password</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="reset_name_{{ $short_code }}" class="form-label label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control input-field" id="reset_name_{{ $short_code }}" name="reset_name_{{ $short_code }}" value="{{ $contents->{'reset_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="reset_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="reset_title_{{ $short_code }}" name="reset_title_{{ $short_code }}" value="{{ $contents->{'reset_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="reset_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="reset_description_{{ $short_code }}" name="reset_description_{{ $short_code }}" value="{{ $contents->{'reset_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="reset_new_password_{{ $short_code }}" class="form-label label">New Password</label>
                        <input type="text" class="form-control input-field" id="reset_new_password_{{ $short_code }}" name="reset_new_password_{{ $short_code }}" value="{{ $contents->{'reset_new_password_' . $short_code} ?? '' }}" placeholder="New Password">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="reset_confirm_password_{{ $short_code }}" class="form-label label">Confirm Password</label>
                        <input type="text" class="form-control input-field" id="reset_confirm_password_{{ $short_code }}" name="reset_confirm_password_{{ $short_code }}" value="{{ $contents->{'reset_confirm_password_' . $short_code} ?? '' }}" placeholder="Confirm Password">
                    </div>

                    <div class="col-6">
                        <label for="reset_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="reset_button_{{ $short_code }}" name="reset_button_{{ $short_code }}" value="{{ $contents->{'reset_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush