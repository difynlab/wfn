@php
    $contents = App\Models\CommonContent::find(1);
    $home = App\Models\HomepageContent::find(1);
    $about = App\Models\AboutContent::find(1);
    $support = App\Models\SupportContent::find(1);
    $authentication = App\Models\AuthenticationContent::find(1);
@endphp

<div class="container">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->logo) }}" alt="Logo" class="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}" href="{{ route('homepage') }}">{{ $home->{'page_name_' . $middleware_language} ?? $home->page_name_en }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'about' ? 'active' : '' }}" href="{{ route('about') }}">{{ $about->{'page_name_' . $middleware_language} ?? $about->page_name_en }}</a>
                </li>

                <li class="nav-item">
                    <!-- In future -->
                        <a class="nav-link {{ Request::segment(1) == 'warehouses' ? 'active' : '' }}" href="{{ route('warehouses.index') }}">Warehouses</a>
                    <!-- In future -->
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'supports' ? 'active' : '' }}" href="{{ route('supports.index') }}">{{ $support->{'page_name_' . $middleware_language} ?? $support->page_name_en }}</a>
                </li>

                @auth()
                    <li class="nav-item nav-gap dropdown">
                        <div class="row align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="col-4">
                                @if(auth()->user()->image)
                                    <img src="{{ asset('storage/backend/users/' . auth()->user()->image) }}" alt="Image" class="profile-image">
                                @else
                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_profile_image) }}" alt="Image" class="profile-image">
                                @endif
                            </div>

                            <div class="col-8">
                                <p class="name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                            </div>
                        </div>

                        <ul class="dropdown-menu profile-dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route(auth()->user()->role . '.dashboard') }}"><i class="bi bi-person"></i>{{ $contents->{'header_dashboard_' . $middleware_language} ?? $contents->header_dashboard_en }}</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    <form action="{{ auth()->user()->role == 'admin' ? route('admin.logout') : route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="log-out"><i class="bi bi-power"></i>{{ $contents->{'header_logout_' . $middleware_language} ?? $contents->header_logout_en }}</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item m-0">
                        <a class="nav-link login-button" href="{{ route('login') }}">{{ $authentication->{'login_name_' . $middleware_language} ?? $authentication->login_name_en }}</a>
                    </li>

                    <li class="nav-item m-0">
                        <a class="nav-link register-button" href="{{ route('register') }}">{{ $authentication->{'register_name_' . $middleware_language} ?? $authentication->register_name_en }}</a>
                    </li>
                @endauth

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-globe2"></i></a>

                    <ul class="dropdown-menu language-dropdown-menu">
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
            let route = '{{ route("language") }}';
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