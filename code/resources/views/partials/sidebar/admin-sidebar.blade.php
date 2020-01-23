<nav class="sidebar-nav">

    <ul class="nav">

        @include('components.nav-item', [
            'text'  => 'Dashboard',
            'route' => '#',
            'icon'  => 'icon-speedometer'
        ])


        <li class="nav-title"> MANAGE </li>


        @include('components.nav-item', [
            'text'  => 'User Accounts',
            'route' => '#',
            'icon'  => 'icon-user'
        ])


        @include('components.nav-item', [
            'text'  => 'Schools',
            'route' => '#',
            'icon'  => 'fas fa-hotel'
        ])



    </ul>
</nav>
<button class="sidebar-minimizer brand-minimizer" type="button"></button>
