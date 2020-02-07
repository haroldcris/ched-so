{{-- 
    @include('components.nav-item', 
    [
        'text'  => 'Menu Item',
        'route' => route(''),
        'icon'  => 'icon-user',
    ])
--}}

<li class="nav-item">
    <a class="nav-link" href="{{ $route }}">
        <i class="{{ $icon }}"></i> {{ $text }}
    </a>
</li>