<div class="container">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ route('frontend.homepage') }}">
            <img src="{{ asset('storage/frontend/logo.png') }}" alt="Logo" class="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}" href="{{ route('frontend.homepage') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'about' ? 'active' : '' }}" href="{{ route('frontend.about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'warehouses' ? 'active' : '' }}" href="{{ route('frontend.warehouses.index') }}">Warehouses</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'support' ? 'active' : '' }}" href="{{ route('frontend.support') }}">Support</a>
                </li>

                <li class="nav-item m-0">
                    <a class="nav-link login-button" href="{{ route('frontend.login') }}">Log In</a>
                </li>

                <li class="nav-item m-0">
                    <a class="nav-link register-button" href="{{ route('frontend.register') }}">Register Now</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-globe2"></i></a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item language-option" href="#" data-language="en">English</a>
                        </li>

                        <li>
                            <a class="dropdown-item language-option" href="#" data-language="ar">Arabic</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>

@push('after-scripts')
    <script>
        $('.navbar .language-option').on('click', function() {
            let language = $(this).attr('data-language');
            let route = '{{ route("frontend.language") }}';
            let csrfToken = '{{ csrf_token() }}';

            $.ajax({
                url: route,
                method: 'POST',
                data: {
                    language: language,
                    _token: csrfToken
                },
                success: function(data) {
                    if(data.success) {
                        // window.location.href = data.redirect_url;
                        location.reload();
                    }
                },
                error: function() {
                    alert('Error setting language')
                }
            });
        })
    </script>
@endpush