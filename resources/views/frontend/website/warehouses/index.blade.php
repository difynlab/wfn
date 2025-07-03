@extends('frontend.layouts.app')

@section('title', 'Warehouses')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/warehouses.css') }}">
@endpush
 
@section('content')
    <div class="warehouses page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">Begin Your Search Here</h1>
            <p class="page-description">
                Browse available warehouse spaces, book instantly, and secure the perfect location for your business. 
                Flexibility and convenience at your fingertips.
            </p>
        </div>

        <div class="section-2 container section-margin">
            <div class="row top-row">
                <div class="col-8 left">
                    <p class="title">Warehouses For Rent in Saudi Arabia</p>
                    <p class="description">100,550 warehouses</p>
                </div>

                <div class="col-4 right">
                    <button class="map-view-button" data-bs-toggle="modal" data-bs-target="#mapModal"><i class="bi bi-geo-alt"></i>Map View</button>
                </div>
            </div>

            <div class="row bottom-row">
                <div class="col-2">
                    <input type="text" class="form-control input-field" placeholder="Search for Location">
                </div>

                <div class="col-2">
                    <select class="form-select input-field">
                        <option>Warehouse Type</option>
                        <option>A</option>
                        <option>B</option>
                    </select>
                </div>

                <div class="col-2">
                    <select class="form-select input-field">
                        <option>Storage Type</option>
                        <option>A</option>
                        <option>B</option>
                    </select>
                </div>

                <div class="col-2">
                    <select class="form-select input-field">
                        <option>Price</option>
                        <option>A</option>
                        <option>B</option>
                    </select>
                </div>

                <div class="col-2">
                    <select class="form-select input-field">
                        <option>Availability</option>
                        <option>A</option>
                        <option>B</option>
                    </select>
                </div>

                <div class="col-2">
                    <button class="apply-filters-button">Apply Filters</button>
                </div>
            </div>
        </div>

        <div class="section-3 container section-margin">
            <div class="row warehouse-row">
                <div class="col-8 left">
                    <div class="single-warehouse">
                        <a href="{{ route('frontend.warehouses.show', 1) }}">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <p class="badge">New</p>
                                    <img src="{{ asset('storage/frontend/warehouses-1.png') }}" class="image" alt="Warehouse">
                                </div>

                                <div class="col-8">
                                    <p class="type">Warehouse Type</p>
                                    <p class="price">Unlock Pricing<i class="bi bi-lock-fill"></i></p>
                                    <p class="name">Riyadh Logistics Hub</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Quds St., Riyadh</p>
                                </div>
                            </div>
                        </a>

                        <div class="box">
                            <div class="row">
                                <div class="col-6">
                                    <p class="posted-time">Listed 1 day ago</p>
                                </div>

                                <div class="col-6 text-end">
                                    <span class="action"><i class="bi bi-heart"></i>Like</span>
                                    <span class="action"><i class="bi bi-share"></i> Share</span>
                                    <span class="action"><i class="bi bi-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-warehouse">
                        <a href="{{ route('frontend.warehouses.show', 1) }}">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <p class="badge">New</p>
                                    <img src="{{ asset('storage/frontend/warehouses-2.png') }}" class="image" alt="Warehouse">
                                </div>

                                <div class="col-8">
                                    <p class="type">Warehouse Type</p>
                                    <p class="price">Unlock Pricing<i class="bi bi-lock-fill"></i></p>
                                    <p class="name">Riyadh Logistics Hub</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Quds St., Riyadh</p>
                                </div>
                            </div>
                        </a>

                        <div class="box">
                            <div class="row">
                                <div class="col-6">
                                    <p class="posted-time">Listed 1 day ago</p>
                                </div>

                                <div class="col-6 text-end">
                                    <span class="action"><i class="bi bi-heart"></i>Like</span>
                                    <span class="action"><i class="bi bi-share"></i> Share</span>
                                    <span class="action"><i class="bi bi-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-warehouse">
                        <a href="{{ route('frontend.warehouses.show', 1) }}">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <p class="badge">New</p>
                                    <img src="{{ asset('storage/frontend/warehouses-3.png') }}" class="image" alt="Warehouse">
                                </div>

                                <div class="col-8">
                                    <p class="type">Warehouse Type</p>
                                    <p class="price">Unlock Pricing<i class="bi bi-lock-fill"></i></p>
                                    <p class="name">Riyadh Logistics Hub</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Quds St., Riyadh</p>
                                </div>
                            </div>
                        </a>

                        <div class="box">
                            <div class="row">
                                <div class="col-6">
                                    <p class="posted-time">Listed 1 day ago</p>
                                </div>

                                <div class="col-6 text-end">
                                    <span class="action"><i class="bi bi-heart"></i>Like</span>
                                    <span class="action"><i class="bi bi-share"></i> Share</span>
                                    <span class="action"><i class="bi bi-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-warehouse">
                        <a href="{{ route('frontend.warehouses.show', 1) }}">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <p class="badge">New</p>
                                    <img src="{{ asset('storage/frontend/warehouses-1.png') }}" class="image" alt="Warehouse">
                                </div>

                                <div class="col-8">
                                    <p class="type">Warehouse Type</p>
                                    <p class="price">Unlock Pricing<i class="bi bi-lock-fill"></i></p>
                                    <p class="name">Riyadh Logistics Hub</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Quds St., Riyadh</p>
                                </div>
                            </div>
                        </a>

                        <div class="box">
                            <div class="row">
                                <div class="col-6">
                                    <p class="posted-time">Listed 1 day ago</p>
                                </div>

                                <div class="col-6 text-end">
                                    <span class="action"><i class="bi bi-heart"></i>Like</span>
                                    <span class="action"><i class="bi bi-share"></i> Share</span>
                                    <span class="action"><i class="bi bi-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 right">
                    <div class="sidebar">
                        <p class="heading">Popular Warehouses</p>
                        <a href="#" class="item">Consectetur Lorem ipsum dolor</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Consectetur Lorem ipsum dolor</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>

                        <hr class="divider">

                        <p class="heading">Near by results</p>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>

                        <hr class="divider">

                        <p class="heading">Lortem ipsum</p>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                        <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-4 container">
            <p class="section-title">More available warehouses in the same area</p>

            <div class="row">
                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-1.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-2.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-3.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="single-warehouse">
                        <img src="{{ asset('storage/frontend/warehouse-c-4.png') }}" class="image" alt="Warehouse">
                        <div class="details">
                            <p class="title">Lorem ipsum</p>
                            <p class="subtitle">Lorem ipsum dolor sit amet</p>
                            <p class="price">SAR 13,250.62</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade map-modal" id="mapModal">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/frontend/map.png') }}" class="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection