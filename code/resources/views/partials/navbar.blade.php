<ul class="nav navbar-nav ml-auto mr-1">

    @auth

    <li class="nav-item dropdown">        
        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="true" aria-expanded="false">
            <img src="/img/avatars/user.png" class="img-avatar" alt="admin@bootstrapmaster.com">
            <span class="d-md-down-none">admin</span>
        </a>
        
        <div class="dropdown-menu dropdown-menu-right">
            

            {{-- <a class="dropdown-item" href="#">
                <i class="fa fa-bell-o"></i> Updates<span
                    class="badge badge-info">42</span></a> --}}



            <div class="dropdown-header text-center">
                <strong>Settings</strong>
            </div>
            <a class="dropdown-item" href="#">
                <i class="icon-user"></i>
                Profile
            </a>


            <div class="dropdown-header text-center">
                <strong>Account</strong>
            </div>
            <a class="dropdown-item" href="{{ route('logout')}}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="icon-lock"></i> 
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


        </div>
    </li>

    @endauth
</ul>