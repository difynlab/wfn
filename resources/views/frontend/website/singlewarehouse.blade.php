@extends('frontend.layouts.app')

@section('title', 'Singlewarehouse')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/singlewarehouse.css') }}">
@endpush
 
@section('content')
    <div class="singlewarehouse container">
        <div class="section-1 container">
            <div class="row">
                <div class="col-8">
                    <img src="{{ asset('storage/frontend/sw-1.png') }}" class="card-image" alt="Warehouse">
                </div>
                <div class="col-4">
                    <div class="col">
                        <img src="{{ asset('storage/frontend/sw-2.png') }}" class="card-image" alt="Warehouse">
                    </div>
                    <div class="col">
                        <img src="{{ asset('storage/frontend/sw-3.png') }}" class="card-image" alt="Warehouse">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="section-2 container">
            <div class="row">
                <div class="col-8">
                    <div class="row profile-row">
                        <div class="col-1">
                            <img src="{{ asset('storage/frontend/wsp-1.png') }}" class="profile-img" alt="Profile">
                        </div>
                        <div class="col-6">
                            <p class="profile-name">Ahmed Al-Mansoori</p>
                            <p class="profile-exp">3 years of experience as lender</p>
                        </div>
                        <div class="col-1 icon-cell"><i class="bi bi-heart text-danger fs-5"></i></div>
                        <div class="col-1 icon-cell"><i class="bi bi-chat-left text-danger fs-5"></i></div>
                        <div class="col-3 expert-link text-danger">Talk to an Expert</div>
                    </div>
                    <div class="row title-row">
                        <div class="col-8">
                            <h1 class="warehouse-title">Al-Falah Distribution Center</h1>
                            <p class="warehouse-location">Al Quds Street, Warehouse No. 35, Industrial City, Riyadh, Saudi Arabia</p>
                        </div>
                        <div class="col-4 text-end">
                            <div class="row">
                                <div class="col-6 rating-box">
                                    <p class="rating-score">4.84</p>
                                    <p class="rating-label">Rating</p>
                                </div>
                                <div class="col-6 rating-box">
                                    <p class="rating-score">120</p>
                                    <p class="rating-label">Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="warehouse-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia nulla deserunt mollit anim id est laborum.
                    </p>
                    <div class="row feature-row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-1"><i class="bi bi-calendar4 fs-5"></i></div>
                                <div class="col-11">
                                    <p class="feature-title">Free cancellation before 1 week</p>
                                    <p class="feature-sub">Get a full refund</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-1"><i class="bi bi-people fs-5"></i></div>
                                <div class="col-11">
                                    <p class="feature-title">Private Washrooms</p>
                                    <p class="feature-sub">Private washrooms facilities plus a public toilet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="amenities">
                        <p class="amenities-title">Other Amenities</p>
                        <div class="row">
                            <div class="col-6">
                                <div class="row amenity-item">
                                    <div class="col-1"><i class="bi bi-box fs-5"></i></div>
                                    <div class="col-11">
                                        <p class="amenity-title">Size</p>
                                        <p class="amenity-sub">25,000 sq ft</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row amenity-item">
                                    <div class="col-1"><i class="bi bi-box fs-5"></i></div>
                                    <div class="col-11">
                                        <p class="amenity-title">Lorem ipsum dolor sit amet</p>
                                        <p class="amenity-sub">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row amenity-item">
                                    <div class="col-1"><i class="bi bi-box fs-5"></i></div>
                                    <div class="col-11">
                                        <p class="amenity-title">Lorem ipsum dolor sit amet</p>
                                        <p class="amenity-sub">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row amenity-item">
                                    <div class="col-1"><i class="bi bi-box fs-5"></i></div>
                                    <div class="col-11">
                                        <p class="amenity-title">Lorem ipsum dolor sit amet</p>
                                        <p class="amenity-sub">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row amenity-item">
                                    <div class="col-1"><i class="bi bi-box fs-5"></i></div>
                                    <div class="col-11">
                                        <p class="amenity-title">Lorem ipsum dolor sit amet</p>
                                        <p class="amenity-sub">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row amenity-item">
                                    <div class="col-1"><i class="bi bi-box fs-5"></i></div>
                                    <div class="col-11">
                                        <p class="amenity-title">Lorem ipsum dolor sit amet</p>
                                        <p class="amenity-sub">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="booking-box">
                        <p class="total-cost">Total Cost</p>
                        <p class="unlock-pricing">Unlock Pricing <i class="bi bi-lock text-danger"></i></p>
                        <div class="date-picker">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <p>Check in</p>
                                    <p>Add dates</p>
                                </div>
                                <div class="col-6 text-center">
                                    <p>Check out</p>
                                    <p>Add dates</p>
                                </div>
                            </div>
                        </div>
                        <button class="book-now-btn">Book Now</button>
                        <p class="note">You won’t be charged yet</p>
                    </div>
                    <p class="report-link">
                        <i class="bi bi-flag"></i>
                        <span class="underline-link">Report this listing</span>
                    </p>
                    <div class="lender-info">
                        <p class="lender-heading">More about Lender</p>
                        <ul class="lender-details list-unstyled">
                            <li><i class="bi bi-flag"></i> Speaks in English & Arabic</li>
                            <li><i class="bi bi-flag"></i> Usually replies within an hour</li>
                            <li><i class="bi bi-flag"></i> Lives in Saudi Arabia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="section-3 container">
            <div class="map-wrapper">
                <hr class="map-separator">
                <img src="{{ asset('storage/frontend/singlewarehouse-map.png') }}" class="map-image" alt="Warehouse Location on Map">
                <hr class="map-separator">
            </div>
        </div>


        <div class="section-4 container">
            <p class="review-heading">Client Reviews</p>
            <div class="review-box">
                <div class="review-item">
                    <p class="review-stars">
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                    </p>
                    <p class="review-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p class="review-author">
                        <span class="author-name">Danial Mark</span>
                        <span class="author-divider">|</span>
                        <span class="author-role">Marketing Coordinator</span>
                    </p>
                </div>
                <div class="review-item">
                    <p class="review-stars">
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                        <i class="bi bi-star-fill text-danger"></i>
                    </p>
                    <p class="review-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p class="review-author">
                        <span class="author-name">Aliqua Amet</span>
                        <span class="author-divider">|</span>
                        <span class="author-role">Lorem ipsum dolor</span>
                    </p>
                </div>
            </div>
            <hr class="separator">
        </div>


        <div class="section-5 container">
            <p class="policy-heading">More Details on Policies & Safety</p>
            <div class="row">
                <div class="col-6 policy-block">
                    <p class="policy-title">Lorem ipsum dolor sit amet consect</p>
                    <p class="policy-desc">
                        Lorem ipsum dolor sit amet, consecte tur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="col-6 policy-block">
                    <p class="policy-title">Lorem ipsum dolor sit amet consect</p>
                    <p class="policy-desc">
                        Lorem ipsum dolor sit amet, consecte tur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
            <hr class="section-divider">
        </div>


        <div class="section-6 container">
            <p class="section-title">More available warehouses in the same area</p>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('storage/frontend/warehouse-c-1.png') }}" class="card-image" alt="Warehouse">
                        <div class="card-body">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('storage/frontend/warehouse-c-2.png') }}" class="card-image" alt="Warehouse">
                        <div class="card-body">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 8,377.87</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('storage/frontend/warehouse-c-3.png') }}" class="card-image" alt="Warehouse">
                        <div class="card-body">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset('storage/frontend/warehouse-c-4.png') }}" class="card-image" alt="Warehouse">
                        <div class="card-body">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 16,987.90</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-modal container" id="lotReservationModal" style="display: none;">
            <div class="modal-overlay"></div>
            <div class="modal-content wide-modal">
                <div style="display: flex; justify-content: flex-end;">
                    <span class="modal-close" onclick="closeModal()"><i class="bi bi-x"></i></span>
                </div>
                <p class="modal-title">Choose Your Warehouse Spaces</p>
                <p class="modal-subtitle">Select the warehouse lots that meet your storage requirements</p>
                <div class="legend-box text-center">
                    <span class="legend available">Available</span>
                    <span class="legend reserved">Reserved</span>
                    <span class="legend selected">Selected</span>
                </div>
                <div class="lot-grid">
                    <div class="lot-row">
                        <div class="lot available">A1</div>
                        <div class="lot available">A2</div>
                        <div class="lot empty"></div>
                        <div class="lot available">A3</div>
                        <div class="lot available">A4</div>
                        <div class="lot available">A5</div>
                        <div class="lot available">A6</div>
                        <div class="lot empty"></div>
                        <div class="lot available">A7</div>
                        <div class="lot available">A8</div>
                        <div class="lot available">A9</div>
                        <div class="lot available">A10</div>
                        <div class="lot empty"></div>
                        <div class="lot reserved">A11</div>
                        <div class="lot reserved">A12</div>
                        <div class="lot empty"></div>
                        <div class="lot reserved">A13</div>
                        <div class="lot reserved">A14</div>
                        <div class="lot reserved">A15</div>
                        <div class="lot reserved">A16</div>
                        <div class="lot reserved">A17</div>
                    </div>
                    <div class="lot-row">
                        <div class="lot available">F1</div>
                        <div class="lot available">F2</div>
                        <div class="lot empty"></div>
                        <div class="lot reserved">F3</div>
                        <div class="lot reserved">F4</div>
                        <div class="lot reserved">F5</div>
                        <div class="lot reserved">F6</div>
                        <div class="lot empty"></div>
                        <div class="lot reserved">F7</div>
                        <div class="lot reserved">F8</div>
                        <div class="lot reserved">F9</div>
                        <div class="lot reserved">F10</div>
                        <div class="lot empty"></div>
                        <div class="lot available">F11</div>
                        <div class="lot available">F12</div>
                        <div class="lot empty"></div>
                        <div class="lot available">F13</div>
                        <div class="lot available">F14</div>
                        <div class="lot available">F15</div>
                        <div class="lot available">F16</div>
                        <div class="lot available">F17</div>
                    </div>
                    <div class="lot-row">
                        <div class="lot available">B1</div>
                        <div class="lot available">B2</div>
                        <div class="lot empty"></div>
                        <div class="lot reserved">B3</div>
                        <div class="lot reserved">B4</div>
                        <div class="lot reserved">B5</div>
                        <div class="lot reserved">B6</div>
                        <div class="lot empty"></div>
                        <div class="lot selected">B7</div>
                        <div class="lot selected">B8</div>
                        <div class="lot selected">B9</div>
                        <div class="lot selected">B10</div>
                        <div class="lot empty"></div>
                        <div class="lot available">B11</div>
                        <div class="lot available">B12</div>
                        <div class="lot empty"></div>
                        <div class="lot available">B13</div>
                        <div class="lot available">B14</div>
                        <div class="lot available">B15</div>
                        <div class="lot available">B16</div>
                        <div class="lot available">B17</div>
                    </div>
                    <div class="lot-row">
                        <div class="lot available">H1</div>
                        <div class="lot available">H2</div>
                        <div class="lot empty"></div>
                        <div class="lot available">H3</div>
                        <div class="lot available">H4</div>
                        <div class="lot available">H5</div>
                        <div class="lot available">H6</div>
                        <div class="lot empty"></div>
                        <div class="lot available">H7</div>
                        <div class="lot available">H8</div>
                        <div class="lot available">H9</div>
                        <div class="lot available">H10</div>
                        <div class="lot empty"></div>
                        <div class="lot reserved">H11</div>
                        <div class="lot reserved">H12</div>
                        <div class="lot empty"></div>
                        <div class="lot reserved">H13</div>
                        <div class="lot reserved">H14</div>
                        <div class="lot reserved">H15</div>
                        <div class="lot reserved">H16</div>
                        <div class="lot reserved">H17</div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="confirm-btn">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.book-now-btn').addEventListener('click', function () {
            document.getElementById('lotReservationModal').style.display = 'block';
        });
    });

    function closeModal() {
        document.getElementById('lotReservationModal').style.display = 'none';
    }
</script>
