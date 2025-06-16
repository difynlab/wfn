@extends('backend.layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Add New User</p>
                <p class="description">Fill in the details below to create a new user account.</p>
            </div>
            
            <div class="row">
                <div class="col-6 mb-4">
                    <label for="first_name" class="form-label label">First Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                </div>

                <div class="col-6 mb-4">
                    <label for="last_name" class="form-label label">Last Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                </div>

                <div class="col-6 mb-4">
                    <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                    <input type="email" class="form-control input-field" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <x-backend.input-error field="email"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="phone" class="form-label label">Phone<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
                    <x-backend.input-error field="phone"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="address" class="form-label label">Address<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="address" name="address" placeholder="Address" value="{{ old('address') }}" required>
                </div>

                <div class="col-6 mb-4">
                    <label for="city" class="form-label label">City<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="city" name="city" placeholder="City" value="{{ old('city') }}" required>
                </div>

                <div class="col-6 mb-4">
                    <label class="form-label label">Country<span class="asterisk">*</span></label>
                    <select class="form-select input-field" name="country" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mb-4">
                    <label class="form-label label">Role<span class="asterisk">*</span></label>
                    <select class="form-select input-field" id="role" name="role" required>
                        <option value="">Select role</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                        <option value="Landlord" {{ old('role') == 'Landlord' ? 'selected' : '' }}>Landlord</option>
                        <option value="Tenant" {{ old('role') == 'Tenant' ? 'selected' : '' }}>Tenant</option>
                    </select>
                </div>

                <div class="col-6 mb-4 position-relative">
                    <label for="password" class="form-label label">Password<span class="asterisk">*</span></label>
                    <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * * *" required>
                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                    <x-backend.input-error field="password"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4 position-relative">
                    <label for="confirm_password" class="form-label label">Confirm Password<span class="asterisk">*</span></label>
                    <input type="password" class="form-control input-field" id="confirm_password" name="confirm_password" placeholder="* * * * * * * *" required>
                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                    <x-backend.input-error field="confirm_password"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_image" old_value="{{ old('image') }}" new_name="new_image" path="users" label="User"></x-backend.upload-image>
                    <x-backend.input-error field="new_image"></x-backend.input-error>
                </div>

                <x-backend.create></x-backend.create>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

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