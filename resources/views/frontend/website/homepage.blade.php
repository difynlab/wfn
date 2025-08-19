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

                    <div class="search-bar" id="searchBar">
                        <form action="{{ route('warehouses.filter') }}" method="GET">
                            <div class="search-inputs">
                                <div class="search-item dropdown-search">
                                    <p class="search-label">{{ $contents->{'section_1_label_1_' . $middleware_language} ?? $contents->section_1_label_1_en }}</p>
                                    <!-- <input type="text" class="search-input" placeholder="{{ $contents->{'section_1_placeholder_1_' . $middleware_language} ?? $contents->section_1_placeholder_1_en }}" name="location"> -->
                                    <select class="form-control js-single search-input" name="location" id="location">
                                        <option value="">{{ $contents->{'section_1_placeholder_1_' . $middleware_language} ?? $contents->section_1_placeholder_1_en }}</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city }}">{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="divider"></div>
                                
                                <div class="search-item">
                                    <p class="search-label">{{ $contents->{'section_1_label_2_' . $middleware_language} ?? $contents->section_1_label_2_en }}</p>
                                    <input type="text" class="date date-picker-field" id="tenancy_date" name="tenancy_date" placeholder="{{ $contents->{'section_1_placeholder_2_' . $middleware_language} ?? $contents->section_2_placeholder_1_en }}" value="{{ session('tenancy_date') }}">
                                </div>

                                <div class="divider"></div>
                                
                                <div class="search-item">
                                    <p class="search-label">{{ $contents->{'section_1_label_3_' . $middleware_language} ?? $contents->section_1_label_3_en }}</p>
                                    <input type="text" class="date date-picker-field" id="renewal_date" name="renewal_date" placeholder="{{ $contents->{'section_1_placeholder_3_' . $middleware_language} ?? $contents->section_1_placeholder_3_en }}" value="{{ session('renewal_date') }}">
                                </div>

                                <div class="divider"></div>
                                
                                <div class="search-item">
                                    <p class="search-label">{{ $contents->{'section_1_label_4_' . $middleware_language} ?? $contents->section_1_label_4_en }}</p>

                                    <p class="search-input dropdown-toggle" id="filter">
                                        {{ $contents->{'section_1_placeholder_4_' . $middleware_language} ?? $contents->section_1_placeholder_4_en }}
                                    </p>

                                    <div class="filters d-none">
                                        <p class="dropdown-title">{{ $contents->{'section_1_size_' . $middleware_language} ?? $contents->section_1_size_en }}</p>

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input id="50" class="form-check-input check" type="radio" value="50" name="warehouse_size">
                                                    <label for="50" class="form-check-label label">{{ $contents->{'section_1_size_1_' . $middleware_language} ?? $contents->section_1_size_1_en }}</label>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input id="100" class="form-check-input check" type="radio" value="100" name="warehouse_size">
                                                    <label for="100" class="form-check-label label">{{ $contents->{'section_1_size_2_' . $middleware_language} ?? $contents->section_1_size_2_en }}</label>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input id="200" class="form-check-input check" type="radio" value="200" name="warehouse_size">
                                                    <label for="200" class="form-check-label label">{{ $contents->{'section_1_size_3_' . $middleware_language} ?? $contents->section_1_size_3_en }}</label>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input id="200+" class="form-check-input check" type="radio" value="200+" name="warehouse_size">
                                                    <label for="200+" class="form-check-label label">{{ $contents->{'section_1_size_4_' . $middleware_language} ?? $contents->section_1_size_4_en }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="dropdown-divider">

                                        <p class="dropdown-title">{{ $contents->{'section_1_type_' . $middleware_language} ?? $contents->section_1_type_en }}</p>

                                        <div class="row">
                                            @foreach($storage_types as $storage_type)
                                                <div class="col-4 col-xl-3 single-radio">
                                                    <div class="form-check">
                                                        <input id="{{ $storage_type->id }}" class="form-check-input check" type="radio" value="{{ $storage_type->id }}" name="storage_type">
                                                        <label for="{{ $storage_type->id }}" class="form-check-label label">{{ $storage_type->{'name_' . $middleware_language} ?? $storage_type->name_en }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="search-button"><i class="bi bi-search"></i>{{ $contents->{'section_1_button_' . $middleware_language} ?? $contents->section_1_button_en }}</button>
                            </div>
                        </form>
                    </div>

                    <!-- Mobile Search Dropdown -->
                    <div class="mobile-search-dropdown">
                        <div class="mobile-search-toggle" id="mobileSearchToggle">
                            <span class="toggle-text">{{ $contents->{'section_1_button_' . $middleware_language} ?? $contents->section_1_button_en }}</span>
                            <i class="bi bi-chevron-down toggle-icon"></i>
                        </div>
                        
                        <div class="mobile-search-content" id="mobileSearchContent">
                            <form action="{{ route('warehouses.filter') }}" method="GET">
                                <div class="search-item">
                                    <label class="search-label">{{ $contents->{'section_1_label_1_' . $middleware_language} ?? $contents->section_1_label_1_en }}</label>
                                    <select class="form-control js-single-mobile search-input" name="location" id="location-mobile">
                                        <option value="">{{ $contents->{'section_1_placeholder_1_' . $middleware_language} ?? $contents->section_1_placeholder_1_en }}</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city }}">{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="search-item">
                                    <label class="search-label">{{ $contents->{'section_1_label_2_' . $middleware_language} ?? $contents->section_1_label_2_en }}</label>
                                    <input type="text" class="date date-picker-field-mobile" id="tenancy_date_mobile" name="tenancy_date" placeholder="{{ $contents->{'section_1_placeholder_2_' . $middleware_language} ?? $contents->section_2_placeholder_1_en }}" value="{{ session('tenancy_date') }}">
                                </div>
                                
                                <div class="search-item">
                                    <label class="search-label">{{ $contents->{'section_1_label_3_' . $middleware_language} ?? $contents->section_1_label_3_en }}</label>
                                    <input type="text" class="date date-picker-field-mobile" id="renewal_date_mobile" name="renewal_date" placeholder="{{ $contents->{'section_1_placeholder_3_' . $middleware_language} ?? $contents->section_1_placeholder_3_en }}" value="{{ session('renewal_date') }}">
                                </div>
                                
                                <div class="search-item">
                                    <label class="search-label">{{ $contents->{'section_1_label_4_' . $middleware_language} ?? $contents->section_1_label_4_en }}</label>
                                    <p class="search-input dropdown-toggle" id="filter-mobile">
                                        {{ $contents->{'section_1_placeholder_4_' . $middleware_language} ?? $contents->section_1_placeholder_4_en }}
                                    </p>

                                    <div class="filters d-none">
                                        <p class="dropdown-title">{{ $contents->{'section_1_size_' . $middleware_language} ?? $contents->section_1_size_en }}</p>

                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-check">
                                                    <input id="50-mobile" class="form-check-input check" type="radio" value="50" name="warehouse_size">
                                                    <label for="50-mobile" class="form-check-label label">{{ $contents->{'section_1_size_1_' . $middleware_language} ?? $contents->section_1_size_1_en }}</label>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-check">
                                                    <input id="100-mobile" class="form-check-input check" type="radio" value="100" name="warehouse_size">
                                                    <label for="100-mobile" class="form-check-label label">{{ $contents->{'section_1_size_2_' . $middleware_language} ?? $contents->section_1_size_2_en }}</label>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-check">
                                                    <input id="200-mobile" class="form-check-input check" type="radio" value="200" name="warehouse_size">
                                                    <label for="200-mobile" class="form-check-label label">{{ $contents->{'section_1_size_3_' . $middleware_language} ?? $contents->section_1_size_3_en }}</label>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-check">
                                                    <input id="200+-mobile" class="form-check-input check" type="radio" value="200+" name="warehouse_size">
                                                    <label for="200+-mobile" class="form-check-label label">{{ $contents->{'section_1_size_4_' . $middleware_language} ?? $contents->section_1_size_4_en }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="dropdown-divider">

                                        <p class="dropdown-title">{{ $contents->{'section_1_type_' . $middleware_language} ?? $contents->section_1_type_en }}</p>

                                        <div class="row">
                                            @foreach($storage_types as $storage_type)
                                                <div class="col-12 col-md-6 single-radio">
                                                    <div class="form-check">
                                                        <input id="{{ $storage_type->id }}-mobile" class="form-check-input check" type="radio" value="{{ $storage_type->id }}" name="storage_type">
                                                        <label for="{{ $storage_type->id }}-mobile" class="form-check-label label">{{ $storage_type->{'name_' . $middleware_language} ?? $storage_type->name_en }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="search-button"><i class="bi bi-search"></i>{{ $contents->{'section_1_button_' . $middleware_language} ?? $contents->section_1_button_en }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        @if($contents->section_2_title_en)
            <div class="section-2 container section-margin">
                <p class="section-title">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</p>
                <p class="section-description">{{ $contents->{'section_2_description_' . $middleware_language} ?? $contents->section_2_description_en }}</p>

                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    @if($riyadh_warehouses->count() > 0)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-riyadh-tab" data-bs-toggle="pill" data-bs-target="#pills-riyadh" type="button" role="tab" aria-controls="pills-riyadh" aria-selected="true">{{ $contents->{'section_2_city_1_' . $middleware_language} ?? $contents->section_2_city_1_en }}</button>
                        </li>
                    @endif

                    @if($jeddah_warehouses->count() > 0)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-jeddah-tab" data-bs-toggle="pill" data-bs-target="#pills-jeddah" type="button" role="tab" aria-controls="pills-jeddah" aria-selected="false">{{ $contents->{'section_2_city_2_' . $middleware_language} ?? $contents->section_2_city_2_en }}</button>
                        </li>
                    @endif

                    @if($mecca_warehouses->count() > 0)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-mecca-tab" data-bs-toggle="pill" data-bs-target="#pills-mecca" type="button" role="tab" aria-controls="pills-mecca" aria-selected="false">{{ $contents->{'section_2_city_3_' . $middleware_language} ?? $contents->section_2_city_3_en }}</button>
                        </li>
                    @endif

                    @if($medina_warehouses->count() > 0)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-medina-tab" data-bs-toggle="pill" data-bs-target="#pills-medina" type="button" role="tab" aria-controls="pills-medina" aria-selected="false">{{ $contents->{'section_2_city_4_' . $middleware_language} ?? $contents->section_2_city_4_en }}</button>
                        </li>
                    @endif
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-riyadh" role="tabpanel" aria-labelledby="pills-riyadh-tab" tabindex="0">
                        <div class="row">
                            @foreach($riyadh_warehouses as $warehouse)
                                <div class="col-12 mb-3 mb-md-0 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('warehouses.show', $warehouse) }}">
                                                <div class="top">
                                                    <!-- @php
                                                        $listed_date = $warehouse->created_at->copy()->startOfDay();
                                                        $today = now()->startOfDay();
                                                        $date_difference = $listed_date->diffInDays($today, false);
                                                    @endphp -->

                                                    @if($warehouse->thumbnail)
                                                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="card-image">
                                                    @else
                                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="card-image">
                                                    @endif

                                                    <p class="type">
                                                        {{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}
                                                    </p>

                                                    <p class="title">
                                                        {{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}
                                                    </p>

                                                    <p class="description">
                                                        {{ $warehouse->{'description_' . $middleware_language} ?? $warehouse->description_en }}
                                                    </p>

                                                    <p class="location">
                                                        <i class="bi bi-geo-alt"></i>
                                                        {{ $warehouse->{'city_' . $middleware_language} ?? $warehouse->city_en }}
                                                    </p>
                                                </div>
                                            </a>
                                            
                                            <div class="bottom-box">
                                                <div class="row">
                                                    <!-- <div class="col-5">
                                                        <p class="text">{{ $contents->{'section_2_listed_' . $middleware_language} ?? $contents->section_2_listed_en }} {{ $date_difference }} {{ $contents->{'section_2_day_ago_' . $middleware_language} ?? $contents->section_2_day_ago_en }}</p>
                                                    </div> -->
                                                    <div class="col-12 text-end">
                                                        <span class="span-text" data-bs-toggle="dropdown">
                                                            <i class="bi bi-share"></i>
                                                            {{ $contents->{'section_2_share_' . $middleware_language} ?? $contents->section_2_share_en }}
                                                        </span>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Facebook">
                                                                    <i class="bi bi-facebook icon"></i> Facebook
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Twitter">
                                                                    <i class="bi bi-twitter icon"></i> Twitter
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on LinkedIn">
                                                                    <i class="bi bi-linkedin icon"></i> LinkedIn
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://wa.me/?text={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on WhatsApp">
                                                                    <i class="bi bi-whatsapp icon"></i> WhatsApp
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-jeddah" role="tabpanel" aria-labelledby="pills-jeddah-tab" tabindex="0">
                        <div class="row">
                            @foreach($jeddah_warehouses as $warehouse)
                                <div class="col-12 mb-3 mb-md-0 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('warehouses.show', $warehouse) }}">
                                                <div class="top">
                                                    <!-- @php
                                                        $listed_date = $warehouse->created_at->copy()->startOfDay();
                                                        $today = now()->startOfDay();
                                                        $date_difference = $listed_date->diffInDays($today, false);
                                                    @endphp -->

                                                    @if($warehouse->thumbnail)
                                                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="card-image">
                                                    @else
                                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="card-image">
                                                    @endif

                                                    <p class="type">
                                                        {{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}
                                                    </p>

                                                    <p class="title">
                                                        {{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}
                                                    </p>

                                                    <p class="description">
                                                        {{ $warehouse->{'description_' . $middleware_language} ?? $warehouse->description_en }}
                                                    </p>

                                                    <p class="location">
                                                        <i class="bi bi-geo-alt"></i>
                                                        {{ $warehouse->{'city_' . $middleware_language} ?? $warehouse->city_en }}
                                                    </p>
                                                </div>
                                            </a>
                                            
                                            <div class="bottom-box">
                                                <div class="row">
                                                    <!-- <div class="col-5">
                                                        <p class="text">{{ $contents->{'section_2_listed_' . $middleware_language} ?? $contents->section_2_listed_en }} {{ $date_difference }} {{ $contents->{'section_2_day_ago_' . $middleware_language} ?? $contents->section_2_day_ago_en }}</p>
                                                    </div> -->
                                                    <div class="col-12 text-end">
                                                        <span class="span-text" data-bs-toggle="dropdown">
                                                            <i class="bi bi-share"></i>
                                                            {{ $contents->{'section_2_share_' . $middleware_language} ?? $contents->section_2_share_en }}
                                                        </span>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Facebook">
                                                                    <i class="bi bi-facebook icon"></i> Facebook
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Twitter">
                                                                    <i class="bi bi-twitter icon"></i> Twitter
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on LinkedIn">
                                                                    <i class="bi bi-linkedin icon"></i> LinkedIn
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://wa.me/?text={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on WhatsApp">
                                                                    <i class="bi bi-whatsapp icon"></i> WhatsApp
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-mecca" role="tabpanel" aria-labelledby="pills-mecca-tab" tabindex="0">
                        <div class="row">
                            @foreach($mecca_warehouses as $warehouse)
                                <div class="col-12 mb-3 mb-md-0 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('warehouses.show', $warehouse) }}">
                                                <div class="top">
                                                    <!-- @php
                                                        $listed_date = $warehouse->created_at->copy()->startOfDay();
                                                        $today = now()->startOfDay();
                                                        $date_difference = $listed_date->diffInDays($today, false);
                                                    @endphp -->

                                                    @if($warehouse->thumbnail)
                                                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="card-image">
                                                    @else
                                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="card-image">
                                                    @endif

                                                    <p class="type">
                                                        {{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}
                                                    </p>

                                                    <p class="title">
                                                        {{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}
                                                    </p>

                                                    <p class="description">
                                                        {{ $warehouse->{'description_' . $middleware_language} ?? $warehouse->description_en }}
                                                    </p>

                                                    <p class="location">
                                                        <i class="bi bi-geo-alt"></i>
                                                        {{ $warehouse->{'city_' . $middleware_language} ?? $warehouse->city_en }}
                                                    </p>
                                                </div>
                                            </a>
                                            
                                            <div class="bottom-box">
                                                <div class="row">
                                                    <!-- <div class="col-5">
                                                        <p class="text">{{ $contents->{'section_2_listed_' . $middleware_language} ?? $contents->section_2_listed_en }} {{ $date_difference }} {{ $contents->{'section_2_day_ago_' . $middleware_language} ?? $contents->section_2_day_ago_en }}</p>
                                                    </div> -->
                                                    <div class="col-12 text-end">
                                                        <span class="span-text" data-bs-toggle="dropdown">
                                                            <i class="bi bi-share"></i>
                                                            {{ $contents->{'section_2_share_' . $middleware_language} ?? $contents->section_2_share_en }}
                                                        </span>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Facebook">
                                                                    <i class="bi bi-facebook icon"></i> Facebook
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Twitter">
                                                                    <i class="bi bi-twitter icon"></i> Twitter
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on LinkedIn">
                                                                    <i class="bi bi-linkedin icon"></i> LinkedIn
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://wa.me/?text={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on WhatsApp">
                                                                    <i class="bi bi-whatsapp icon"></i> WhatsApp
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="pills-medina" role="tabpanel" aria-labelledby="pills-medina-tab" tabindex="0">
                        <div class="row">
                            @foreach($medina_warehouses as $warehouse)
                                <div class="col-12 mb-3 mb-md-0 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('warehouses.show', $warehouse) }}">
                                                <div class="top">
                                                    <!-- @php
                                                        $listed_date = $warehouse->created_at->copy()->startOfDay();
                                                        $today = now()->startOfDay();
                                                        $date_difference = $listed_date->diffInDays($today, false);
                                                    @endphp -->

                                                    @if($warehouse->thumbnail)
                                                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="card-image">
                                                    @else
                                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="card-image">
                                                    @endif

                                                    <p class="type">
                                                        {{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}
                                                    </p>

                                                    <p class="title">
                                                        {{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}
                                                    </p>

                                                    <p class="description">
                                                        {{ $warehouse->{'description_' . $middleware_language} ?? $warehouse->description_en }}
                                                    </p>

                                                    <p class="location">
                                                        <i class="bi bi-geo-alt"></i>
                                                        {{ $warehouse->{'city_' . $middleware_language} ?? $warehouse->city_en }}
                                                    </p>
                                                </div>
                                            </a>
                                            
                                            <div class="bottom-box">
                                                <div class="row">
                                                    <!-- <div class="col-5">
                                                        <p class="text">{{ $contents->{'section_2_listed_' . $middleware_language} ?? $contents->section_2_listed_en }} {{ $date_difference }} {{ $contents->{'section_2_day_ago_' . $middleware_language} ?? $contents->section_2_day_ago_en }}</p>
                                                    </div> -->
                                                    <div class="col-12 text-end">
                                                        <span class="span-text" data-bs-toggle="dropdown">
                                                            <i class="bi bi-share"></i>
                                                            {{ $contents->{'section_2_share_' . $middleware_language} ?? $contents->section_2_share_en }}
                                                        </span>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Facebook">
                                                                    <i class="bi bi-facebook icon"></i> Facebook
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on Twitter">
                                                                    <i class="bi bi-twitter icon"></i> Twitter
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on LinkedIn">
                                                                    <i class="bi bi-linkedin icon"></i> LinkedIn
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="https://wa.me/?text={{ urlencode(route('warehouses.show', $warehouse)) }}" target="_blank" title="Share on WhatsApp">
                                                                    <i class="bi bi-whatsapp icon"></i> WhatsApp
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_3_title_en)
            <div class="section-3 container section-margin">
                <p class="section-title">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</p>
                <p class="section-description">{{ $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en }}</p>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-4 col-md-3">
                                    @if($contents->{'section_3_page_1_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_1_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_1_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_1_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-8 col-md-9">
                                    <p class="title">{{ $contents->{'section_3_page_1_title_' . $middleware_language} ?? $contents->section_3_page_1_title_en }}</p>
                                    <p class="description">{{ $contents->{'section_3_page_1_description_' . $middleware_language} ?? $contents->section_3_page_1_description_en }}</p>
                                    <a href="{{ route('warehouses.area', 1) }}" class="checkout">{{ $contents->{'section_3_checkout_' . $middleware_language} ?? $contents->section_3_checkout_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-4 col-md-3">
                                    @if($contents->{'section_3_page_2_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_2_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_2_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_2_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-8 col-md-9">
                                    <p class="title">{{ $contents->{'section_3_page_2_title_' . $middleware_language} ?? $contents->section_3_page_2_title_en }}</p>
                                    <p class="description">{{ $contents->{'section_3_page_2_description_' . $middleware_language} ?? $contents->section_3_page_2_description_en }}</p>
                                    <a href="{{ route('warehouses.area', 2) }}" class="checkout">{{ $contents->{'section_3_checkout_' . $middleware_language} ?? $contents->section_3_checkout_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-4 col-md-3">
                                    @if($contents->{'section_3_page_3_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_3_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_3_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_3_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-8 col-md-9">
                                    <p class="title">{{ $contents->{'section_3_page_3_title_' . $middleware_language} ?? $contents->section_3_page_3_title_en }}</p>
                                    <p class="description">{{ $contents->{'section_3_page_3_description_' . $middleware_language} ?? $contents->section_3_page_3_description_en }}</p>
                                    <a href="{{ route('warehouses.area', 3) }}" class="checkout">{{ $contents->{'section_3_checkout_' . $middleware_language} ?? $contents->section_3_checkout_en }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="row card-row">
                                <div class="col-4 col-md-3">
                                    @if($contents->{'section_3_page_4_thumbnail_' . $middleware_language})
                                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_page_4_thumbnail_' . $middleware_language}) }}" alt="Image" class="image">
                                    @elseif($contents->section_3_page_4_thumbnail_en)
                                        <img src="{{ asset('storage/backend/pages/' . $contents->section_3_page_4_thumbnail_en) }}" alt="Image" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="image">
                                    @endif
                                </div>
                                <div class="col-8 col-md-9">
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
                        <div class="col-12 col-lg-6">
                            <p class="title">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</p>
                            <p class="description">{{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}</p>

                            <form action="{{ route('homepage.subscription') }}" method="POST" class="form">
                                @csrf
                                <div class="row form-row">
                                    <div class="col-8">
                                        <input type="email" class="input" placeholder="{{ $contents->{'section_4_placeholder_' . $middleware_language} ?? $contents->section_4_placeholder_en }}" name="email" required>
                                        <x-frontend.input-error field="email"></x-frontend.input-error>
                                    </div>

                                    <div class="col-4">
                                        <button type="submit" class="submit-button">{{ $contents->{'section_4_button_' . $middleware_language} ?? $contents->section_4_button_en }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 col-lg-6">
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
                        <p class="section-description">{{ $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en }}</p>
                    </div>

                    <div class="col-4 text-end">
                        <a href="{{ route('articles.index') }}" class="view-more-button">{{ $contents->{'section_5_button_' . $middleware_language} ?? $contents->section_5_button_en }}</a>
                    </div>
                </div>

                <div class="row bottom-row">
                    @foreach($articles as $key => $article)
                        @if($key == 0)
                            <div class="col-12 col-md-8 left">
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

                    <div class="d-none d-md-block col-4 right">
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
                
                <!-- Mobile Read More button for articles section -->
                <div class="row mobile-only">
                    <div class="col-12 text-center">
                        <a href="{{ route('articles.index') }}" class="read-more-button">{{ $contents->{'section_5_button_' . $middleware_language} ?? $contents->section_5_button_en }}</a>
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
                    
                    <!-- Mobile Advertise button -->
                    <div class="row mobile-only">
                        <div class="col-12 text-center">
                            <a href="{{ route('register') }}" class="advertise-button-mobile">{{ $contents->{'section_6_button_' . $middleware_language} ?? $contents->section_6_button_en }}</a>
                        </div>
                    </div>
                </div>
        @endif

        <x-frontend.notification></x-frontend.notification>
    </div>
@endsection

@push('after-scripts')
    <script>
        
        $('#filter').on('click', function() {
            $('.filters').toggleClass('d-none');
        });
 
        $('#mobileSearchToggle').on('click', function() {
            $(this).toggleClass('active');
            $('#mobileSearchContent').toggleClass('show');
        });
 
        $('#filter-mobile').on('click', function() {
            $(this).siblings('.filters').toggleClass('d-none');
        });

        $(document).ready(function() {
            
            $('.js-single').select2();
            
            $('.js-single-mobile').select2();
            
            setMinRenewalDate();
            
            setMinRenewalDateMobile();
        });

        $('#tenancy_date').on('change', function() {
            setMinRenewalDate();
        });

        $('#tenancy_date_mobile').on('change', function() {
            setMinRenewalDateMobile();
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

        function setMinRenewalDateMobile() {
            const tenancyDate = document.getElementById('tenancy_date_mobile').value;
            
            if(tenancyDate) {
                const dateParts = tenancyDate.split('-');
                if(dateParts.length === 3) {
                    const year = parseInt(dateParts[0], 10);
                    const month = parseInt(dateParts[1], 10) - 1;
                    const day = parseInt(dateParts[2], 10);
                    const tenancyDateObj = new Date(year, month, day);
                    
                    tenancyDateObj.setMonth(tenancyDateObj.getMonth() + 1);
                    const renewalDateInput = document.getElementById('renewal_date_mobile');
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

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.mobile-search-dropdown').length) {
                $('#mobileSearchToggle').removeClass('active');
                $('#mobileSearchContent').removeClass('show');
            }
        });
    </script>
@endpush