@extends('backend.layouts.app')

@section('title', 'Create Booking')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.bookings.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Add New Booking</p>
                <p class="description">Fill in the details below to create a new booking.</p>
            </div>
            
            <div class="row">
                <div class="col-6 mb-4">
                    <label for="user_id" class="form-label label">User<span class="asterisk">*</span></label>
                    <select class="form-select input-field" id="user_id" name="user_id" required>
                        <option value="">Select user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="user_id"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="warehouse_id" class="form-label label">Warehouse<span class="asterisk">*</span></label>
                    <select class="form-select input-field" id="warehouse_id" name="warehouse_id" required>
                        <option value="">Select warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="warehouse_id"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="no_of_pallets" class="form-label label">No of Pallets<span class="asterisk">*</span></label>
                    <input type="number" class="form-control input-field" id="no_of_pallets" name="no_of_pallets" placeholder="No of Pallets" value="{{ old('no_of_pallets') }}" required>
                    <x-backend.input-error field="no_of_pallets"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="total_rent" class="form-label label">Total Rent<span class="asterisk">*</span></label>
                    <input type="number" class="form-control input-field" id="total_rent" name="total_rent" placeholder="Total Rent" value="{{ old('total_rent') }}" required>
                    <x-backend.input-error field="total_rent"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="tenancy_date" class="form-label label">Tenancy Date<span class="asterisk">*</span></label>
                    <input type="date" class="form-control input-field" id="tenancy_date" name="tenancy_date" placeholder="Tenancy Date" value="{{ old('tenancy_date') }}" required>
                    <x-backend.input-error field="tenancy_date"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="renewal_date" class="form-label label">Renewal Date<span class="asterisk">*</span></label>
                    <input type="date" class="form-control input-field" id="renewal_date" name="renewal_date" placeholder="Renewal Date" value="{{ old('renewal_date') }}" required>
                    <x-backend.input-error field="renewal_date"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-multi-images image_count="4" old_name="old_documents" old_value="{{ old('documents') }}" new_name="new_documents[]" path="bookings" label="Document"></x-backend.upload-multi-images>
                    <x-backend.input-error field="new_documents.*"></x-backend.input-error>
                </div>

                <x-backend.create></x-backend.create>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
@endpush