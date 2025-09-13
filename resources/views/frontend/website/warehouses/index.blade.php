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
                        <p class="description">{{ $all_warehouses->count() }} {{ $contents->{'section_2_warehouses_' . $middleware_language} ?? $contents->section_2_warehouses_en }}</p>
                    </div>

                    <div class="col-4 right">
                        <button class="map-view-button" data-bs-toggle="modal" data-bs-target="#mapModal"><i class="bi bi-geo-alt"></i>{{ $contents->{'section_2_map_view_' . $middleware_language} ?? $contents->section_2_map_view_en }}</button>

                        <div class="modal fade map-modal" id="mapModal">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('warehouses.filter') }}" method="GET">
                    <div class="row bottom-row">
                        <div class="col-6 mb-3 mb-lg-0 col-lg">
                            <!-- <input type="text" class="form-control input-field" name="location" placeholder="{{ $contents->{'section_2_search_' . $middleware_language} ?? $contents->section_2_search_en }}" value="{{ $location ?? '' }}"> -->

                            <select class="form-control js-single search-field" name="location">
                                <option value="">{{ $contents->{'section_2_search_' . $middleware_language} ?? $contents->section_2_search_en }}</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}" {{ isset($location) && $location == $city ? 'selected' : '' }}>{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3 mb-lg-0 col-lg">
                            <select class="form-select input-field" name="warehouse_size">
                                <option value="all">{{ $contents->{'section_2_size_' . $middleware_language} ?? $contents->section_2_size_en }}</option>
                                <option value="50" {{ isset($warehouse_size) && $warehouse_size == '50' ? "selected" : "" }}>{{ $contents->{'section_2_size_1_' . $middleware_language} ?? $contents->section_2_size_1_en }}</option>
                                <option value="100" {{ isset($warehouse_size) && $warehouse_size == '100' ? "selected" : "" }}>{{ $contents->{'section_2_size_2_' . $middleware_language} ?? $contents->section_2_size_2_en }}</option>
                                <option value="200" {{ isset($warehouse_size) && $warehouse_size == '200' ? "selected" : "" }}>{{ $contents->{'section_2_size_3_' . $middleware_language} ?? $contents->section_2_size_3_en }}</option>
                                <option value="200+" {{ isset($warehouse_size) && $warehouse_size == '200+' ? "selected" : "" }}>{{ $contents->{'section_2_size_4_' . $middleware_language} ?? $contents->section_2_size_4_en }}</option>
                            </select>
                        </div>

                        <div class="col-6 col-lg">
                            <select class="form-select input-field" name="storage_type">
                                <option value="all">{{ $contents->{'section_2_type_' . $middleware_language} ?? $contents->section_2_type_en }}</option>
                                @foreach($storage_types as $storage_type)
                                    <option value="{{ $storage_type->id }}" {{ isset($selected_storage_type) && $selected_storage_type == $storage_type->id ? "selected" : "" }}>
                                        {{ $storage_type->{'name_' . $middleware_language} ?? $storage_type->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <div class="col">
                            <select class="form-select input-field" name="price">
                                <option value="all">{{ $contents->{'section_2_price_' . $middleware_language} ?? $contents->section_2_price_en }}</option>
                                <option value="50" {{ isset($price) && $price == '50' ? "selected" : "" }}>0 SAR - 50 SAR</option>
                                <option value="100" {{ isset($price) && $price == '100' ? "selected" : "" }}>50 SAR - 100 SAR</option>
                                <option value="150" {{ isset($price) && $price == '150' ? "selected" : "" }}>100 SAR - 150 SAR</option>
                                <option value="200" {{ isset($price) && $price == '200' ? "selected" : "" }}>150 SAR - 200 SAR</option>
                                <option value="200+" {{ isset($price) && $price == '200+' ? "selected" : "" }}>200+ SAR</option>
                            </select>
                        </div> -->

                        <!-- <div class="col-2">
                            <select class="form-select input-field">
                                <option>Availability</option>
                                <option>A</option>
                                <option>B</option>
                            </select>
                        </div> -->

                        <div class="col-6 col-lg">
                            <button type="submit" class="apply-filters-button">{{ $contents->{'section_2_button_' . $middleware_language} ?? $contents->section_2_button_en }}</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        <div class="section-3 container section-margin">
            <div class="row warehouse-row">
                @if($warehouses->count() > 0)
                    <div class="col-12 mb-4 mb-md-0 col-md-8 left">
                        @foreach($warehouses as $key => $warehouse)
                            <div class="single-warehouse">
                                <a href="{{ route('warehouses.show', $warehouse) }}">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-md-4">
                                            <!-- @php
                                                $listed_date = $warehouse->created_at->copy()->startOfDay();
                                                $today = now()->startOfDay();
                                                $date_difference = $listed_date->diffInDays($today, false);
                                            @endphp -->

                                            <!-- @if($date_difference <= 30)
                                                <p class="badge">{{ $contents->{'section_3_new_' . $middleware_language} ?? $contents->section_3_new_en }}</p>
                                            @endif -->
                                            
                                            @if($warehouse->thumbnail)
                                                <img src="{{ asset('storage/backend/warehouses/' . $warehouse->thumbnail) }}" alt="Warehouse" class="image">
                                            @else
                                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="image">
                                            @endif
                                        </div>

                                        <div class="col-7 col-md-8">
                                            <p class="type">
                                                {{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}
                                            </p>

                                            <p class="price">
                                                {{ $contents->{'section_3_unlock_' . $middleware_language} ?? $contents->section_3_unlock_en }}<i class="bi bi-lock-fill"></i>
                                            </p>

                                            <p class="name">
                                                {{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}
                                            </p>

                                            <p class="description">
                                                {{ $warehouse->{'short_description_' . $middleware_language} ?? $warehouse->short_description_en }}
                                            </p>

                                            <p class="location">
                                                <i class="bi bi-geo-alt"></i>
                                                {{ $warehouse->{'city_' . $middleware_language} ?? $warehouse->city_en }}
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <div class="box">
                                    <div class="row">
                                        <!-- <div class="col-6">
                                            <p class="posted-time">
                                                {{ $contents->{'section_3_listed_' . $middleware_language} ?? $contents->section_3_listed_en }}

                                                {{ $date_difference }}

                                                {{ $contents->{'section_3_day_ago_' . $middleware_language} ?? $contents->section_3_day_ago_en }}
                                            </p>
                                        </div> -->
                                      
                                        <div class="col-12 text-end">
                                            <span class="action" onClick="favoriteToggle({{ auth()->user()->id }}, {{ $warehouse->id }}, '{{ route('warehouses.favorite') }}', {{ isFavorite(auth()->user()->id, $warehouse->id) ? 1 : 0 }}, this)">
                                                <i class="bi {{ isFavorite(auth()->user()->id, $warehouse->id) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                                                {{ $contents->{'section_3_like_' . $middleware_language} ?? $contents->section_3_like_en }}
                                            </span>

                                            <span class="action">
                                                <span data-bs-toggle="dropdown">
                                                    <i class="bi bi-share"></i>
                                                    {{ $contents->{'section_3_share_' . $middleware_language} ?? $contents->section_3_share_en }}
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
                                            </span>

                                            <!-- <span class="action">
                                                <i class="bi bi-flag"></i>
                                                {{ $contents->{'section_3_report_' . $middleware_language} ?? $contents->section_3_report_en }}
                                            </span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $warehouses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                    </div>
                @else
                    <div class="col-8">
                        <p class="no-data">No warehouses found</p>
                    </div>
                @endif

                <div class="col-12 col-md-4 right">
                    <div class="sidebar">
                        @if($popular_warehouses->count() > 0)
                            <p class="heading">{{ $contents->{'section_3_popular_' . $middleware_language} ?? $contents->section_3_popular_en }}</p>

                            @foreach($popular_warehouses as $key => $warehouse)
                                <a href="{{ route('warehouses.show', $warehouse) }}" class="item">{{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}</a>
                            @endforeach

                            <hr class="divider">
                        @endif

                        <p class="heading">{{ $contents->{'section_3_top_rated_' . $middleware_language} ?? $contents->section_3_top_rated_en }}</p>
    
                        @foreach($top_rated_warehouses as $key => $warehouse)
                            <a href="{{ route('warehouses.show', $warehouse) }}" class="item">{{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
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
                                        <p class="title">
                                            {{ $warehouse->{'name_' . $middleware_language} ?? $warehouse->name_en }}
                                        </p>

                                        <p class="subtitle">
                                            {{ $warehouse->storageType->{'name_' . $middleware_language} ?? $warehouse->storageType->name_en }}
                                        </p>

                                        <p class="price">{{ $contents->{'section_4_unlock_' . $middleware_language} ?? $contents->section_4_unlock_en }}<i class="bi bi-lock-fill"></i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection

@push('after-scripts')
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "{{ config('services.google_maps.key') }}", v: "weekly"});</script>

    <script>
        async function initMap() {
            const position = { lat: 23.8859, lng: 45.0792 };
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");

            const warehouses = @json($all_warehouses);
            const language = @json($middleware_language ?? 'en');

            let map = new Map(document.getElementById("map"), {
                zoom: 7,
                center: position,
                mapId: "DEMO_MAP_ID",
                scrollwheel: false,
                zoomControl: false,
            });

            warehouses.forEach(warehouse => {
                const lat = parseFloat(warehouse.latitude);
                const lng = parseFloat(warehouse.longitude);

                if(!isNaN(lat) && !isNaN(lng)) {
                    const position = { lat, lng };

                    const icon = document.createElement('i');
                    icon.className = 'bi bi-cursor-fill';
                    icon.style.fontSize = '50px';
                    icon.style.color = '#E31D1D';
                    icon.style.cursor = 'pointer';

                    const infoTitle = warehouse[`name_${language}`] || warehouse.name_en;
                    const infoSubtitle = warehouse[`city_${language}`] || warehouse.city_en;

                    icon.addEventListener('click', () => {
                        window.location.href = warehouse.url;
                    });

                    const infoWindow = new google.maps.InfoWindow({
                        content: `
                            <div class="custom-info-window">
                                <div class="info-title">${infoTitle}</div>
                                <div class="info-subtitle">${infoSubtitle}</div>
                            </div>
                        `
                    });

                    const marker = new AdvancedMarkerElement({
                        map,
                        position,
                        title: infoTitle,
                        content: icon,
                    });

                    icon.addEventListener('mouseenter', () => {
                        infoWindow.open({
                            anchor: marker,
                            map,
                        });
                    });

                    icon.addEventListener('mouseleave', () => {
                        infoWindow.close();
                    });
                }
            });
        }

        initMap();
    </script>

    <script>
        $(document).ready(function() {
            $('.js-single').select2();
        });
    </script>
@endpush