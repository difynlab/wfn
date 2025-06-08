@extends('frontend.layouts.app')

@section('title', 'Homepage')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/homepage.css') }}">
@endpush
 
@section('content')
    <div class="homepage">
        <div class="section-1 section-margin">
            <img src="{{ asset('storage/frontend/homepage-banner.png') }}" alt="Banner" class="banner">

            <div class="overlay">
                <h1 class="title">Find Your Perfect Warehouse, Anytime, Anywhere</h1>

                <p class="description">Discover the warehouse that works for you. Whether you're growing a business or need personal storage, our global network lets you search and book flexible spaces that meet your needs, anytime, anywhere.</p>

                <div class="search-bar" id="searchBar">
                    <div class="search-inputs">
                        <div class="search-item">
                            <p class="search-label">Location</p>
                            <input type="text" class="search-input" placeholder="Search warehouses">
                        </div>
                        <div class="divider"></div>
                        
                        <div class="search-item">
                            <p class="search-label">Start Date</p>
                            <!-- Ifham -->
                                <div class="start-date">
                                    <div class="dropdown">
                                        <input type="text" class="search-input dropdown-toggle" placeholder="Add dates" id="startDateDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="dropdown-menu calendar-dropdown p-3">
                                            <div class="dropdown-inner p-4">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <div>
                                                        <span class="me-2 fw-semibold">Pick by:</span>
                                                        <button class="btn btn-sm btn-dark me-2 pick-mode" data-mode="exact">Exact Date</button>
                                                        <button class="btn btn-sm btn-outline-dark me-2 pick-mode" data-mode="1day">±1 Day</button>
                                                        <button class="btn btn-sm btn-outline-dark pick-mode" data-mode="2day">±2 Days</button>
                                                    </div>
                                                    <button class="btn fw-semibold text-decoration-none pick-mode" data-mode="monthly">For Monthly Reservations</button>
                                                </div>
                                                <hr class="dropdown-divider">
                                                <div class="calendar-view calendar-exact">
                                                    <div class="calendar-wrapper d-flex justify-content-between">
                                                        <div id="calendarStartMonth" class="calendar-month"></div>
                                                        <div id="calendarNextMonth" class="calendar-month"></div>
                                                    </div>
                                                </div>
                                                <div class="calendar-view calendar-monthly d-none">
                                                    <p class="fw-semibold text-center">Thu, March 1 - Thu, May 1</p>
                                                    <div class="container mt-3">
                                                        <div class="row mb-2">
                                                            <div class="col-3"><button class="btn btn-light w-100">January</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">February</button></div>
                                                            <div class="col-3"><button class="btn btn-danger w-100">March</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">April</button></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3"><button class="btn btn-danger w-100">May</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">June</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">July</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">August</button></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3"><button class="btn btn-light w-100">September</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">October</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">November</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">December</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Ifham -->
                        </div>
                        <div class="divider"></div>
                        
                        <div class="search-item">
                            <p class="search-label">End Date</p>
                            <!-- Ifham -->
                                <div class="end-date">
                                    <div class="dropdown">
                                        <input type="text" class="search-input dropdown-toggle" placeholder="Add dates" id="startDateDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="dropdown-menu calendar-dropdown p-3">
                                            <div class="dropdown-inner p-4">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <div>
                                                        <span class="me-2 fw-semibold">Pick by:</span>
                                                        <button class="btn btn-sm btn-dark me-2 pick-mode" data-mode="exact">Exact Date</button>
                                                        <button class="btn btn-sm btn-outline-dark me-2 pick-mode" data-mode="1day">±1 Day</button>
                                                        <button class="btn btn-sm btn-outline-dark pick-mode" data-mode="2day">±2 Days</button>
                                                    </div>
                                                    <button class="btn fw-semibold text-decoration-none pick-mode" data-mode="monthly">For Monthly Reservations</button>
                                                </div>
                                                <hr class="dropdown-divider">
                                                <div class="calendar-view calendar-exact">
                                                    <div class="calendar-wrapper d-flex justify-content-between">
                                                        <div id="calendarEndStartMonth" class="calendar-month"></div>
                                                        <div id="calendarEndNextMonth" class="calendar-month"></div>
                                                    </div>
                                                </div>
                                                <div class="calendar-view calendar-monthly d-none">
                                                    <p class="fw-semibold text-center">Thu, March 1 - Thu, May 1</p>
                                                    <div class="container mt-3">
                                                        <div class="row mb-2">
                                                            <div class="col-3"><button class="btn btn-light w-100">January</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">February</button></div>
                                                            <div class="col-3"><button class="btn btn-danger w-100">March</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">April</button></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3"><button class="btn btn-danger w-100">May</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">June</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">July</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">August</button></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3"><button class="btn btn-light w-100">September</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">October</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">November</button></div>
                                                            <div class="col-3"><button class="btn btn-light w-100">December</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Ifham -->
                        </div>
                        <div class="divider"></div>
                        
                        <div class="search-item">
                            <p class="search-label">Storage Type</p>
                            <!-- Ifham -->
                                <div class="dropdown">
                                    <a class="btn search-input btn-lg dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Choose
                                    </a>
                                    <ul class="dropdown-menu p-4 warehouse-dropdown shadow-lg">
                                        <div class="dropdown-inner p-4">
                                            <div class="dropdown-row mb-3">
                                                <p class="dropdown-title">Warehouse Size</p>
                                                <div class="d-flex flex-wrap gap-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="warehouse_size" id="size1">
                                                        <label class="form-check-label" for="size1">Up to 50 Pallets</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="warehouse_size" id="size2">
                                                        <label class="form-check-label" for="size2">Up to 100 Pallets</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="warehouse_size" id="size3">
                                                        <label class="form-check-label" for="size3">Up to 200 Pallets</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="warehouse_size" id="size4">
                                                        <label class="form-check-label" for="size4">200+ Pallets</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="dropdown-divider">
                                            <div class="dropdown-row mb-3">
                                                <p class="dropdown-title">Warehouse Storage Type</p>
                                                <div class="container">
                                                    <div class="row mb-2">
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="type1">
                                                                <label class="form-check-label" for="type1">Dry Storage</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="type2">
                                                                <label class="form-check-label" for="type2">Chilled Storage (2°C - 8°C)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="type3">
                                                                <label class="form-check-label" for="type3">Frozen Storage (-18°C or below)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="type4">
                                                                <label class="form-check-label" for="type4">Humidity Controlled</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="type5">
                                                                <label class="form-check-label" for="type5">Hazardous Materials Storage</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="type6">
                                                                <label class="form-check-label" for="type6">Climate-Controlled Storage</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="button" class="clear-filter-button">Clear All Filters</button>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            <!-- Ifham -->
                        </div>

                        <button type="submit" class="search-btn"><i class="bi bi-search"></i>Search</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-2 container section-margin">
            <p class="section-title">Explore New Warehouses In Saudi Arabia</p>
            <p class="section-description">Keep up with the newest warehouse updates.</p>

            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-riyadh-tab" data-bs-toggle="pill" data-bs-target="#pills-riyadh" type="button" role="tab" aria-controls="pills-riyadh" aria-selected="true">Riyadh</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-jeddah-tab" data-bs-toggle="pill" data-bs-target="#pills-jeddah" type="button" role="tab" aria-controls="pills-jeddah" aria-selected="false">Jeddah</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-mecca-tab" data-bs-toggle="pill" data-bs-target="#pills-mecca" type="button" role="tab" aria-controls="pills-mecca" aria-selected="false">Mecca</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-medina-tab" data-bs-toggle="pill" data-bs-target="#pills-medina" type="button" role="tab" aria-controls="pills-medina" aria-selected="false">Medina</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-riyadh" role="tabpanel" aria-labelledby="pills-riyadh-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('website.warehouses.show', 1) }}">
                                <div class="card">
                                    <img src="{{ asset('storage/frontend/riyadh-1.png') }}" class="card-image" alt="Warehouse">

                                    <div class="card-body">
                                        <p class="type">Warehouse Type</p>
                                        <p class="title">Lorem ipsum dolor</p>
                                        <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                        <p class="location"><i class="bi bi-geo-alt"></i>Al Olaya, Riyadh 12211</p>
                                        <div class="bottom-box">
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="text">Listed 1 day ago</p>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                    <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Hamra, Riyadh 11493</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Morouj, Riyadh 11564</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-jeddah" role="tabpanel" aria-labelledby="pills-jeddah-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/jeddah-1.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Shati, Jeddah 23332</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/jeddah-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Balad, Jeddah 22234</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/jeddah-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Rawdah, Jeddah 23435</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-mecca" role="tabpanel" aria-labelledby="pills-mecca-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/mecca-1.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Naseem, Mecca 24231</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/mecca-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Aziziah, Mecca 24352</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/mecca-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Taneem, Mecca 24371</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="pills-medina" role="tabpanel" aria-labelledby="pills-medina-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/medina-1.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Nozha, Medina 42351</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/medina-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Qibla, Medina 42312</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/medina-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor consectetur Lorem ipsum dolor sit amt onsectetu.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Gharra, Medina 42345</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-3 container section-margin">
            <p class="section-title">Optimize Your Warehouse Search</p>
            <p class="section-description">Discover the best warehouse spaces in the UAE with the most trusted information for your business needs.</p>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-1.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="{{ route('website.warehouses.area', 1) }}" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-2.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="{{ route('website.warehouses.area', 1) }}" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-3.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="{{ route('website.warehouses.area', 1) }}" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-4.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="{{ route('website.warehouses.area', 1) }}" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-4 section-margin">
            <div class="container">
                <div class="row section-4-row">
                    <div class="col-6">
                        <p class="title">Coming Soon: App Version of <br>Warehouse Finder Network</p>
                        <p class="description">Bringing you an even faster and more convenient way to discover and rent warehouses across Saudi Arabia. With user-friendly features and real-time listings, you’ll be able to find the perfect warehouse anytime, anywhere, right from your mobile device. Stay tuned for a seamless rental experience at your fingertips!</p>

                        <form class="form">
                            <div class="row form-row">
                                <div class="col-9">
                                    <input type="email" class="input" placeholder="Enter email address" required>
                                </div>

                                <div class="col-3">
                                    <button type="submit" class="submit-button">Notify Me</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-6">
                        <img src="{{ asset('storage/frontend/coming-soon.png') }}" class="image" alt="Coming Soon App">
                    </div>
                </div>
            </div>
        </div>

        <div class="section-5 container section-margin">
            <div class="row">
                <div class="col-8">
                    <p class="section-title">Insights & Articles</p>
                    <p class="section-description">Stay informed with the latest industry trends, expert insights, and actionable articles.</p>
                </div>

                <div class="col-4 text-end">
                    <a href="{{ route('website.articles.index') }}" class="view-more-button">View More Articles</a>
                </div>
            </div>

            <div class="row bottom-row">
                <div class="col-8">
                    <img src="{{ asset('storage/frontend/article-main.png') }}" class="left-image" alt="Image">

                    <div class="content">
                        <p class="date">April 4th 2025</p>
                        <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a href="{{ route('website.articles.show', 1) }}" class="read-more-button">Read more</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-article">
                        <img src="{{ asset('storage/frontend/article-side.png') }}" class="right-image" alt="Image">
                        <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>
                        <a href="{{ route('website.articles.show', 1) }}" class="read-more-button">Read more</a>
                    </div>

                    <div class="single-article">
                        <img src="{{ asset('storage/frontend/article-side.png') }}" class="right-image" alt="Image">
                        <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>
                        <a href="{{ route('website.articles.show', 1) }}" class="read-more-button">Read more</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-6">
            <div class="container">
                <div class="row advertise">
                    <div class="col-9">
                        <p class="text">Ready to advertise your warehouse?</p>
                        <p class="text">We've got you covered.</p>
                    </div>

                    <div class="col-3">
                        <a href="{{ route('frontend-auth.register') }}" class="advertise-button">Advertise Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Ifham -->
    @push('after-scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                function renderCalendar(containerId, year, month) {
                    const container = document.getElementById(containerId);
                    const firstDay = new Date(year, month, 1);
                    const lastDay = new Date(year, month + 1, 0);
                    const daysInMonth = lastDay.getDate();
                    const startDayOfWeek = firstDay.getDay();

                    let html = `<div class="calendar-header">${firstDay.toLocaleString('default', { month: 'long' })} ${year}</div>`;
                    html += '<div class="calendar-grid"><div>Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>';

                    for (let i = 0; i < startDayOfWeek; i++) {
                        html += '<div class="calendar-day empty"></div>';
                    }

                    for (let day = 1; day <= daysInMonth; day++) {
                        html += `<div class="calendar-day" data-day="${day}">${day}</div>`;
                    }

                    html += '</div>';
                    container.innerHTML = html;
                }

                const today = new Date();
                renderCalendar("calendarStartMonth", today.getFullYear(), today.getMonth());
                renderCalendar("calendarNextMonth", today.getFullYear(), today.getMonth() + 1);
                renderCalendar("calendarEndStartMonth", today.getFullYear(), today.getMonth());
                renderCalendar("calendarEndNextMonth", today.getFullYear(), today.getMonth() + 1);

                // Prevent dropdown from closing when clicking inside
                document.querySelectorAll('.calendar-dropdown').forEach(dropdown => {
                    dropdown.addEventListener('click', function (e) {
                        e.stopPropagation();
                    });
                });

                document.querySelectorAll('.pick-mode').forEach(button => {
                    button.addEventListener('click', function () {
                        const parent = this.closest('.dropdown-inner');
                        const mode = this.dataset.mode;

                        // Toggle views
                        const exactView = parent.querySelector('.calendar-exact');
                        const monthlyView = parent.querySelector('.calendar-monthly');

                        if (mode === 'monthly') {
                            exactView.classList.add('d-none');
                            monthlyView.classList.remove('d-none');
                        } else {
                            exactView.classList.remove('d-none');
                            monthlyView.classList.add('d-none');
                        }

                        // Update button styles (optional)
                        parent.querySelectorAll('.pick-mode').forEach(btn => btn.classList.remove('btn-dark'));
                        this.classList.add('btn-dark');
                    });
                });
            });
        </script>
    @endpush
<!-- Ifham -->