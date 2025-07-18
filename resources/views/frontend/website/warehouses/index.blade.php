@extends('frontend.layouts.app')

@section('title', 'Warehouses')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/warehouses.css') }}">
@endpush
 
@section('content')
    <div class="warehouses page-global">
        @if($contents->section_1_title_en)
            <div class="section-1 container section-margin">
                <h1 class="page-title">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>
                <p class="page-description">{{ $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en }}</p>
            </div>
        @endif

        @if($contents->section_2_title_en)
            <div class="section-2 container section-margin">
                <div class="row top-row">
                    <div class="col-8 left">
                        <p class="title">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</p>
                        <!-- In future -->
                            <p class="description">100,550 {{ $contents->{'section_2_warehouses_' . $middleware_language} ?? $contents->section_2_warehouses_en }}</p>
                        <!-- In future -->
                    </div>

                    <div class="col-4 right">
                        <button class="map-view-button" data-bs-toggle="modal" data-bs-target="#mapModal"><i class="bi bi-geo-alt"></i>{{ $contents->{'section_2_map_view_' . $middleware_language} ?? $contents->section_2_map_view_en }}</button>
                    </div>
                </div>

                <div class="row bottom-row">
                    <div class="col">
                        <input type="text" class="form-control input-field" placeholder="{{ $contents->{'section_2_search_' . $middleware_language} ?? $contents->section_2_search_en }}">
                    </div>

                    <div class="col">
                        <select class="form-select input-field">
                            <option value="all">{{ $contents->{'section_2_size_' . $middleware_language} ?? $contents->section_2_size_en }}</option>
                            <option>A</option>
                            <option>B</option>
                        </select>
                    </div>

                    <div class="col">
                        <select class="form-select input-field">
                            <option>{{ $contents->{'section_2_type_' . $middleware_language} ?? $contents->section_2_type_en }}</option>
                            <option>A</option>
                            <option>B</option>
                        </select>
                    </div>

                    <div class="col">
                        <select class="form-select input-field">
                            <option>{{ $contents->{'section_2_price_' . $middleware_language} ?? $contents->section_2_price_en }}</option>
                            <option>A</option>
                            <option>B</option>
                        </select>
                    </div>

                    <!-- <div class="col-2">
                        <select class="form-select input-field">
                            <option>Availability</option>
                            <option>A</option>
                            <option>B</option>
                        </select>
                    </div> -->

                    <div class="col">
                        <button class="apply-filters-button">{{ $contents->{'section_2_button_' . $middleware_language} ?? $contents->section_2_button_en }}</button>
                    </div>
                </div>
            </div>
        @endif

        @if($warehouses->count() > 0)
            <div class="section-3 container section-margin">
                <div class="row warehouse-row">
                    <div class="col-8 left">
                        @foreach($warehouses as $key => $warehouse)
                            <div class="single-warehouse">
                                <a href="{{ route('warehouses.show', $warehouse) }}">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <!-- In future -->
                                                <p class="badge">New</p>
                                            <!-- In future -->
                                            
                                            @if($warehouse->thumbnail)
                                                <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="image">
                                            @else
                                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="image">
                                            @endif
                                        </div>

                                        <div class="col-8">
                                            <p class="type">{{ $warehouse->storageType->name }}</p>

                                            <p class="price">{{ $contents->{'section_3_unlock_' . $middleware_language} ?? $contents->section_3_unlock_en }}<i class="bi bi-lock-fill"></i></p>

                                            <!-- In future -->
                                                <p class="name">{{ $warehouse->name }}</p>
                                            <!-- In future -->

                                            <!-- In future -->
                                                <p class="description">Orem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consect tur Lorem ipsum dolor sit amt onsectetu.</p>
                                            <!-- In future -->

                                            <p class="location">
                                                <i class="bi bi-geo-alt"></i>
                                                @if($middleware_language == 'en')
                                                    {{ $warehouse->address_en }}
                                                @else
                                                    {{ $warehouse->address_ar }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <!-- In future -->
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="posted-time">{{ $contents->{'section_3_listed_' . $middleware_language} ?? $contents->section_3_listed_en }} 1 {{ $contents->{'section_3_day_ago_' . $middleware_language} ?? $contents->section_3_day_ago_en }}</p>
                                            </div>

                                            <div class="col-6 text-end">
                                                <span class="action">
                                                    <i class="bi bi-heart"></i>
                                                    {{ $contents->{'section_3_like_' . $middleware_language} ?? $contents->section_3_like_en }}
                                                </span>

                                                <span class="action">
                                                    <i class="bi bi-share"></i>
                                                    {{ $contents->{'section_3_share_' . $middleware_language} ?? $contents->section_3_share_en }}
                                                </span>

                                                <span class="action">
                                                    <i class="bi bi-flag"></i>
                                                    {{ $contents->{'section_3_report_' . $middleware_language} ?? $contents->section_3_report_en }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <!-- In future -->
                            </div>
                        @endforeach

                        {{ $warehouses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                    </div>

                    <div class="col-4 right">
                        <div class="sidebar">
                            <p class="heading">{{ $contents->{'section_3_popular_' . $middleware_language} ?? $contents->section_3_popular_en }}</p>
                            <!-- In future -->
                                <a href="#" class="item">Consectetur Lorem ipsum dolor</a>
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                                <a href="#" class="item">Consectetur Lorem ipsum dolor</a>
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                            <!-- In future -->

                            <hr class="divider">

                            <p class="heading">{{ $contents->{'section_3_nearby_' . $middleware_language} ?? $contents->section_3_nearby_en }}</p>
                            <!-- In future -->
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                                <a href="#" class="item">Lorem ipsum dolor sit amt</a>
                            <!-- In future -->
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_4_title_en && $more_warehouses->count() > 0)
            <div class="section-4 container">
                <p class="section-title">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</p>

                <div class="row">
                    @foreach($more_warehouses as $key => $warehouse)
                        <div class="col-3">
                            <a href="{{ route('warehouses.show', $warehouse) }}">
                                <div class="single-warehouse">
                                    @if($warehouse->thumbnail)
                                        <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="image">
                                    @else
                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="image">
                                    @endif

                                    <div class="details">
                                        <!-- In future -->
                                            <p class="title">{{ $warehouse->name }}</p>
                                        <!-- In future -->

                                        <p class="subtitle">{{ $warehouse->storageType->name }}</p>
                                        <p class="price">{{ $contents->{'section_4_unlock_' . $middleware_language} ?? $contents->section_4_unlock_en }}<i class="bi bi-lock-fill"></i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- In future -->
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
        <!-- In future -->
    </div>
@endsection