<ul class="sidebar-menu">

    <li class="menu-header">Main</li>

    <li class="dropdown">
        <a href="/" 
            class="nav-link">

            <i data-feather="monitor"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="dropdown active">

        <a href="#" class="menu-toggle nav-link has-dropdown">
            <i data-feather="briefcase"></i>
            <span>Manage</span>
        </a>
            <ul class="dropdown-menu">            

                <li>
                    <a class="nav-link" 
                        href="{{ route('supervisorfiledso.index') }}">
                      	Filed SO Applications
                    </a>
                </li>
 

                <li>
                    <a class="nav-link" 
                        href="{{ route('supervisorvalidatedso.index') }}">
                        Validated Applications
                    </a>
                </li>

            </ul>
    </li>

</ul>