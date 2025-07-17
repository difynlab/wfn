@extends('frontend.layouts.app')

@section('title', 'Homepage')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/homepage.css') }}">
@endpush
 
@section('content')
    <div class="homepage">
        @if($contents->section_1_title_en)
            <div class="section-1 section-margin">
                @if($contents->{'section_1_image_' . $middleware_language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="Banner" class="banner">
                @elseif($contents->section_1_image_en)
                    <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Banner" class="banner">
                @else
                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Banner" class="banner">
                @endif

                <div class="overlay">
                    <h1 class="title">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>

                    <p class="description">{{ $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en }}</p>

                    <!-- In future -->
                        <div class="search-bar" id="searchBar">
                            <div class="search-inputs">
                                <div class="search-item">
                                    <p class="search-label">{{ $contents->{'section_1_label_1_' . $middleware_language} ?? $contents->section_1_label_1_en }}</p>
                                    <input type="text" class="search-input" placeholder="{{ $contents->{'section_1_placeholder_1_' . $middleware_language} ?? $contents->section_1_placeholder_1_en }}">
                                </div>
                                <div class="divider"></div>
                                
                                <div class="search-item">
                                    <p class="search-label">{{ $contents->{'section_1_label_2_' . $middleware_language} ?? $contents->section_1_label_2_en }}</p>

                                    <div class="dropdown">
                                        <input type="text" class="search-input" placeholder="{{ $contents->{'section_1_placeholder_2_' . $middleware_language} ?? $contents->section_1_placeholder_2_en }}" id="startDateDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                                        <div class="dropdown-menu calendar-dropdown">
                                            <div class="dropdown-inner">
                                                <div class="top-row">
                                                    <div class="legends">
                                                        <p class="pick-by">Pick by:</p>

                                                        <button class="btn pick-mode">Exact Date</button>

                                                        <button class="btn pick-mode">±1 Day</button>

                                                        <button class="btn pick-mode">±2 Days</button>
                                                    </div>

                                                    <button class="monthly-reservations">For Monthly Reservations</button>
                                                </div>

                                                <hr class="dropdown-divider">

                                                <div class="calendars">
                                                    <div id="start-calendar" class="calendar"></div>

                                                    <div id="end-calendar" class="calendar"></div>
                                                </div>

                                                <div class="monthly-calendar-view d-none">
                                                    <p class="monthly-calendar-view-title">Thu, March 1 - Thu, May 1</p>

                                                    <div class="row months-row">
                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">January</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">February</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">March</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">April</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">May</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">June</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">July</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">August</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">September</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">October</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">November</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">December</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                
                                <!-- <div class="search-item">
                                    <p class="search-label">End Date</p>
                                    <div class="dropdown">
                                        <input type="text" class="search-input" placeholder="Add dates" id="endDateDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        
                                        <div class="dropdown-menu calendar-dropdown">
                                            <div class="dropdown-inner">
                                                <div class="top-row">
                                                    <div class="legends">
                                                        <p class="pick-by">Pick by:</p>

                                                        <button class="btn pick-mode">Exact Date</button>

                                                        <button class="btn pick-mode">±1 Day</button>

                                                        <button class="btn pick-mode">±2 Days</button>
                                                    </div>

                                                    <button class="monthly-reservations">For Monthly Reservations</button>
                                                </div>

                                                <hr class="dropdown-divider">

                                                <div class="calendars">
                                                    <div id="start-calendar" class="calendar"></div>

                                                    <div id="end-calendar" class="calendar"></div>
                                                </div>

                                                <div class="monthly-calendar-view">
                                                    <p class="monthly-calendar-view-title">Thu, March 1 - Thu, May 1</p>

                                                    <div class="row months-row">
                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">January</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">February</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">March</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">April</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">May</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">June</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">July</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">August</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">September</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">October</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">November</button>
                                                        </div>

                                                        <div class="col-3 single-month">
                                                            <button class="single-month-button">December</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div> -->
                                
                                <div class="search-item">
                                    <p class="search-label">{{ $contents->{'section_1_label_3_' . $middleware_language} ?? $contents->section_1_label_3_en }}</p>
                                    <div class="dropdown">
                                        <a class="search-input dropdown-toggle " id="storageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $contents->{'section_1_placeholder_3_' . $middleware_language} ?? $contents->section_1_placeholder_3_en }}
                                        </a>

                                        <ul class="dropdown-menu warehouse-dropdown">
                                            <div class="dropdown-inner">
                                                <p class="dropdown-title">Warehouse Size</p>

                                                <div class="radios">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="radio">
                                                        <label class="form-check-label label">Up to 50 Pallets</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="radio">
                                                        <label class="form-check-label label">Up to 100 Pallets</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="radio">
                                                        <label class="form-check-label label">Up to 200 Pallets</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="radio">
                                                        <label class="form-check-label label">200+ Pallets</label>
                                                    </div>
                                                </div>
                                                <hr class="dropdown-divider">

                                                <p class="dropdown-title">Warehouse Storage Type</p>

                                                <div class="checkboxes">
                                                    <div class="row">
                                                        <div class="col-4 single-check">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input check" type="checkbox">
                                                                <label class="form-check-label label">Dry Storage</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 single-check">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input check" type="checkbox">
                                                                <label class="form-check-label label">Chilled Storage (2°C - 8°C)</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 single-check">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input check" type="checkbox">
                                                                <label class="form-check-label label">Frozen Storage (-18°C or below)</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 single-check">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input check" type="checkbox">
                                                                <label class="form-check-label label">Humidity Controlled</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 single-check">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input check" type="checkbox">
                                                                <label class="form-check-label label">Hazardous Materials Storage</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 single-check">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input check" type="checkbox">
                                                                <label class="form-check-label label">Climate-Controlled Storage</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="clear-button">Clear All Filters</button>
                                            </div>
                                        </ul>
                                    </div>
                                </div>

                                <button type="submit" class="search-button"><i class="bi bi-search"></i>{{ $contents->{'section_1_button_' . $middleware_language} ?? $contents->section_1_button_en }}</button>
                            </div>
                        </div>
                    <!-- In future -->
                </div>
            </div>
        @endif
        
        @if($contents->section_2_title_en)
            <div class="section-2 container section-margin">
                <p class="section-title">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</p>
                <p class="section-description">{{ $contents->{'section_2_description_' . $middleware_language} ?? $contents->section_2_description_en }}</p>

                <!-- In future -->
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
                                    <a href="{{ route('warehouses.show', 1) }}">
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
                                    <a href="{{ route('warehouses.show', 1) }}">
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

                        <div class="tab-pane fade" id="pills-mecca" role="tabpanel" aria-labelledby="pills-mecca-tab" tabindex="0">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('warehouses.show', 1) }}">
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
                        
                        <div class="tab-pane fade" id="pills-medina" role="tabpanel" aria-labelledby="pills-medina-tab" tabindex="0">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('warehouses.show', 1) }}">
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
                    </div>
                <!-- In future -->
            </div>
        @endif

        @if($contents->section_3_title_en)
            <div class="section-3 container section-margin">
                <p class="section-title">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</p>
                <p class="section-description">{{ $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en }}</p>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-3">
                                    @if($contents->{'section_3_page_1_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_1_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_1_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_1_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <p class="title">{{ $contents->{'section_3_page_1_title_' . $middleware_language} ?? $contents->section_3_page_1_title_en }}</p>
                                    <p class="description">{{ $contents->{'section_3_page_1_description_' . $middleware_language} ?? $contents->section_3_page_1_description_en }}</p>
                                    <a href="{{ route('warehouses.area', 1) }}" class="checkout">{{ $contents->{'section_3_checkout_' . $middleware_language} ?? $contents->section_3_checkout_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-3">
                                    @if($contents->{'section_3_page_2_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_2_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_2_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_2_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <p class="title">{{ $contents->{'section_3_page_2_title_' . $middleware_language} ?? $contents->section_3_page_2_title_en }}</p>
                                    <p class="description">{{ $contents->{'section_3_page_2_description_' . $middleware_language} ?? $contents->section_3_page_2_description_en }}</p>
                                    <a href="{{ route('warehouses.area', 2) }}" class="checkout">{{ $contents->{'section_3_checkout_' . $middleware_language} ?? $contents->section_3_checkout_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-3">
                                    @if($contents->{'section_3_page_3_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_3_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_3_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_3_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <p class="title">{{ $contents->{'section_3_page_3_title_' . $middleware_language} ?? $contents->section_3_page_3_title_en }}</p>
                                    <p class="description">{{ $contents->{'section_3_page_3_description_' . $middleware_language} ?? $contents->section_3_page_3_description_en }}</p>
                                    <a href="{{ route('warehouses.area', 3) }}" class="checkout">{{ $contents->{'section_3_checkout_' . $middleware_language} ?? $contents->section_3_checkout_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-3">
                                    @if($contents->{'section_3_page_4_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_4_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_4_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_4_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <p class="title">{{ $contents->{'section_3_page_4_title_' . $middleware_language} ?? $contents->section_3_page_4_title_en }}</p>
                                    <p class="description">{{ $contents->{'section_3_page_4_description_' . $middleware_language} ?? $contents->section_3_page_4_description_en }}</p>
                                    <a href="{{ route('warehouses.area', 4) }}" class="checkout">{{ $contents->{'section_3_checkout_' . $middleware_language} ?? $contents->section_3_checkout_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_4_title_en)
            <div class="section-4 section-margin">
                <div class="container">
                    <div class="row section-4-row">
                        <div class="col-6">
                            <p class="title">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</p>
                            <p class="description">{{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}</p>

                            <form action="{{ route('subscriptions') }}" method="POST" class="form">
                                @csrf
                                <div class="row form-row">
                                    <div class="col-9">
                                        <input type="email" class="input" placeholder="{{ $contents->{'section_4_placeholder_' . $middleware_language} ?? $contents->section_4_placeholder_en }}" name="email" required>
                                        <x-frontend.input-error field="email"></x-frontend.input-error>
                                    </div>

                                    <div class="col-3">
                                        <button type="submit" class="submit-button">{{ $contents->{'section_4_button_' . $middleware_language} ?? $contents->section_4_button_en }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-6">
                            @if($contents->{'section_4_image_' . $middleware_language})
                                <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_' . $middleware_language}) }}" alt="Coming Soon App" class="image">
                            @elseif($contents->section_4_image_en)
                                <img src="{{ asset('storage/backend/pages/' . $contents->section_4_image_en) }}" alt="Coming Soon App" class="image">
                            @else
                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Coming Soon App" class="image">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_5_title_en && $articles->count() > 0)
            <div class="section-5 container section-margin">
                <div class="row">
                    <div class="col-8">
                        <p class="section-title">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</p>
                        <p class="section-description">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</p>
                    </div>

                    <div class="col-4 text-end">
                        <a href="{{ route('articles.index') }}" class="view-more-button">{{ $contents->{'section_5_button_' . $middleware_language} ?? $contents->section_5_button_en }}</a>
                    </div>
                </div>

                <div class="row bottom-row">
                    @foreach($articles as $key => $article)
                        @if($key == 0)
                            <div class="col-8 left">
                                @if($article->thumbnail)
                                    <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="left-image">
                                @else
                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="left-image">
                                @endif

                                <div class="content">
                                    <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('F jS Y') }}</p>
                                    <p class="title">{{ $article->title }}</p>
                                    <p class="description">{{ Str::limit(strip_tags($article->content), 200) }}</p>
                                    <a href="{{ route('articles.show', $article->id) }}" class="read-more-button">{{ $contents->{'section_5_read_more_' . $middleware_language} ?? $contents->section_5_read_more_en }}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="col-4 right">
                        @foreach($articles as $key => $article)
                            @if($key != 0)
                                <div class="single-article">
                                    @if($article->thumbnail)
                                        <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="right-image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="right-image">
                                    @endif
                                    <p class="title">{{ $article->title }}</p>
                                    <p class="description">{{ Str::limit(strip_tags($article->content), 60) }}</p>
                                    <a href="{{ route('articles.show', $article->id) }}" class="read-more-button">{{ $contents->{'section_5_read_more_' . $middleware_language} ?? $contents->section_5_read_more_en }}</a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_6_title_en)
            <div class="section-6">
                <div class="container">
                    <div class="row advertise">
                        <div class="col-9">
                            <p class="text">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section_6_title_en }}</p>
                            <p class="text">{{ $contents->{'section_6_sub_title_' . $middleware_language} ?? $contents->section_6_sub_title_en }}</p>
                        </div>

                    <div class="col-3">
                        <a href="{{ route('register') }}" class="advertise-button">{{ $contents->{'section_6_button_' . $middleware_language} ?? $contents->section_6_button_en }}</a>
                    </div>
                </div>
            </div>
        @endif

        <x-frontend.notification></x-frontend.notification>
    </div>
@endsection

@push('after-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownToggle = document.getElementById('startDateDropdown');
            new bootstrap.Dropdown(dropdownToggle, { autoClose: 'outside' });

            const today = new Date();
            const nextMonthFirst = new Date(today.getFullYear(), today.getMonth() + 1, 1);


            const localeEn = {
                days:['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
                daysShort:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                daysMin:['Mo','Tu','We','Th','Fr','Sa','Su'],
                months:['January','February','March','April','May','June',
                        'July','August','September','October','November','December'],
                monthsShort:['Jan','Feb','Mar','Apr','May','Jun','Jul',
                            'Aug','Sep','Oct','Nov','Dec'],
                today:'Today', clear:'Clear', dateFormat:'yyyy-MM-dd', firstDay:0
            };


            new AirDatepicker('#start-calendar', {
                inline    : true,
                startDate : today,
                minDate   : today,
                showOtherMonths: false,
                dateFormat: 'yyyy-MM-dd',
                locale    : localeEn,
                onSelect({ date, formattedDate }) {
                    console.log('Selected date:', formattedDate);
                    // You can also send this to a hidden input, an AJAX call, etc.
                }
            });

            new AirDatepicker('#end-calendar', {
                inline    : true,
                startDate : nextMonthFirst,
                minDate   : nextMonthFirst,
                showOtherMonths: false,
                dateFormat: 'yyyy-MM-dd',
                locale    : localeEn,
                onSelect({ date, formattedDate }) {
                    console.log('Selected date:', formattedDate);
                    // You can also send this to a hidden input, an AJAX call, etc.
                }
            });
        });

        $('.monthly-reservations').on('click', function() {
            $('.monthly-calendar-view').removeClass('d-none');
            $('.calendars').addClass('d-none');
        });

        $('.pick-mode').on('click', function() {
            $('.monthly-calendar-view').addClass('d-none');
            $('.calendars').removeClass('d-none');
        });
    </script>
@endpush