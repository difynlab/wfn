<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('storage/backend/global/logo.png') }}" alt="Logo" class="logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav align-items-center ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-bell notification-icon"></i></a>
            </li>

            <li class="nav-item">
                <div class="row align-items-center">
                    <div class="col-4">
                        @if(auth()->user()->image)
                            <img src="{{ asset('storage/backend/') }}" alt="Image" class="profile-image">
                        @else
                            <img src="{{ asset('storage/backend/global/no-profile-image.png') }}" alt="Image" class="profile-image">
                        @endif
                    </div>

                    <div class="col-8">
                        <p class="name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                        <p class="role">{{ ucfirst(auth()->user()->role) }}</p>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-chevron-down dropdown-icon"></i>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#"><i class="bi bi-person"></i>My Profile</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <form action="{{ route('backend-auth.portal.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="log-out"><i class="bi bi-power"></i>Log Out</button>
                            </form>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>