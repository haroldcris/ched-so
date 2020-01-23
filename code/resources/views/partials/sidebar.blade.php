<aside id="sidebar-menu" class="menu">
    <ul class="menu-list">
        
        @include('partials.menu-avatar')

        <li>
            <a href="{{ route('home') }}" class="" title="Dashboard">
                <span class="icon"><i class="fa fa-dashboard" aria-hidden="true"></i></span>
                <span class="text-label is-hidden"> Dashboard </span>
            </a>
        </li>

    </ul>



    <p class="menu-label">Others</p>
    <ul class="menu-list">
        <li>
            <a href="#" class="item" title="Others">
                <span class="icon"><i class="fa fa-database"></i></span>
                <span class="text-label is-hidden"> Others</span>
            </a>
        </li>
    </ul>
</aside>