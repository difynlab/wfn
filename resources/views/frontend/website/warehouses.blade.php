@extends('frontend.layouts.app')

@section('title', 'Warehouses')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/warehouses.css') }}">
@endpush
 
@section('content')
    <div class="warehouses container">
        <div class="section-1">
            <p class="section-title">Begin Your Search Here</p>
            <p class="section-description">
                Browse available warehouse spaces, book instantly, and secure the perfect location for your business. 
                Flexibility and convenience at your fingertips.
            </p>
            <div class="search-wrapper">
                <div class="row">
                    <div class="col-8">
                        <div class="search-heading">
                            <h2 class="search-title">Warehouses For Rent in Saudi Arabia</h2>
                            <p class="search-subtitle">100,550 warehouses</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="map-view-btn" id="map-view-btn"><i class="bi bi-geo-alt"></i> Map View</button>
                        <button class="apply-filters-btn">Apply Filters</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="search-item search-location">
                            <input type="text" placeholder="Search for Location" class="search-input">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="search-item">
                            <select class="search-select">
                                <option>Warehouse Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="search-item">
                            <select class="search-select">
                                <option>Storage Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="search-item">
                            <select class="search-select">
                                <option>Price</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="search-item">
                            <select class="search-select">
                                <option>Availability</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="search-item">
                            <select class="search-select">
                                <option>More</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="section-2 container" id="list-view">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="row">
                            <div class="col-4">
                                <div class="badge">New</div>
                                <img src="{{ asset('storage/frontend/warehouses-1.png') }}" class="card-image" alt="Warehouse">
                            </div>
                            <div class="col-8">
                                <p class="type">Warehouse Type</p>
                                <p class="price red">Unlock Pricing <i class="bi bi-lock-fill text-danger"></i></p>
                                <p class="description-bold">Riyadh Logistics Hub</p>
                                <p class="description-text">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.</p>
                                <p class="location"><i class="bi bi-geo-alt"></i>Al Quds St., Riyadh</p>
                            </div>
                        </div>
                        <div class="bottom-box">
                            <div class="row">
                                <div class="col-6">
                                    <p class="listing-time">Listed 1 day ago</p>
                                </div>
                                <div class="col-6 text-end">
                                    <span class="action"><i class="bi bi-heart"></i>Like</span>
                                    <span class="action"><i class="bi bi-share"></i> Share</span>
                                    <span class="action"><i class="bi bi-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-4">
                                <div class="badge">New</div>
                                <img src="{{ asset('storage/frontend/warehouses-2.png') }}" class="card-image" alt="Warehouse">
                            </div>
                            <div class="col-8">
                                <p class="type">Warehouse Type</p>
                                <p class="price">SAR 8,377.87</p>
                                <p class="description-bold">Al Khobar Smart Storage</p>
                                <p class="description-text">
                                    Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.
                                </p>
                                <p class="location"><i class="bi bi-geo-alt"></i>King Fahd Rd., Al Khobar</p>
                            </div>
                        </div>
                        <div class="bottom-box">
                            <div class="row">
                                <div class="col-6">
                                    <p class="listing-time">Listed 1 day ago</p>
                                </div>
                                <div class="col-6 text-end">
                                    <span class="action"><i class="bi bi-heart"></i>Like</span>
                                    <span class="action"><i class="bi bi-share"></i> Share</span>
                                    <span class="action"><i class="bi bi-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-4">
                                <div class="badge">New</div>
                                <img src="{{ asset('storage/frontend/warehouses-3.png') }}" class="card-image" alt="Warehouse">
                            </div>
                            <div class="col-8">
                                <p class="type">Warehouse Type</p>
                                <p class="price">SAR 16,987.90</p>
                                <p class="description-bold">Jeddah Storage Solutions</p>
                                <p class="description-text">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.</p>
                                <p class="location"><i class="bi bi-geo-alt"></i>Madinah Rd., Jeddah</p>
                            </div>
                        </div>
                        <div class="bottom-box">
                            <div class="row">
                                <div class="col-6">
                                    <p class="listing-time">Listed 1 day ago</p>
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
                <div class="col-5">
                    <div class="sidebar-card">
                        <p class="sidebar-heading">Popular Warehouses</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <hr class="divider">
                        <p class="sidebar-heading">Near by results</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <hr class="divider">
                        <p class="sidebar-heading">Lorem ipsum dolor</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Lorem ipsum dolor sit amt</p>
                        <p class="sidebar-item">Consectetur Lorem ipsum dolor</p>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="modal" id="modal">
            <div class="modal-content">
                <span class="close" id="close">&times;</span>
                <img src="{{ asset('storage/frontend/map.png') }}" class="card-image" alt="map">
            </div>
        </div>

        <div class="section-3 container">
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
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mapViewBtn = document.getElementById('map-view-btn');
        const modal = document.getElementById('modal');
        const close = document.getElementById('close');

        mapViewBtn.addEventListener('click', function () {
            modal.style.display = 'block';
        });

        close.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>
