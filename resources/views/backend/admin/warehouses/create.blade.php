@extends('backend.layouts.app')

@section('title', 'Create Warehouse')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.warehouses.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Add New Warehouse</p>
                <p class="description">Fill in the details below to create a new warehouse.</p>
            </div>
            
            <div class="row">
                <div class="col-12 mb-4">
                    <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    <x-backend.input-error field="name"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <label for="address" class="form-label label">Address<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="address" name="address" placeholder="Address" value="{{ old('address') }}" required>
                    <x-backend.input-error field="address"></x-backend.input-error>
                </div>

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
                    <label for="storage_type_id" class="form-label label">Storage Type<span class="asterisk">*</span></label>
                    <select class="form-select input-field" id="storage_type_id" name="storage_type_id" required>
                        <option value="">Select storage type</option>
                        @foreach($storage_types as $storage_type)
                            <option value="{{ $storage_type->id }}" {{ old('storage_type_id') == $storage_type->id ? 'selected' : '' }}>{{ $storage_type->name }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="storage_type_id"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="total_area" class="form-label label">Total Area (Sq.m)<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="total_area" name="total_area" placeholder="Total Area" value="{{ old('total_area') }}" required>
                    <x-backend.input-error field="total_area"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="total_pallets" class="form-label label">Total Pallets<span class="asterisk">*</span></label>
                    <input type="number" class="form-control input-field" id="total_pallets" name="total_pallets" placeholder="Total Pallets" value="{{ old('total_pallets') }}" required>
                    <x-backend.input-error field="total_pallets"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="available_pallets" class="form-label label">Available Pallets<span class="asterisk">*</span></label>
                    <input type="number" class="form-control input-field" id="available_pallets" name="available_pallets" placeholder="Available Pallets" value="{{ old('available_pallets') }}" required>
                    <x-backend.input-error field="available_pallets"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="pallet_dimension" class="form-label label">Pallet Dimension (L x W x H)<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="pallet_dimension" name="pallet_dimension" placeholder="Pallet Dimension (L x W x H)" value="{{ old('pallet_dimension') }}" required>
                    <x-backend.input-error field="pallet_dimension"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="temperature_type" class="form-label label">Temperature Type<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="dry" id="dry" {{ old('temperature_type') == 'dry' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="dry">Dry</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="ambient" id="ambient" {{ old('temperature_type') == 'ambient' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="ambient">Ambient</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="cold" id="cold" {{ old('temperature_type') == 'cold' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="cold">Cold</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="freezer" id="freezer" {{ old('temperature_type') == 'freezer' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="freezer">Freezer</label>
                        </div>
                    </div>

                    <x-backend.input-error field="temperature_type"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="temperature_range" class="form-label label">Temperature Range<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="temperature_range" name="temperature_range" placeholder="Temperature Range" value="{{ old('temperature_range') }}" required>
                    <x-backend.input-error field="temperature_range"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="wms" class="form-label label">Warehouse Management System<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wms" value="yes" id="wms_yes" {{ old('wms') == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="wms_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wms" value="no" id="wms_no" {{ old('wms') == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="wms_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="wms"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="equipment_handling" class="form-label label">Equipment Handling<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="equipment_handling" value="yes" id="eq_yes" {{ old('equipment_handling') == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="eq_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="equipment_handling" value="no" id="eq_no" {{ old('equipment_handling') == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="eq_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="equipment_handling"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="temperature_sensor" class="form-label label">Temperature Sensor<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_sensor" value="yes" id="ts_yes" {{ old('temperature_sensor') == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="ts_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_sensor" value="no" id="ts_no" {{ old('temperature_sensor') == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="ts_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="temperature_sensor"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="humidity_sensor" class="form-label label">Humidity Sensor<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="humidity_sensor" value="yes" id="hs_yes" {{ old('humidity_sensor') == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="hs_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="humidity_sensor" value="no" id="hs_no" {{ old('humidity_sensor') == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="hs_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="humidity_sensor"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_thumbnail" old_value="{{ old('thumbnail') }}" new_name="new_thumbnail" path="warehouses" label="Thumbnail"></x-backend.upload-image>
                    <x-backend.input-error field="new_thumbnail"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-multi-images image_count="8" old_name="old_images" old_value="{{ old('images') }}" new_name="new_images[]" path="warehouses"></x-backend.upload-multi-images>
                    <x-backend.input-error field="new_images.*"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-multi-videos video_count="8" old_name="old_videos" old_value="{{ old('videos') }}" new_name="new_videos[]" path="warehouses"></x-backend.upload-multi-videos>
                    <x-backend.input-error field="new_videos.*"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-multi-images image_count="4" old_name="old_licenses" old_value="{{ old('licenses') }}" new_name="new_licenses[]" path="warehouses" label="License"></x-backend.upload-multi-images>
                    <x-backend.input-error field="new_licenses.*"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <label for="notes" class="form-label label">Notes</label>
                    <textarea type="text" class="form-control input-field" id="notes" name="notes" placeholder="Notes" value="{{ old('notes') }}"></textarea>
                </div>

                <x-backend.create></x-backend.create>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-videos.js') }}"></script>
@endpush