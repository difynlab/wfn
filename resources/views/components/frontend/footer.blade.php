<div class="container-fluid footer">
    <div class="container">
        <div class="top">
            <p class="text">Need warehouse space?</p>
            <p class="text">Let's match you with the ideal location!</p>

            <a href="{{ route('frontend.register') }}" class="button">Register Now</a>
        </div>

        <div class="bottom">
            <div class="row">
                <div class="col-3">
                    <p class="title">Navigation</p>
                    <ul>
                        <li>
                            <a href="{{ route('frontend.about') }}">About</a>
                        </li>

                        <li>
                            <a href="{{ route('frontend.warehouses.index') }}">Warehouses</a>
                        </li>
                    </ul>
                </div>

                <div class="col-3">
                    <p class="title">Support</p>
                    <ul>
                        <li>
                            <a href="{{ route('frontend.articles.index') }}">Articles</a>
                        </li>

                        <li>
                            <a href="{{ route('frontend.support') }}">Support</a>
                        </li>
                    </ul>
                </div>

                <div class="col-3">
                    <p class="title">Legal</p>
                    <ul>
                        <li>
                            <a href="/privacy-policy">Privacy Policy</a>
                        </li>

                        <li>
                            <a href="/terms-of-use">Terms of Use</a>
                        </li>
                    </ul>
                </div>

                <div class="col-3">
                    <p class="title">Social</p>
                    <ul>
                        <li>
                            <a href="#" target="_blank">Facebook</a>
                        </li>

                        <li>
                            <a href="#" target="_blank">Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr />

        <div class="copyright">
            <div class="row align-items-center">
                <div class="col-6">
                    <img src="{{ asset('storage/frontend/logo.png') }}" alt="Logo" class="logo">
                </div>

                <div class="col-6 text-end">
                    <p class="text">&#169; 2025 Warehouse Finder Network. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>