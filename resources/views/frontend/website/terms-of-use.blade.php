@extends('frontend.layouts.app')

@section('title', 'Terms-of-use')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/terms-of-use.css') }}">
@endpush

@section('content')
    <div class="terms-of-use container">
        <div class="section-1 container">
            <p class="section-title">Terms and Conditions</p>
            <p class="section-description">
                These Terms and Conditions govern your use of our warehouse rental platform. 
                By accessing or using our services, you agree to comply with the rules, responsibilities, 
                and legal obligations outlined here. Please read them carefully before listing or booking a warehouse.
            </p>
        </div>

        <div class="section-2 container">
            <div class="row">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-terms-tab" data-bs-toggle="pill" data-bs-target="#pills-terms" type="button" role="tab" aria-controls="pills-terms" aria-selected="true">
                                Acceptance of Terms
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-website-tab" data-bs-toggle="pill" data-bs-target="#pills-website" type="button" role="tab" aria-controls="pills-website" aria-selected="false">
                                Use of the Website
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-accounts-tab" data-bs-toggle="pill" data-bs-target="#pills-accounts" type="button" role="tab" aria-controls="pills-accounts" aria-selected="false">
                                User Accounts
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-transactions-tab" data-bs-toggle="pill" data-bs-target="#pills-transactions" type="button" role="tab" aria-controls="pills-transactions" aria-selected="false">
                                Payments and Transactions
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-termination-tab" data-bs-toggle="pill" data-bs-target="#pills-termination" type="button" role="tab" aria-controls="pills-termination" aria-selected="false">
                                Termination
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-liability-tab" data-bs-toggle="pill" data-bs-target="#pills-liability" type="button" role="tab" aria-controls="pills-liability" aria-selected="false">
                                Limitation of Liability
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-law-tab" data-bs-toggle="pill" data-bs-target="#pills-law" type="button" role="tab" aria-controls="pills-law" aria-selected="false">
                                Governing Law
                            </button>
                        </li>
                    </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-terms" role="tabpanel" aria-labelledby="pills-terms-tab" tabindex="0"> 
                    <div class="terms-container">
                        <h2 class="terms-title">Acceptance of Terms</h2>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            Use of the platform constitutes a legally binding agreement between you (the "User") and Company, whether you are a visitor, 
                            registered user, service provider, or client. These Terms apply to all users of the site, including without limitation 
                            users who are browsers, vendors, customers, and/or contributors of content.
                        </p>
                        <p class="terms-subheading">You confirm and warrant that:</p>
                        <ul class="terms-list">
                            <li>You are at least 18 years old or the age of legal majority in your jurisdiction.</li>
                            <li>You have the legal authority to enter into this agreement on your own behalf or on behalf of a company or other legal entity.</li>
                            <li>Your use of the site will comply with all applicable laws and regulations.</li>
                        </ul>
                        <p class="terms-paragraph">
                            We reserve the right to update or change these Terms at any time without prior notice. Your continued use of the site 
                            following any such changes constitutes your agreement to follow and be bound by the revised Terms.
                        </p>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Changes to This Policy</h3>
                            <p class="terms-paragraph">
                                We reserve the right to modify, update, or revise these Terms at any time, at our sole discretion. Any changes will
                                become effective immediately upon posting the updated version on this page, unless otherwise stated.
                            </p>
                            <p class="terms-paragraph">
                                We encourage you to review these Terms periodically to stay informed of any updates.
                            </p>
                        </div>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Contact Us</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. 
                                We may modify this Privacy Policy from time to time. Changes will be posted on this page with the revised date.
                            </p>
                            <p class="terms-contact">
                                For questions or concerns:<br>
                                Email: privacy@wfn.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="pills-website" role="tabpanel" aria-labelledby="pills-website-tab" tabindex="0"> 
                    <div class="terms-container">
                        <h2 class="terms-title">Use of the Website</h2>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Use of the website</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Contact Us</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. 
                                We may modify this Privacy Policy from time to time. Changes will be posted on this page with the revised date.
                            </p>
                            <p class="terms-contact">
                                For questions or concerns:<br>
                                Email: privacy@wfn.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="pills-accounts" role="tabpanel" aria-labelledby="pills-accounts-tab" tabindex="0"> 
                    <div class="terms-container">
                        <h2 class="terms-title">User Accounts</h2>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            We reserve the right to update or change these Terms at any time without prior notice. Your continued use of the site 
                            following any such changes constitutes your agreement to follow and be bound by the revised Terms.
                        </p>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Changes to This Policy</h3>
                            <p class="terms-paragraph">
                                We reserve the right to modify, update, or revise these Terms at any time, at our sole discretion. Any changes will
                                become effective immediately upon posting the updated version on this page, unless otherwise stated.
                            </p>
                            <p class="terms-paragraph">
                                We encourage you to review these Terms periodically to stay informed of any updates.
                            </p>
                        </div>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Contact Us</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. 
                                We may modify this Privacy Policy from time to time. Changes will be posted on this page with the revised date.
                            </p>
                            <p class="terms-contact">
                                For questions or concerns:<br>
                                Email: privacy@wfn.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="pills-transactions" role="tabpanel" aria-labelledby="pills-transactions-tab" tabindex="0"> 
                    <div class="terms-container">
                        <h2 class="terms-title">Payments and Transactions</h2>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-subheading">You confirm and warrant that:</p>
                        <ul class="terms-list">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        </ul>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Contact Us</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. 
                                We may modify this Privacy Policy from time to time. Changes will be posted on this page with the revised date.
                            </p>
                            <p class="terms-contact">
                                For questions or concerns:<br>
                                Email: privacy@wfn.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="pills-termination" role="tabpanel" aria-labelledby="pills-termination-tab" tabindex="0"> 
                    <div class="terms-container">
                        <h2 class="terms-title">Termination</h2>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-subheading">You confirm and warrant that:</p>
                        <ul class="terms-list">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        </ul>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Contact Us</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. 
                                We may modify this Privacy Policy from time to time. Changes will be posted on this page with the revised date.
                            </p>
                            <p class="terms-contact">
                                For questions or concerns:<br>
                                Email: privacy@wfn.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="pills-liability" role="tabpanel" aria-labelledby="pills-liability-tab" tabindex="0"> 
                    <div class="terms-container">
                        <h2 class="terms-title">Limitation of Liability</h2>
                        <p class="terms-subheading">You confirm and warrant that:</p>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Contact Us</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. 
                                We may modify this Privacy Policy from time to time. Changes will be posted on this page with the revised date.
                            </p>
                            <p class="terms-contact">
                                For questions or concerns:<br>
                                Email: privacy@wfn.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="pills-law" role="tabpanel" aria-labelledby="pills-law-tab" tabindex="0"> 
                    <div class="terms-container">
                        <h2 class="terms-title">Governing Law</h2>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="terms-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <hr class="terms-divider">
                        <div class="terms-section">
                            <h3 class="terms-heading">Contact Us</h3>
                            <p class="terms-paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. 
                                We may modify this Privacy Policy from time to time. Changes will be posted on this page with the revised date.
                            </p>
                            <p class="terms-contact">
                                For questions or concerns:<br>
                                Email: privacy@wfn.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection