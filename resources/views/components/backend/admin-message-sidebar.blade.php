@props([
    'all_count',
    'general_count',
    'landlord_count',
    'tenant_count',
    'starred_count',
    'bin_count'
])

<div class="message-sidebar">
    <p class="title">My Messages</p>

    <ul class="menu">
        <li class="link">
            <a href="{{ route('admin.messages.index', 'all') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'all' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-envelope"></i>
                    All Messages
                </div>

                <p class="number">{{ $all_count }}</p>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('admin.messages.index', 'general') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'general' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    General Inquiry
                </div>

                <p class="number">{{ $general_count }}</p>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('admin.messages.index', 'landlord') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'landlord' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-house-lock"></i>
                    Landlord Inquiry
                </div>

                <p class="number">{{ $landlord_count }}</p>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('admin.messages.index', 'tenant') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'tenant' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-key"></i>
                    Tenant Inquiry
                </div>

                <p class="number">{{ $tenant_count }}</p>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('admin.messages.index', 'starred') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'starred' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-star"></i>
                    Starred
                </div>

                <p class="number">{{ $starred_count }}</p>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('admin.messages.index', 'bin') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'bin' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-trash"></i>
                    Bin
                </div>

                <p class="number">{{ $bin_count }}</p>
            </a>
        </li>
    </ul>
</div>