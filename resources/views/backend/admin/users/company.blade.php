@extends('backend.layouts.app')

@section('title', 'Edit Company')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.users.company.update', [$user, $company]) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Company Details</p>
                <p class="description">View or update company details. Save changes to apply.</p>
            </div>

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
                    <div class="phone-div">
                        <input type="text" class="form-control input-field" id="phone_code" name="phone_code" placeholder="+XXX" value="{{ old('phone_code', $company->phone_code) }}" required>
                        
                        <input type="text" class="form-control input-field" id="phone" name="phone" placeholder="5X XXX XXXX" value="{{ old('phone', $company->phone) }}" required>
                    </div>
                    <x-backend.input-error field="phone"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="website" class="form-label label">Website</label>
                    <input type="text" class="form-control input-field" id="website" name="website" placeholder="Website" value="{{ old('website', $company->website) }}">
                    <x-backend.input-error field="website"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
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

                <div class="col-6 mb-4">
                    <label for="company_size" class="form-label label">Company Size</label>
                    <input type="text" class="form-control input-field" id="company_size" name="company_size" placeholder="Company Size" value="{{ old('company_size', $company->company_size) }}">
                </div>

                <div class="col-6 mb-4">
                    <label for="establishment_date" class="form-label label">Establishment Date</label>
                    <input type="text" class="form-control input-field date-picker-field" id="establishment_date" name="establishment_date" placeholder="Establishment Date" value="{{ old('establishment_date', $company->establishment_date) }}">
                    <x-backend.input-error field="establishment_date"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-multi-images image_count="3" old_name="old_registration_certificates" old_value="{{ $company->registration_certificates ?? old('registration_certificates') }}" new_name="new_registration_certificates[]" path="warehouses" label="Registration Certificate"></x-backend.upload-multi-images>
                    <x-backend.input-error field="new_registration_certificates.*"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$company"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

    <x-backend.modal-image-preview></x-backend.modal-image-preview>
@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>

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

        $('#phone').on('blur', function () {
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
    </script>
@endpush