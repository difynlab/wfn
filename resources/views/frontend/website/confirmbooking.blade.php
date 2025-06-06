@extends('frontend.layouts.app')

@section('title', 'Confirmbooking')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/confirmbooking.css') }}">
@endpush


@section('content')

    <div class="confirmbooking container">
        <div class="section-1 container">
            <p class="section-title">Confirm Booking</p>
            <p class="section-description">
                Review your booking details and confirm your reservation.
            </p>
            <div class="row">
                <div class="col-6">
                    <div class="row left-card">
                        <div class="col-12">
                            <div class="property-info">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="{{ asset('storage/frontend/sw-1.png') }}" alt="Property Image" class="property-image">
                                    </div>
                                    <div class="col-10">
                                        <p class="property-title">Al-Falah Distribution Center</p>
                                        <p class="property-subtitle">Entire Blog (25,000 sq ft)</p>
                                        <div class="rating">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <span class="rating-value">4.50</span>
                                            <span class="rating-count">(91 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="price-details">
                                <p class="price-title">Price Details</p>
                                <div class="row">
                                    <p class="col-9">Lorem ipsum dolor</p>
                                    <p class="col-3 price">SAR 13,250.62</p>
                                </div>
                                <div class="row">
                                    <p class="col-9">Duis aute irure</p>
                                    <p class="col-3 price">SAR 2,994.72</p>
                                </div>
                                <div class="row total">
                                    <p class="col-9">Total (USD)</p>
                                    <p class="col-3">SAR 16,273.90</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row left-card">
                        <div class="col-12">
                            <p class="booking-title">Booking Details</p>
                            <div class="row">
                                <div class="col-10">
                                    <p class="label">Reserved Duration</p>
                                    <p class="value">Mar 5 – Jun 5</p>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#warehouseModal">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                </div>
                            </div>
                            <div class="short-border"></div>
                            <div class="row">
                                <div class="col-10">
                                    <p class="label">Lot Details</p>
                                    <p class="value">Lorem ipsum dolor</p>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#warehouseModal">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                </div>
                            </div>
                            <div class="short-border"></div>
                            <div class="row">
                                <div class="col-10">
                                    <p class="label">Lorem ipsum dolor</p>
                                    <p class="value">Lorem ipsum dolor</p>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#warehouseModal">
                                        <i class="bi bi-pencil-square"></i> 
                                        Edit 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="right-card">
                        <p class="right-info">
                            Sign in or sign up to proceed with your booking.
                        </p>
                        <form>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Please enter your username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-with-icon">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                    <!-- <i class="bi bi-eye password-toggle"></i> -->
                                    <i class="bi bi-eye-slash password-toggle"></i>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Password
                                    </label>
                                </div>
                                <div class="col-4">
                                    <a href="#" class="forgot-password">Forgot Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-continue">Continue</button>
                        </form>
                        <button class="btn btn-outline-google">
                            <i class="bi bi-google"></i>
                            Continue with Google
                        </button>
                        <button class="btn btn-outline-email">
                            <i class="bi bi-envelope"></i>
                            Register with Email
                        </button>
                        <p class="or-text">Or</p>
                        <div class="phone-group">
                            <label for="country-code">Country Code</label>
                            <select id="country-code" class="form-control">
                                <option>Saudi Arabia (+966)</option>
                            </select>
                            <input type="text" class="form-control phone-number" placeholder="Phone Number">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade warehouse-modal" id="warehouseModal" tabindex="-1" aria-labelledby="warehouseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="w-100 text-center pt-4">
                        <h5 class="modal-title" id="warehouseModalLabel">Choose Your Warehouse Spaces</h5>
                        <p class="modal-subtitle">Select the warehouse lots that meet your storage requirements</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row legend-row">
                        <div class="col-3">
                            <p class="lot-title">Lot Reservation</p>
                        </div>
                        <div class="col-9">
                            <div class="lot-legend">
                                <span><span class="legend-box available"></span> Available</span>
                                <span><span class="legend-box reserved"></span> Reserved</span>
                                <span><span class="legend-box selected"></span> Selected</span>
                            </div>
                        </div>
                    </div>
                    <div class="lot-grid">
                        <div class="lot-row">
                            <span class="lot available">A1</span>
                            <span class="lot available">A2</span>
                            <span class="lot space"></span>
                            <span class="lot available">A3</span>
                            <span class="lot available">A4</span>
                            <span class="lot available">A5</span>
                            <span class="lot available">A6</span>
                            <span class="lot space"></span>
                            <span class="lot available">A7</span>
                            <span class="lot available">A8</span>
                            <span class="lot available">A9</span>
                            <span class="lot available">A10</span>
                            <span class="lot space"></span>
                            <span class="lot reserved">A11</span>
                            <span class="lot reserved">A12</span>
                            <span class="lot reserved">A13</span>
                            <span class="lot reserved">A14</span>
                            <span class="lot reserved">A15</span>
                            <span class="lot space"></span>
                            <span class="lot reserved">A16</span>
                            <span class="lot reserved">A17</span>
                        </div>
                        <div class="lot-row">
                            <span class="lot available">F1</span>
                            <span class="lot available">F2</span>
                            <span class="lot space"></span>
                            <span class="lot reserved">F3</span>
                            <span class="lot reserved">F4</span>
                            <span class="lot reserved">F5</span>
                            <span class="lot reserved">F6</span>
                            <span class="lot space"></span>
                            <span class="lot reserved">F7</span>
                            <span class="lot reserved">F8</span>
                            <span class="lot reserved">F9</span>
                            <span class="lot reserved">F10</span>
                            <span class="lot space"></span>
                            <span class="lot available">F11</span>
                            <span class="lot available">F12</span>
                            <span class="lot available">F13</span>
                            <span class="lot available">F14</span>
                            <span class="lot available">F15</span>
                            <span class="lot space"></span>
                            <span class="lot available">F16</span>
                            <span class="lot available">F17</span>
                        </div>
                        <div class="lot-row">
                            <span class="lot available">B1</span>
                            <span class="lot available">B2</span>
                            <span class="lot space"></span>
                            <span class="lot reserved">B3</span>
                            <span class="lot reserved">B4</span>
                            <span class="lot reserved">B5</span>
                            <span class="lot available">B6</span>
                            <span class="lot space"></span>
                            <span class="lot selected">B7</span>
                            <span class="lot selected">B8</span>
                            <span class="lot selected">B9</span>
                            <span class="lot selected">B10</span>
                            <span class="lot space"></span>
                            <span class="lot available">B11</span>
                            <span class="lot available">B12</span>
                            <span class="lot available">B13</span>
                            <span class="lot available">B14</span>
                            <span class="lot available">B15</span>
                            <span class="lot space"></span>
                            <span class="lot available">B16</span>
                            <span class="lot available">B17</span>
                        </div>
                        <div class="lot-row">
                            <span class="lot available">H1</span>
                            <span class="lot available">H2</span>
                            <span class="lot space"></span>
                            <span class="lot available">H3</span>
                            <span class="lot available">H4</span>
                            <span class="lot available">H5</span>
                            <span class="lot available">H6</span>
                            <span class="lot space"></span>
                            <span class="lot available">H7</span>
                            <span class="lot available">H8</span>
                            <span class="lot available">H9</span>
                            <span class="lot available">H10</span>
                            <span class="lot space"></span>
                            <span class="lot reserved">H11</span>
                            <span class="lot reserved">H12</span>
                            <span class="lot reserved">H13</span>
                            <span class="lot reserved">H14</span>
                            <span class="lot reserved">H15</span>
                            <span class="lot space"></span>
                            <span class="lot reserved">H16</span>
                            <span class="lot reserved">H17</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-confirm">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>
@endsection