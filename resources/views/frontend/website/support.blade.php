@extends('frontend.layouts.app')

@section('title', 'Support')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/support.css') }}">
@endpush
 
@section('content')
    <div class="support">
        <div class="section-1 container">
            <p class="section-title">Hi, What can we help you with?</p>
            <p class="section-description">
                We're here to make your experience smooth and hassle-free. Whether you have questions, need support, or just want to learn more,
                feel free to reach out. Our team is ready to help with anything you need, just let us know.
            </p>

            <form>
                <div class="row">
                    <div class="col-12">
                        <label for="name">Name<span class="required">*</span></label>
                        <input type="text" id="name" class="form-control" placeholder="Please enter your name">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="contact">Contact Number</label>
                        <input type="text" id="contact" class="form-control" placeholder="Eg: +966 13 453 2874">
                    </div>
                    <div class="col">
                        <label for="email">Email<span class="required">*</span></label>
                        <input type="email" id="email" class="form-control" placeholder="Ex: johnmercury@gmail.com">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="exampleFormControlSelect1">Support Type<span class="required">*</span></label>
                        <select id="exampleFormControlSelect1" class="form-control">
                            <option>Select the team you need assistance from</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="exampleFormControlSelect1">Subject<span class="required">*</span></label>
                        <select id="exampleFormControlSelect1" class="form-control">
                            <option>Choose a subject that best matches your query</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="message">Message/Inquiry<span class="required">*</span></label>
                        <textarea id="message" class="form-control" rows="5" placeholder="Describe the issue or request you need help with."></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button type="submit" class="submit-btn">Submit Now</button>
                </div>
            </form>
        </div>
    </div>
@endsection