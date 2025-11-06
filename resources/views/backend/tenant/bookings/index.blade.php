@extends('backend.layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-3 mb-md-4">
            <div class="col-8">
                <p class="title">Bookings</p>
                <p class="description">Manage booking details here.</p>
            </div>

            <div class="col-12 col-md-4 text-end">
				<a class="add-button popup-open-button">
					<i class="bi bi-envelope"></i>
					Request a Quote
				</a>
			</div>
        </div>

        <div class="row mb-3 mb-md-4">
            <div class="col-12">
                <form class="filter-form">
                    <select class="form-select input-field js-single width" id="selected_warehouse" name="selected_warehouse">
                        <option value="">Select warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ isset($selected_warehouse) && $selected_warehouse == $warehouse->id ? "selected" : "" }}>{{ $warehouse->name_en }}</option>
                        @endforeach
                    </select>

                    <select class="form-select input-field width" name="status">
                        <option value="">Status</option>
                        <option value="1" {{ isset($status) && $status == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ isset($status) && $status == 0 ? "selected" : "" }}>Inactive</option>
                        <option value="2" {{ isset($status) && $status == 2 ? "selected" : "" }}>Pending</option>
                    </select>

                    <button type="button" class="form-control input-field reset">⟲ Reset Filters</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination pagination="{{ $pagination }}"></x-backend.pagination>
            
                <div class="table-container">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col">WAREHOUSE</th>
                                <th scope="col">PALLETS RENTED <i class="bi bi-arrows-vertical sort-icon" data-name="no_of_pallets" data-order="desc"></i></th>
                                <th scope="col">TOTAL RENT <i class="bi bi-arrows-vertical sort-icon" data-name="total_rent" data-order="desc"></i></th>
                                <th scope="col">TENANCY DATE <i class="bi bi-arrows-vertical sort-icon" data-name="tenancy_date" data-order="desc"></i></th>
                                <th scope="col">RENEWAL DATE <i class="bi bi-arrows-vertical sort-icon" data-name="renewal_date" data-order="desc"></i></th>
                                <th scope="col">STATUS <i class="bi bi-arrows-vertical sort-icon" data-name="status" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{!! $item->warehouse !!}</td>
                                        <td>{{ $item->no_of_pallets }}</td>
                                        <td>{{ $item->total_rent ? $item->total_rent . 'SAR' : '-' }}</td>
                                        <td>{{ $item->tenancy_date }}</td>
                                        <td>{{ $item->renewal_date }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="text-align: center;">No data available in the table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div id="pagination">
                    {{ $items->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                </div>
            </div>
        </div>

        <x-backend.delete data="booking"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>

    <div class="warehouse-popup">
		<div class="warehouse-popup-header">
			<p class="popup-title">Search for a specific warehouse</p>
			<p class="popup-description">Fill out this quick form and get started with your searching experience with us.</p>

			<button class="popup-close d-none">
				<i class="bi bi-x-lg"></i>
			</button>
		</div>
			
		<div class="warehouse-popup-body">
			<form action="{{ route('tenant.bookings.search') }}" method="GET" class="form">
				<div class="form-group">
					<label class="form-label" for="location">City</label>

					<select class="form-control input-field" name="location" id="location">
						<option value="">Please select the city you are looking to store in</option>
						@foreach($cities as $city)
							<option value="{{ $city }}">{{ $city }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group">
					<label class="form-label" for="storage_type">Storage Type</label>

					<select class="form-select input-field" name="storage_type">
						<option value="all">Please select the warehouse type</option>
						@foreach($storage_types as $storage_type)
							<option value="{{ $storage_type->id }}" {{ isset($selected_storage_type) && $selected_storage_type == $storage_type->id ? "selected" : "" }}>
								{{ $storage_type->name_en }}
							</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group">
					<label class="form-label" for="licensing">Licensing <span class="optional">(Optional)</span></label>
					<select class="form-control input-field" id="licensing" name="licensing" >
						<option value="all">Choose</option>
						<option value="Retail">Retail</option>
						<option value="E-commerce">E-commerce</option>
						<option value="Manufacturing">Manufacturing</option>
						<option value="Logistics & Transportation">Logistics & Transportation</option>
						<option value="Food & Beverage">Food & Beverage</option>
						<option value="Pharmaceuticals">Pharmaceuticals</option>
						<option value="Automotive">Automotive</option>
						<option value="Textiles & Apparel">Textiles & Apparel</option>
						<option value="Electronics">Electronics</option>
						<option value="Construction">Construction</option>
						<option value="Consumer Goods">Consumer Goods</option>
						<option value="Chemicals">Chemicals</option>
						<option value="Furniture & Home Goods">Furniture & Home Goods</option>
						<option value="Aerospace">Aerospace</option>
						<option value="Energy & Utilities">Energy & Utilities</option>
					</select>
				</div>
				
				<div class="form-group">
					<label class="form-label">Warehouse Type</label>
					<div class="storage-option active" value="pallet">
						<div class="row">
							<div class="col-12 col-sm-9">
								<p class="type-title">Pallets</p>
								<ul class="type-points">
									<li><strong>Pallet:</strong> The bottom base on which cartons/boxes are arranged.</li>
									<li><strong>Standard Pallet Dimensions:</strong> 1.2m (L) x 1.0m (W) x 1.6m (H)</li>
									<li><strong>This option is ideal if:</strong> your stock is coming directly from suppliers/manufacturers on pallets, or for separate cartons/boxes that can be placed on pallets (additional costs might incur for pallet building).</li>
								</ul>
							</div>

							<div class="col-12 col-sm-3 text-end">
								<img src="{{ asset('storage/backend/pallets.png') }}" alt="Pallets" class="type-image">
							</div>
						</div>
					</div>

					<div class="storage-option" value="free-space">
						<div class="row">
							<div class="col-12 col-sm-9">
								<p class="type-title">Free Space</p>
								<ul class="type-points">
									<li><strong>Floor area:</strong> is measured in square meters, with a height of 1.5m. It serves various purposes, particularly for accommodating heavy equipment or anything that cannot be placed on a pallet.</li>
								</ul>
							</div>

							<div class="col-12 col-sm-3 text-end">
								<img src="{{ asset('storage/backend/free-space.png') }}" alt="Free Space" class="type-image">
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-group number-of-pallets">
					<label class="form-label" for="no_of_pallets">How many pallet positions do you expect to reserve?<span class="asterisk">*</span></label>
					<input type="number" class="form-control input-field" id="no_of_pallets" name="no_of_pallets" placeholder="Number of pallets" min="0" required>
				</div>

				<div class="form-group square-meters d-none">
					<label class="form-label" for="no_of_square_meters">How much sq.m do you expect to reserve?<span class="asterisk">*</span></label>
					<input type="number" class="form-control input-field" id="no_of_square_meters" name="no_of_square_meters" placeholder="Sq.m" min="0">
				</div>

				<div class="row form-group">
					<div class="col-6">
						<label class="form-label" for="tenancy_date">Tenancy Date<span class="asterisk">*</span></label>
						<input type="text" class="form-control input-field date-picker-field" id="tenancy_date" name="tenancy_date" value="{{ old('tenancy_date') }}" required>
					</div>

					<div class="col-6">
						<label class="form-label" for="renewal_date">Renewal Date<span class="asterisk">*</span></label>
						<input type="text" class="form-control input-field date-picker-field" id="renewal_date" name="renewal_date" value="{{ old('renewal_date') }}" required>
					</div>
				</div>
				
				<div class="form-group buttons">
					<button type="button" class="popup-cancel-button">Cancel</button>
					<button type="submit" class="search-button">Search</button>
				</div>
			</form>
		</div>
	</div>
@endsection


@push('after-scripts')
    <script>
        window.moduleRoutes = {
            destroyRoute: "{{ route('tenant.bookings.destroy', [':id']) }}",
            filterRoute: "{{ route('tenant.bookings.filter') }}",
            indexRoute: "{{ route('tenant.bookings.index') }}",
            pageUrl: "{!! $items->url(1) !!}"
        };
    </script>

    <script src="{{ asset('backend/js/index-script.js') }}"></script>

    <script>
		document.addEventListener('DOMContentLoaded', function () {
            const tenancyInput = document.getElementById('tenancy_date');
            const renewalInput = document.getElementById('renewal_date');

            setTimeout(() => {
                tenancyInput.removeAttribute('readonly');
                renewalInput.removeAttribute('readonly');
            }, 100);

            tenancyInput.addEventListener('keydown', function (e) {
                e.preventDefault();
            });
            renewalInput.addEventListener('keydown', function (e) {
                e.preventDefault();
            });
        });

        $('#tenure_start').on('change', function() {
            let value = $(this).val()
            $('#tenancy_date').val(value);
        });

        $('#tenure_end').on('change', function() {
            let value = $(this).val()
            $('#renewal_date').val(value);
        });

		$('.popup-open-button').on('click', function() {
			$('.warehouse-popup').toggleClass('active');
			$('.popup-close').toggleClass('d-none');
		})

		$('.popup-close, .popup-cancel-button').on('click', function() {
			$('.warehouse-popup').toggleClass('active');
			$('.popup-close').toggleClass('d-none');
		})

		$('.storage-option').on('click', function() {
			$(this).toggleClass('active');
			$(this).siblings().toggleClass('active');

			let value = $(this).attr('value');

			if(value == 'pallet') {
				$('.number-of-pallets').removeClass('d-none');
				$('.number-of-pallets').find('input').attr('required', true);
				
				$('.square-meters').addClass('d-none');
				$('.square-meters').find('input').val('');
				$('.square-meters').find('input').attr('required', false);
			}
			else {
				$('.square-meters').removeClass('d-none');
				$('.square-meters').find('input').attr('required', true);

				$('.number-of-pallets').addClass('d-none');
				$('.number-of-pallets').find('input').val('');
				$('.number-of-pallets').find('input').attr('required', false);
			}
		})

		$(document).ready(function() {
            setMinRenewalDate();
        });

		$('#tenancy_date').on('change', function() {
            setMinRenewalDate();
        });

        function setMinRenewalDate() {
            const tenancyDate = document.getElementById('tenancy_date').value;
            
            if(tenancyDate) {
                const dateParts = tenancyDate.split('-');
                if(dateParts.length === 3) {
                    const year = parseInt(dateParts[0], 10);
                    const month = parseInt(dateParts[1], 10) - 1;
                    const day = parseInt(dateParts[2], 10);
                    const tenancyDateObj = new Date(year, month, day);
                    
                    tenancyDateObj.setMonth(tenancyDateObj.getMonth() + 1);
                    const renewalDateInput = document.getElementById('renewal_date');
                    var datePicker = renewalDateInput.DatePickerX;
                    datePicker.remove();

                    renewalDateInput.DatePickerX.init({
                        format: 'yyyy-mm-dd',
                        minDate: tenancyDateObj,
                    });

                    renewalDateInput.DatePickerX.setValue(tenancyDateObj);
                    renewalDateInput.setAttribute('min', tenancyDateObj.toISOString().split('T')[0]);
                }
        	}
        }
	</script>
@endpush