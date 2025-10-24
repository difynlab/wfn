@extends('backend.layouts.app')

@section('title','Review and Approve')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-3 mb-md-4">
			<div class="col-12">
				<p class="title">Review and Approve Quote</p>
				<p class="description">Customize your selected quota depending on your needs.</p>
			</div>
		</div>

        <div class="content">
            <form action="{{ route('tenant.warehouses.booking') }}" method="POST" class="form">
                @csrf
                <div class="quote-inputs">
                    <div class="input-container">
                        <label class="form-label">No of Pallets</label>
                        <div class="number-controls">
                            <button type="button" class="btn-minus btn-pallet-minus">-</button>
                            <p id="pallets" class="number-input">{{ session('no_of_pallets') ?? 0 }}</p>
                            <input type="hidden" id="pallets-input" name="no_of_pallets" value="{{ session('no_of_pallets') ?? 0 }}">
                            <button type="button" class="btn-plus btn-pallet-plus">+</button>
                        </div>
                    </div>

                    <div class="separator"></div>

                    <div class="input-container">
                        <label class="form-label">No of SqM</label>
                        <div class="number-controls">
                            <button type="button" class="btn-minus btn-sqm-minus">-</button>
                            <p id="sqm" class="number-input">{{ session('square_meters') ?? 0 }}</p>
                            <input type="hidden" id="sqm-input" name="square_meters" value="{{ session('square_meters') ?? 0 }}">
                            <button type="button" class="btn-plus btn-sqm-plus">+</button>
                        </div>
                    </div>
                </div>

                <div class="price-section">
                    <div class="accordion" id="accordion">
                        @if($warehouse->storage_charges)
                            <div class="accordion-item card">
                                <h2 class="accordion-header">
                                    <button class="accordion-button price-title" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Storage Charges
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NAME</th>
                                                    <th class="second-column">PRICE</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach(json_decode($warehouse->storage_charges) as $storage_charge)
                                                    <tr>
                                                        <td>{{ $storage_charge->name }}</td>
                                                        <td>{{ $storage_charge->price }} SAR</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="accordion-item card">
                            <h2 class="accordion-header">
                                <button class="accordion-button price-title" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Movement Services
                                </button>
                            </h2>

                            <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>NAME</th>
                                                <th class="second-column">PRICE</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach(json_decode($warehouse->movement_services) as $movement_service)
                                                <tr>
                                                    <td>{{ $movement_service->name }}</td>
                                                    <td>{{ $movement_service->price }} SAR</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item card">
                            <h2 class="accordion-header">
                                <button class="accordion-button price-title" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Pallet Services
                                </button>
                            </h2>

                            <div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>NAME</th>
                                                <th class="second-column">PRICE</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach(json_decode($warehouse->pallet_services) as $pallet_service)
                                                <tr>
                                                    <td>{{ $pallet_service->name }}</td>
                                                    <td>{{ $pallet_service->price }} SAR</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('tenant.warehouses.cancel') }}" class="btn-cancel">Cancel</a>
                    <input type="hidden" name="warehouse_id" value="{{ $warehouse->id }}">
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                    <x-backend.input-error field="recaptcha_token"></x-backend.input-error>
                    <button type="submit" class="btn-approve">Approve Quote</button>
                    <!-- <button type="button" class="btn-save">Save Changes</button> -->
                </div>
            </form>
        </div>

        <x-backend.notification></x-backend.notification>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/recaptcha.js') }}"></script>

    <script>
        window.recaptchaAction = 'booking';
    </script>

    <script>
        $('.btn-pallet-plus').on('click', function() {
            let value = $('#pallets-input').val();
            value = parseInt(value) + 1;

            $('#pallets-input').prev().text(value);
            $('#pallets-input').val(value);
        });

        $('.btn-pallet-minus').on('click', function() {
            let value = $('#pallets-input').val();
            value = parseInt(value) - 1;

            if(value < 0) {
                return;
            }

            $('#pallets-input').prev().text(value);
            $('#pallets-input').val(value);
        });

        $('.btn-sqm-plus').on('click', function() {
            let value = $('#sqm-input').val();
            value = parseInt(value) + 1;

            $('#sqm-input').prev().text(value);
            $('#sqm-input').val(value);
        });

        $('.btn-sqm-minus').on('click', function() {
            let value = $('#sqm-input').val();
            value = parseInt(value) - 1;

            if(value < 0) {
                return;
            }

            $('#sqm-input').prev().text(value);
            $('#sqm-input').val(value);
        });
    </script>
@endpush
