@extends('backend.layouts.app')

@section('title', 'Edit Company')

@section('content')
    <div class="inner-page">
        <form action="{{ route('backend.users.company.update', [$user, $company]) }}" method="POST" enctype="multipart/form-data" class="form">
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

                <x-backend.edit :data="$company"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
@endpush