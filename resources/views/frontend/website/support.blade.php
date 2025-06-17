@extends('frontend.layouts.app')

@section('title', 'Support')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/support.css') }}">
@endpush
 
@section('content')
    <div class="support page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">Hi, What can we help you with?</h1>
            <p class="page-description">
                We're here to make your experience smooth and hassle-free. Whether you have questions, need support, or just want to learn more,
                feel free to reach out. Our team is ready to help with anything you need, just let us know.
            </p>
        </div>

        <div class="section-2 container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                            <input type="text" id="name" class="form-control input-field" name="name" placeholder="Please enter your name" required>
                        </div>

                        <div class="mb-4">
                            <div class="row contact-row">
                                <div class="col-6 col-md-6 contact-field">
                                    <label for="contact-number" class="form-label label">Contact Number</label>
                                    <input type="text" id="contact-number" class="form-control input-field" name="contact_number" placeholder="Eg: +966 13 453 2874">
                                </div>
                                <div class="col-6 col-md-6 contact-field">
                                    <label for="email" class="form-label label">Email<span class="asterisk">*</span></label>
                                    <input type="email" id="email" class="form-control input-field" placeholder="Ex: johnmercury@gmail.com">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="support-type" class="form-label label">Support Type<span class="asterisk">*</span></label>
                            <select class="form-select input-field" id="support-type" name="support_type" required>
                                <option>Select the team you need assistance from</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="form-label label">Subject<span class="asterisk">*</span></label>
                            <select class="form-select input-field" id="subject" name="subject" required>
                                <option>Choose a subject that best matches your query</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="message" class="form-label label">Message/Inquiry<span class="asterisk">*</span></label>
                            <textarea id="message" class="form-control" rows="5" placeholder="Describe the issue or request you need help with."></textarea>
                        </div>

                        <button type="submit" class="submit-button">Submit Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection