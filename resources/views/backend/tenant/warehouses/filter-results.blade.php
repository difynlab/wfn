@extends('backend.layouts.app')
@section('title','Warehouses')

@push('after-styles')
<link href="{{ asset('backend/css/tenant-warehouses.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/filter-results.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="page-wrap">
    {{-- Header --}}
    <div class="tw-header mb-3">
        <div>
            <h1 class="tw-title">Warehouses</h1>
            <div class="tw-desc">Manage Warehouse details and activities here.</div>
        </div>
    </div>

    {{-- Main Content Layout - Exactly like the image --}}
    <div class="warehouse-layout">
        {{-- Left Column - Warehouse Listings --}}
        <div class="warehouse-listings">
            {{-- Warehouse Card 1 --}}
            <div class="warehouse-item">
                <div class="warehouse-content">
                    <h3 class="warehouse-name">Riyadh Logistics Hub</h3>
                    <p class="warehouse-description">Orem ipsum dolor sit amet, consectetur Lorem ipsum consect tur Lorem ipsum dolor sit amt onsectetu.</p>
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
            </div>

            {{-- Warehouse Card 2 --}}
            <div class="warehouse-item">
                <div class="warehouse-content">
                    <h3 class="warehouse-name">Lorem ipsum dolor</h3>
                    <p class="warehouse-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    <div class="warehouse-details">
                        <div class="detail-row">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>King Fahd Road, Jeddah</span>
                        </div>
                        <div class="detail-row">
                            <i class="bi bi-thermometer"></i>
                            <span>Dry Storage</span>
                        </div>
                        <div class="detail-row">
                            <i class="bi bi-clock"></i>
                            <span>07.00 AM - 06:00 PM (Except Fridays)</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Warehouse Card 3 --}}
            <div class="warehouse-item">
                <div class="warehouse-content">
                    <h3 class="warehouse-name">Lorem ipsum dolor</h3>
                    <p class="warehouse-description">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                    <div class="warehouse-details">
                        <div class="detail-row">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Prince Mohammed St., Dammam</span>
                        </div>
                        <div class="detail-row">
                            <i class="bi bi-thermometer"></i>
                            <span>General Storage</span>
                        </div>
                        <div class="detail-row">
                            <i class="bi bi-clock"></i>
                            <span>08.30 AM - 05:30 PM (Except Fridays)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column - Image Gallery and Details --}}
        <div class="warehouse-details-section">
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

@push('after-scripts')
<script>
    // Add any JavaScript functionality here if needed
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll to top when page loads
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endpush
