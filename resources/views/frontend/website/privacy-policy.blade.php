@extends('frontend.layouts.app')

@section('title', 'Privacy-policy')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/privacy-policy.css') }}">
@endpush

@section('content')

    <div class="privacy-policy container">
        <div class="section-1 container">
            <p class="section-title">Privacy Policy</p>
            <p class="section-description">
                Your privacy is important to us. This Privacy Policy outlines how we collect, use, 
                and protect your personal information when you visit our website or use our services. 
                Please review it carefully to understand our practices and your rights. Whether you're 
                listing a warehouse or booking one, your privacy is our priority.
            </p>
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="terms-container">
                        <div class="terms-contact">
                            <h4 class="terms-heading">1. Information We Collect</h4>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p class="terms-subheading"><strong>Examples of data we collect may include:</strong></p>
                            <ul class="terms-list">
                            <li>Name, email address, and phone number</li>
                            <li>Payment details and billing address</li>
                            <li>Warehouse listings, search preferences, and reviews</li>
                            <li>Location data</li>
                            </ul>
                        </div>
                        <hr class="terms-divider">
                        <div class="terms-contact">
                            <h4 class="terms-heading">2. How We Use Your Information</h4>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p class="terms-subheading"><strong>We may use your data to:</strong></p>
                            <ul class="terms-list">
                            <li>Facilitate listings and bookings</li>
                            <li>Communicate with you about your account</li>
                            <li>Improve platform functionality</li>
                            <li>Comply with legal obligations</li>
                            </ul>
                        </div>

                        <hr class="terms-divider">
                        <div class="terms-contact">
                            <h4 class="terms-heading">3. Sharing Your Information</h4>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p class="terms-subheading"><strong>Your data may be shared with:</strong></p>
                            <ul class="terms-list">
                            <li>Other users during transactions</li>
                            <li>Third-party service providers (e.g., payment processors)</li>
                            <li>Legal authorities when required</li>
                            </ul>
                        </div>

                        <hr class="terms-divider">
                        <div class="terms-contact">
                            <h4 class="terms-heading">4. Cookies and Tracking</h4>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p class="terms-subheading"><strong>We use cookies to:</strong></p>
                            <ul class="terms-list">
                                <li>Analyze traffic</li>
                                <li>Remember your login</li>
                                <li>Personalize content</li>
                            </ul>
                        </div>

                        <hr class="terms-divider">
                        <div class="terms-contact">
                            <h4 class="terms-heading">5. Your Rights</h4>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p class="terms-subheading"><strong>You may:</strong></p>
                            <ul class="terms-list">
                            <li>Request access to your personal data</li>
                            <li>Update or delete your account</li>
                            </ul>
                        </div>

                        <hr class="terms-divider">
                        <div class="terms-contact">
                            <h4 class="terms-heading">6. Changes to This Policy</h4>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>

                        <hr class="terms-divider">
                        <div class="terms-contact">
                            <h4 class="terms-heading">7. Contact Us</h4>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p class="terms-subheading"><strong>For questions or concerns:</strong></p>
                            <p>Email: privacy@wfn.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection