@extends('backend.layouts.app')

@section('title','Warehouses')

@push('after-styles')
    <link href="{{ asset('backend/css/filter-results.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="page">
        <div class="row align-items-center mb-3 mb-md-4">
			<div class="col-12">
				<p class="title">Warehouses</p>
				<p class="description">Select your preferred warehouse.</p>
			</div>
		</div>

        <div class="row">
            <div class="col-4">
                @foreach($warehouses as $warehouse)
                    <div class="single-warehouse">
                        <p class="name">
                            {{ $warehouse->name_en }}
                        </p>

                        <p class="description">
                            {{ $warehouse->short_description_en }}
                        </p>

                        <p class="location">
                            <i class="bi bi-geo-alt"></i>
                            {{ $warehouse->city_en }}
                        </p>

                        <div class="warehouse-details">
                            <div class="detail-row">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>Al Quds St., Riyadh</span>
                            </div>
                            <div class="detail-row">
                                <i class="bi bi-thermometer"></i>
                                <span>Temp Controlled</span>
                            </div>
                            <div class="detail-row">
                                <i class="bi bi-clock"></i>
                                <span>08.00 AM - 05:00 PM (Except Fridays)</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $warehouses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>

            {{-- Right Column - Image Gallery and Details --}}
            <div class="col-8">
                {{-- Image Gallery --}}
                <div class="warehouse-gallery">
                    <img src="{{ asset('storage/frontend/filter_image.png') }}" alt="Warehouse Image" class="gallery-main-image">
                    <div class="gallery-dots">
                        <div class="dot active"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>

                {{-- Detailed Warehouse Card --}}
                <div class="warehouse-detail-card">
                    <div class="warehouse-detail-header">
                        <h3 class="warehouse-detail-title">Riyadh Logistics Hub</h3>
                    </div>
                    
                    <div class="warehouse-detail-info">
                        <div class="info-row">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Al Quds St., Riyadh</span>
                        </div>
                        <div class="info-row">
                            <i class="bi bi-thermometer"></i>
                            <span>Temp Controlled</span>
                        </div>
                        <div class="info-row">
                            <i class="bi bi-clock"></i>
                            <span>08.00 AM - 05:00 PM (Except Fridays)</span>
                        </div>
                        <div class="info-row">
                            <i class="bi bi-star-fill"></i>
                            <span>Avg. Inbound Rating</span>
                        </div>
                        <div class="info-row">
                            <i class="bi bi-star-fill"></i>
                            <span>Avg. Outbound Rating</span>
                        </div>
                        <div class="info-row">
                            <i class="bi bi-cart"></i>
                            <span>Accepts Q-Commerce Orders? No</span>
                        </div>
                    </div>

                    {{-- Licenses --}}
                    <div class="licenses-section">
                        <h4>Licenses</h4>
                        <div class="license-tags">
                            <span class="license-tag">Cosmetics</span>
                            <span class="license-tag">Food</span>
                            <span class="license-tag">Pharmaceuticals</span>
                        </div>
                    </div>

                    {{-- Map --}}
                    <div class="map-section">
                        <h4>Map</h4>
                        <div class="map-container">
                            <img src="{{ asset('storage/frontend/test_map.png') }}" alt="Map" class="map-image">
                        </div>
                    </div>

                    {{-- Storage Price --}}
                    <div class="storage-price-section">
                        <div class="price-header">
                            <h4>Storage Price</h4>
                        </div>
                        <div class="price-table">
                            <table class="storage-table">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>1-50</th>
                                        <th>51-100</th>
                                        <th>101-200</th>
                                        <th>200+</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ambient Pallet | Feed Items | 18°-27°C</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>Book A Call</td>
                                    </tr>
                                    <tr>
                                        <td>Ambient Food Pallet</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>Book A Call</td>
                                    </tr>
                                    <tr>
                                        <td>Ambient Pallet | Cosmotology Goods | 18°-27°C</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>Book A Call</td>
                                    </tr>
                                    <tr>
                                        <td>Ambient Medical Supplies</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>80 SAR</td>
                                        <td>Book A Call</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Warehouse Services --}}
                    <div class="warehouse-services-section">
                        <h4>Warehouse Services</h4>
                        <div class="services-grid">
                            <div class="services-column">
                                <div class="service-item">
                                    <i class="bi bi-check-circle-fill check-icon"></i>
                                    <span>Pallet storage services</span>
                                </div>
                                <div class="service-item">
                                    <i class="bi bi-check-circle-fill check-icon"></i>
                                    <span>B2B fulfillment services</span>
                                </div>
                                <div class="service-item">
                                    <i class="bi bi-check-circle-fill check-icon"></i>
                                    <span>B2C fulfillment services</span>
                                </div>
                                <div class="service-item">
                                    <i class="bi bi-check-circle-fill check-icon"></i>
                                    <span>Loading & unloading services</span>
                                </div>
                                <div class="service-item">
                                    <i class="bi bi-check-circle-fill check-icon"></i>
                                    <span>Offers palletization services</span>
                                </div>
                            </div>
                            <div class="services-column">
                                <div class="service-item">
                                    <i class="bi bi-check-circle-fill check-icon"></i>
                                    <span>Loose container unloading</span>
                                </div>
                                <div class="service-item">
                                    <i class="bi bi-check-circle-fill check-icon"></i>
                                    <span>Bulky goods</span>
                                </div>
                                <div class="service-item">
                                    <i class="bi bi-x-circle-fill x-icon"></i>
                                    <span>Accepts same day orders</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Get Quote Button --}}
                    <div class="quote-button-section">
                        <a href="{{ route('tenant.warehouses.approve-quote') }}" class="get-quote-btn">
                            Get A Instant Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
