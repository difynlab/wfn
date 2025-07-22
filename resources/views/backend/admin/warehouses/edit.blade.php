@extends('backend.layouts.app')

@section('title', 'Edit Warehouse')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.warehouses.update', $warehouse) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Warehouse Details</p>
                <p class="description">View or update warehouse details. Save changes to apply.</p>
            </div>

            <div class="row">
                <div class="col-6 mb-4">
                    <label for="name_en" class="form-label label">Name (EN)<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="name_en" name="name_en" placeholder="Name (EN)" value="{{ old('name_en', $warehouse->name_en) }}" required>
                    <x-backend.input-error field="name_en"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="name_ar" class="form-label label">Name (AR)</label>
                    <input type="text" class="form-control input-field" id="name_ar" name="name_ar" placeholder="Name (AR)" value="{{ old('name_ar', $warehouse->name_ar) }}">
                    <x-backend.input-error field="name_ar"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <label for="address" class="form-label label">Address<span class="asterisk">*</span></label>

                    <p class="map-address">English: {{ $warehouse->address_en }}</p>

                    <p class="map-address">Arabic: {{ $warehouse->address_ar }}</p>

                    <input type="hidden" id="address_name" name="address_name" value="{{ $warehouse->address_name }}" required>

                    <input type="hidden" id="address_en" name="address_en" value="{{ $warehouse->address_en }}" required>
                    <input type="hidden" id="city_en" name="city_en" value="{{ $warehouse->city_en }}" required>

                    <input type="hidden" id="address_ar" name="address_ar" value="{{ $warehouse->address_ar }}" required>
                    <input type="hidden" id="city_ar" name="city_ar" value="{{ $warehouse->city_ar }}" required>

                    <input type="hidden" id="latitude" name="latitude" value="{{ $warehouse->latitude }}" required>
                    <input type="hidden" id="longitude" name="longitude" value="{{ $warehouse->longitude }}" required>

                    <p class="place-autocomplete-card form-control input-field" id="place-autocomplete-card"></p>

                    <x-backend.input-error field="address_en"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="description_en" class="form-label label">Description (EN)<span class="asterisk">*</span></label>
                    <textarea type="text" class="form-control textarea input-field" id="description_en" name="description_en" rows="5" placeholder="Description (EN)" value="{{ old('description_en', $warehouse->description_en) }}" required>{{ old('description_en', $warehouse->description_en) }}</textarea>
                </div>

                <div class="col-6 mb-4">
                    <label for="description_ar" class="form-label label">Description (AR)</label>
                    <textarea type="text" class="form-control textarea input-field" id="description_ar" name="description_ar" rows="5" placeholder="Description (AR)" value="{{ old('description_ar', $warehouse->description_ar) }}">{{ old('description_ar', $warehouse->description_ar) }}</textarea>
                </div>

                <div class="col-6 mb-4">
                    <label for="user_id" class="form-label label">Landlord<span class="asterisk">*</span></label>
                    <select class="form-select input-field js-single" id="user_id" name="user_id" required>
                        <option value="">Select landlord</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $warehouse->user_id) == $user->id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="user_id"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="storage_type_id" class="form-label label">Storage Type<span class="asterisk">*</span></label>
                    <select class="form-select input-field js-single" id="storage_type_id" name="storage_type_id" required>
                        <option value="">Select storage type</option>
                        @foreach($storage_types as $storage_type)
                            <option value="{{ $storage_type->id }}" {{ old('storage_type_id', $warehouse->storage_type_id) == $storage_type->id ? 'selected' : '' }}>{{ $storage_type->name_en }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="storage_type_id"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="total_area" class="form-label label">Total Area (Sq.m)<span class="asterisk">*</span></label>
                    <input type="number" class="form-control input-field" id="total_area" name="total_area" placeholder="Total Area" value="{{ old('total_area', $warehouse->total_area) }}" required>
                    <x-backend.input-error field="total_area"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="total_pallets" class="form-label label">Total Pallets<span class="asterisk">*</span></label>
                    <input type="number" class="form-control input-field" id="total_pallets" name="total_pallets" placeholder="Total Pallets" value="{{ old('total_pallets', $warehouse->total_pallets) }}" required>
                    <x-backend.input-error field="total_pallets"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="available_pallets" class="form-label label">Available Pallets<span class="asterisk">*</span></label>
                    <input type="number" class="form-control input-field" id="available_pallets" name="available_pallets" placeholder="Available Pallets" value="{{ old('available_pallets', $warehouse->available_pallets) }}" required>
                    <x-backend.input-error field="available_pallets"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="rent_per_pallet" class="form-label label">Rent Per Pallet<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="rent_per_pallet" name="rent_per_pallet" placeholder="Rent Per Pallet" value="{{ old('rent_per_pallet', $warehouse->rent_per_pallet) }}" required>
                    <x-backend.input-error field="rent_per_pallet"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="pallet_dimension" class="form-label label">Pallet Dimension (L x W x H) cm<span class="asterisk">*</span></label>
                    <select class="form-select input-field js-single" id="pallet_dimension" name="pallet_dimension" required>
                        <option value="">Select pallet dimension</option>
                        <option value="120x80x150" {{ old('pallet_dimension', $warehouse->pallet_dimension) == '120x80x150' ? 'selected' : '' }}>120x80x150</option>
                        <option value="120x100x150" {{ old('pallet_dimension', $warehouse->pallet_dimension) == '120x100x150' ? 'selected' : '' }}>120x100x150</option>
                        <option value="other" {{ old('pallet_dimension', $warehouse->pallet_dimension) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <x-backend.input-error field="pallet_dimension"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4 pallet-dimension-other-value {{ $warehouse->pallet_dimension_other_value == null ? 'd-none' : '' }}">
                    <label for="pallet_dimension_other_value" class="form-label label">Pallet Dimension Other Value (L x W x H) cm<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="pallet_dimension_other_value" name="pallet_dimension_other_value" placeholder="Pallet Dimension Other Value (L x W x H) cm" value="{{ old('pallet_dimension_other_value', $warehouse->pallet_dimension_other_value) }}" {{ $warehouse->pallet_dimension_other_value != null ? 'required' : '' }}>
                    <x-backend.input-error field="pallet_dimension_other_value"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="temperature_type" class="form-label label">Temperature Type<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="dry" id="dry" {{ old('temperature_type', $warehouse->temperature_type) == 'dry' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="dry">Dry</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="ambient" id="ambient" {{ old('temperature_type', $warehouse->temperature_type) == 'ambient' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="ambient">Ambient</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="cold" id="cold" {{ old('temperature_type', $warehouse->temperature_type) == 'cold' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="cold">Cold</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_type" value="freezer" id="freezer" {{ old('temperature_type', $warehouse->temperature_type) == 'freezer' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="freezer">Freezer</label>
                        </div>
                    </div>

                    <x-backend.input-error field="temperature_type"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="temperature_range" class="form-label label">Temperature Range<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="temperature_range" name="temperature_range" placeholder="Temperature Range" value="{{ old('temperature_range', $warehouse->temperature_range) }}" required>
                    <x-backend.input-error field="temperature_range"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="wms" class="form-label label">Warehouse Management System<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wms" value="yes" id="wms_yes" {{ old('wms', $warehouse->wms) == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="wms_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wms" value="no" id="wms_no" {{ old('wms', $warehouse->wms) == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="wms_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="wms"></x-backend.input-error>
                </div>

                <div class="col-4 mb-4">
                    <label for="equipment_handling" class="form-label label">Equipment Handling<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="equipment_handling" value="yes" id="eq_yes" {{ old('equipment_handling', $warehouse->equipment_handling) == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="eq_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="equipment_handling" value="no" id="eq_no" {{ old('equipment_handling', $warehouse->equipment_handling) == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="eq_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="equipment_handling"></x-backend.input-error>
                </div>

                <div class="col-4 mb-4">
                    <label for="temperature_sensor" class="form-label label">Temperature Sensor<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_sensor" value="yes" id="ts_yes" {{ old('temperature_sensor', $warehouse->temperature_sensor) == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="ts_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="temperature_sensor" value="no" id="ts_no" {{ old('temperature_sensor', $warehouse->temperature_sensor) == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="ts_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="temperature_sensor"></x-backend.input-error>
                </div>

                <div class="col-4 mb-4">
                    <label for="humidity_sensor" class="form-label label">Humidity Sensor<span class="asterisk">*</span></label>

                    <div class="radios">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="humidity_sensor" value="yes" id="hs_yes" {{ old('humidity_sensor', $warehouse->humidity_sensor) == 'yes' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="hs_yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="humidity_sensor" value="no" id="hs_no" {{ old('humidity_sensor', $warehouse->humidity_sensor) == 'no' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="hs_no">No</label>
                        </div>
                    </div>

                    <x-backend.input-error field="humidity_sensor"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <label class="form-label label add-label">Features (EN)</label>
                        </div>

                        <div class="col-3 text-end">
                            <button type="button" class="add-row-button add-feature-en">
                                <i class="bi bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    @if($warehouse->features_en)
                        @foreach(json_decode($warehouse->features_en) as $feature)
                            <div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_titles_en[]" value="{{ $feature->title }}" placeholder="Title" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_descriptions_en[]" value="{{ $feature->description }}" placeholder="Description" required>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-12 mb-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <label class="form-label label add-label">Features (AR)</label>
                        </div>

                        <div class="col-3 text-end">
                            <button type="button" class="add-row-button add-feature-ar">
                                <i class="bi bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    @if($warehouse->features_ar)
                        @foreach(json_decode($warehouse->features_ar) as $feature)
                            <div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_titles_ar[]" value="{{ $feature->title }}" placeholder="Title" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_descriptions_ar[]" value="{{ $feature->description }}" placeholder="Description" required>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-12 mb-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <label class="form-label label add-label">Amenities (EN)</label>
                        </div>

                        <div class="col-3 text-end">
                            <button type="button" class="add-row-button add-amenity-en">
                                <i class="bi bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    @if($warehouse->amenities_en)
                        @foreach(json_decode($warehouse->amenities_en) as $amenity)
                            <div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_titles_en[]" value="{{ $amenity->title }}" placeholder="Title" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_descriptions_en[]" value="{{ $amenity->description }}" placeholder="Description" required>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-12 mb-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <label class="form-label label add-label">Amenities (AR)</label>
                        </div>

                        <div class="col-3 text-end">
                            <button type="button" class="add-row-button add-amenity-ar">
                                <i class="bi bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    @if($warehouse->amenities_ar)
                        @foreach(json_decode($warehouse->amenities_ar) as $amenity)
                            <div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_titles_ar[]" value="{{ $amenity->title }}" placeholder="Title" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_descriptions_ar[]" value="{{ $amenity->description }}" placeholder="Description" required>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-12 mb-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <label class="form-label label add-label">Details (EN)</label>
                        </div>

                        <div class="col-3 text-end">
                            <button type="button" class="add-row-button add-detail-en">
                                <i class="bi bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    @if($warehouse->details_en)
                        @foreach(json_decode($warehouse->details_en) as $detail)
                            <div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_titles_en[]" value="{{ $detail->title }}" placeholder="Title" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_descriptions_en[]" value="{{ $detail->description }}" placeholder="Description" required>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-12 mb-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <label class="form-label label add-label">Details (AR)</label>
                        </div>

                        <div class="col-3 text-end">
                            <button type="button" class="add-row-button add-detail-ar">
                                <i class="bi bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    @if($warehouse->details_ar)
                        @foreach(json_decode($warehouse->details_ar) as $detail)
                            <div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_titles_ar[]" value="{{ $detail->title }}" placeholder="Title" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_descriptions_ar[]" value="{{ $detail->description }}" placeholder="Description" required>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_thumbnail" old_value="{{ $warehouse->thumbnail ?? old('thumbnail')  }}" new_name="new_thumbnail" path="warehouses" label="Thumbnail"></x-backend.upload-image>
                    <x-backend.input-error field="new_thumbnail"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_outside_image" old_value="{{ $warehouse->outside_image ?? old('outside_image') }}" new_name="new_outside_image" path="warehouses" label="Outside"></x-backend.upload-image>
                    <x-backend.input-error field="new_outside_image"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_loading_image" old_value="{{ $warehouse->loading_image ?? old('loading_image') }}" new_name="new_loading_image" path="warehouses" label="Loading"></x-backend.upload-image>
                    <x-backend.input-error field="new_loading_image"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_off_loading_image" old_value="{{ $warehouse->off_loading_image ?? old('off_loading_image') }}" new_name="new_off_loading_image" path="warehouses" label="Off Loading"></x-backend.upload-image>
                    <x-backend.input-error field="new_off_loading_image"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_handling_equipment_image" old_value="{{ $warehouse->handling_equipment_image ?? old('handling_equipment_image') }}" new_name="new_handling_equipment_image" path="warehouses" label="Handling Equipment"></x-backend.upload-image>
                    <x-backend.input-error field="new_handling_equipment_image"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-image old_name="old_storage_area_image" old_value="{{ $warehouse->storage_area_image ?? old('storage_area_image') }}" new_name="new_storage_area_image" path="warehouses" label="Storage Area"></x-backend.upload-image>
                    <x-backend.input-error field="new_storage_area_image"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-multi-videos video_count="8" old_name="old_videos" old_value="{{ $warehouse->videos ?? old('videos') }}" new_name="new_videos[]" path="warehouses"></x-backend.upload-multi-videos>
                    <x-backend.input-error field="new_videos.*"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <x-backend.upload-multi-images image_count="4" old_name="old_licenses" old_value="{{ $warehouse->licenses ?? old('licenses') }}" new_name="new_licenses[]" path="warehouses" label="License"></x-backend.upload-multi-images>
                    <x-backend.input-error field="new_licenses.*"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$warehouse"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

    <x-backend.modal-image-preview></x-backend.modal-image-preview>
    <x-backend.modal-video-preview></x-backend.modal-video-preview>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-videos.js') }}"></script>
    <script src="{{ asset('backend/js/google-map.js') }}" data-maps-key="{{ config('services.google_maps.key') }}"></script>

    <script>
        $('#pallet_dimension').on('change', function() {
            let value = $(this).val();

            if(value == 'other') {
                $('.pallet-dimension-other-value').removeClass('d-none');
                $('.pallet-dimension-other-value').find('input').attr('required', true);
            }
            else {
                $('.pallet-dimension-other-value').addClass('d-none');
                $('.pallet-dimension-other-value').find('input').attr('required', false);
                $('.pallet-dimension-other-value').find('input').val('');
            }
        });
    </script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-feature-en').on('click', function() {
            let html = `<div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_titles_en[]" placeholder="Title" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_descriptions_en[]" placeholder="Description" required>
                                </div>

                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-feature-ar').on('click', function() {
            let html = `<div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_titles_ar[]" placeholder="Title" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control input-field" name="feature_descriptions_ar[]" placeholder="Description" required>
                                </div>

                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-amenity-en').on('click', function() {
            let html = `<div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_titles_en[]" placeholder="Title" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_descriptions_en[]" placeholder="Description" required>
                                </div>

                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-amenity-ar').on('click', function() {
            let html = `<div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_titles_ar[]" placeholder="Title" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control input-field" name="amenity_descriptions_ar[]" placeholder="Description" required>
                                </div>

                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-detail-en').on('click', function() {
            let html = `<div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_titles_en[]" placeholder="Title" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_descriptions_en[]" placeholder="Description" required>
                                </div>

                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-detail-ar').on('click', function() {
            let html = `<div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_titles_ar[]" placeholder="Title" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control input-field" name="detail_descriptions_ar[]" placeholder="Description" required>
                                </div>

                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush