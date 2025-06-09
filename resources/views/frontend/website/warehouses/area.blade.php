@extends('frontend.layouts.app')

@section('title', 'Warehouse Area')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/area.css') }}">
@endpush

@section('content')
    <div class="area page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">Best Areas to Set Up a Warehouse in Saudi Arabia</h1>

            <div class="page-description">
                When selecting the best location for your warehouse in Saudi Arabia, 
                several key factors need to be considered, such as proximity to transport hubs, 
                cost-effectiveness, accessibility to major business districts, and availability of 
                skilled labor. Saudi Arabia offers a diverse range of strategically located areas 
                that cater to businesses looking for warehouse space. Below are some of 
                the prime locations in Saudi Arabia ideal for setting up a warehouse.
            </div>
        </div>

        <div class="section-2 container section-margin">
            <div class="content">
                <h6>1. 2nd Industrial City – Riyadh</h6>
                <p class="paragraph">
                    2nd Industrial City in Riyadh is one of the Kingdom's most established industrial zones. 
                    Strategically located on the southern edge of the capital, it provides seamless access to 
                    central logistics corridors, including the Eastern Province and Riyadh's core markets. 
                    The area is designed for heavy industrial, warehousing, and logistics operations, with 
                    reliable infrastructure, highway access, and proximity to the dry port and cargo terminals.
                </p>
            </div>
        </div>

        <div class="section-3">
            <div class="container">
                <div class="row advertise">
                    <div class="col-9">
                        <p class="text">Need help finding the perfect warehouse location?</p>
                        <p class="text">Our team is ready to assist!</p>
                    </div>
                    <div class="col-3">
                        <a href="#" class="advertise-button">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection