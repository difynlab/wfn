@props([
    'all_count',
    'starred_count',
    'bin_count'
])

<div class="message-sidebar">
    <p class="title">My Messages</p>

    <ul class="menu">
        <li class="link">
            <a href="{{ route(auth()->user()->role . '.messages.index', 'all') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'all' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-envelope"></i>
                    All Messages
                </div>

                <p class="number">{{ $all_count }}</p>
            </a>
        </li>

        <li class="link">
            <a href="{{ route(auth()->user()->role . '.messages.index', 'starred') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'starred' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-star"></i>
                    Starred
                </div>

                <p class="number">{{ $starred_count }}</p>
            </a>
        </li>

        <li class="link">
            <a href="{{ route(auth()->user()->role . '.messages.index', 'bin') }}" class="actual-link {{ Request::segment(2) == 'messages' && Request::segment(3) == 'bin' ? 'active' : '' }}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-trash"></i>
                    Bin
                </div>

                <p class="number">{{ $bin_count }}</p>
            </a>
        </li>
    </ul>
</div>