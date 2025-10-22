@extends('backend.layouts.app')

@section('title','Warehouses')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-3 mb-md-4">
			<div class="col-12">
				<p class="title">Warehouses</p>
				<p class="description">Select your preferred warehouse.</p>
			</div>
		</div>

        @if($warehouses->isNotEmpty())
            <div class="row mb-3 mb-md-4">
                <div class="col-4">
                    @foreach($warehouses as $key => $warehouse)
                        <div class="single-warehouse {{ $key == 0 ? 'active' : '' }}" index="{{ $key }}">
                            <p class="name">
                                {{ $warehouse->name_en }}
                            </p>

                            <p class="description">
                                {{ $warehouse->short_description_en }}
                            </p>

                            <div class="details">
                                <div class="detail">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>{{ $warehouse->city_en }}</span>
                                </div>
                                <div class="detail">
                                    <i class="bi bi-box"></i>
                                    <span>{{ $warehouse->storageType->name_en }}</span>
                                </div>
                                <div class="detail">
                                    <i class="bi bi-star"></i>
                                    @php
                                        $reviews = $warehouse->reviews()->where('status', 1)->orderBy('id', 'desc')->get();
                                        $star_count = $reviews->sum('star');

                                        if($star_count > 0) {
                                            $rating = number_format($star_count / $reviews->count(), 2);
                                        }
                                        else {
                                            $rating = 0.0;
                                        }
                                    @endphp
                                    <span>{{ $rating }} ({{ $reviews->count() }} Reviews)</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="col-8">
                    @foreach($warehouses as $key => $warehouse)
                        <div class="right-single-warehouse {{ $key != 0 ? 'd-none' : '' }}" id="{{ $key }}">
                            @php
                                $sliders = [
                                    ['type' => 'image', 'name' => $warehouse->thumbnail],
                                    ['type' => 'image', 'name' => $warehouse->outside_image],
                                    ['type' => 'image', 'name' => $warehouse->loading_image],
                                    ['type' => 'image', 'name' => $warehouse->off_loading_image],
                                    ['type' => 'image', 'name' => $warehouse->handling_equipment_image],
                                    ['type' => 'image', 'name' => $warehouse->storage_area_image]
                                ];

                                if($warehouse->videos) {
                                    foreach(json_decode($warehouse->videos) as $video) {
                                        $sliders[] = [
                                            'type' => 'video',
                                            'name' => $video,
                                        ];
                                    }
                                }

                                shuffle($sliders);
                            @endphp

                            <div class="swiper-card">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach($sliders as $slider)
                                            <div class="swiper-slide">
                                                @if($slider['type'] === 'image')
                                                    @if($slider['name'])
                                                        <img src="{{ asset('storage/backend/warehouses/' . $slider['name']) }}" alt="Warehouse" class="swiper-resource">
                                                    @else
                                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="swiper-resource">
                                                    @endif
                                                @elseif($slider['type'] === 'video')
                                                    @if($slider['name'])
                                                        <video class="swiper-resource" controls>
                                                            <source src="{{ asset('storage/backend/warehouses/' . $slider['name']) }}" type="video/mp4" alt="Warehouse" class="swiper-resource">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @else
                                                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="Warehouse" class="swiper-resource">
                                                    @endif
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>

                            <div class="warehouse-card">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="warehouse-title">{{ $warehouse->name_en }}</p>
                                
                                        <div class="warehouse-info">{!! $warehouse->description_en !!}</div>

                                        <p class="license-tag">{{ $warehouse->license }}</p>
                                    </div>

                                    <div class="col-6">
                                        <div
                                            id="map-{{ $warehouse->id }}"
                                            class="warehouse-map"
                                            data-lat="{{ $warehouse->latitude }}"
                                            data-lng="{{ $warehouse->longitude }}"
                                            data-title="{{ $warehouse->name_en }}"
                                            style="width:100%;height:300px;border-radius:12px;overflow:hidden;"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4 line">

                                <div class="price-section">
                                    <p class="price-title">Storage Price</p>

                                    <table class="table">
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

                                <a href="{{ route('tenant.warehouses.review', $warehouse) }}" class="quote-btn">Get an Instant Quote</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    {{ $warehouses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <p class="no-data">No warehouses found</p>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('after-scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "{{ config('services.google_maps.key') }}", v: "weekly"});
    </script>

    <script>
        async function initWarehouseMaps() {
            try {
                const { Map } = await google.maps.importLibrary("maps");
                const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

                const mapEls = document.querySelectorAll(".warehouse-map");
                if(!mapEls.length) return;

                mapEls.forEach(el => {
                    const lat = parseFloat(el.dataset.lat);
                    const lng = parseFloat(el.dataset.lng);
                    const title = el.dataset.title || "Warehouse";

                    const position = { lat: lat, lng: lng };

                    if(!Number.isFinite(lat) || !Number.isFinite(lng)) return;

                    const map = new Map(el, {
                        zoom: 8,
                        center: position,
                        mapId: "DEMO_MAP_ID",
                        scrollwheel: false,
                        zoomControl: false,
                    });

                    const icon = document.createElement('i');
                    icon.className = 'bi bi-geo-alt-fill';
                    icon.style.fontSize = '50px';
                    icon.style.color = '#E31D1D';
                    icon.style.cursor = 'pointer';
                    icon.style.border = '1px solid #F4A2A2';
                    icon.style.padding = '100px';
                    icon.style.borderRadius = '50%';

                    new AdvancedMarkerElement({
                        map,
                        position,
                        title,
                        content: icon,
                    });
                });
            }
            catch (e) {
                console.error("Map init error:", e);
            }
        }

        window.addEventListener('load', initWarehouseMaps);
    </script>

    <script>
        $('.single-warehouse').on('click', function() {
            $(this).addClass('active').siblings().removeClass('active');

            let id = $(this).attr('index');

            $('.right-single-warehouse').addClass('d-none');
            $('#' + id).removeClass('d-none');
        })
    </script>
@endpush