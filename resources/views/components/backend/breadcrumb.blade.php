@props(['page_name'])

<div class="fixed">
    <div class="row breadcrumbs">
        <div class="col-2">
            <a href="{{ route('backend.dashboard.index') }}">
                <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->logo) }}" alt="Logo" class="logo">
            </a>
        </div>
        
        <div class="col-7 col-xl-8">
            <ul class="breadcrumb">
                @if($page_name == 'Dashboard')
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Dashboard</a></li>
                @elseif(in_array($page_name, ['Home Page', 'Why We Are Different', 'History Of GPNi']))
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backend.pages.index') }}">Pages</a></li>
                    <li class="breadcrumb-item">{{ $page_name }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">{{ $page_name }}</li>
                @endif
            </ul>

            <p class="page-title">{{ $page_name }}</p>
        </div>

        <div class="col-3 col-xl-2">
            <div class="row align-items-center">
                <div class="col-4">
                    @if(auth()->user()->image)
                        <img src="{{ asset('storage/backend/persons/admins/' . auth()->user()->image) }}" alt="Image" class="profile-image">
                    @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_profile_image) }}" alt="Image" class="profile-image">
                    @endif
                </div>
                <div class="col-8">
                    <p class="name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                    <p class="role">{{ ucfirst(auth()->user()->role) }}</p>
                    <form method="POST" action="{{ route('backend.logout') }}">
                        @csrf
                        <a href="{{ route('backend.logout') }}" class="log-out" onclick="event.preventDefault(); this.closest('form').submit();">Sign Out <i class="bi bi-arrow-right"></i></a>
                    </form>
                </div>
            </div>
        </div>

        <x-backend.notification></x-backend.notification>
    </div>
</div>