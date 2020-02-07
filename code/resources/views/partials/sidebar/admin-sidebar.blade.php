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
                        href="{{ route('user.index')}}">
                        User Accounts
                    </a>
                </li>
                     

                <li>
                    <a class="nav-link" 
                        href="{{ route('school.index')}}">
                        School Masterlist
                    </a>
                </li>

                <li>
                    <a class="nav-link" 
                        href="{{ route('course.index')}}">
                        Course Masterlist
                    </a>
                </li>


                <li>
                    <a class="nav-link" 
                        href="{{ route('offeredcourse.index')}}">
                        Offered Courses
                    </a>
                </li>

            </ul>
    </li>
        <li class="dropdown active">

        <a href="#" class="menu-toggle nav-link has-dropdown">
            <i data-feather="briefcase"></i>
            <span>Monitor</span>
        </a>
            <ul class="dropdown-menu">            

                <li>
                    <a class="nav-link" 
                        href="{{ route('adminso.index') }}">
                        Filed SO Applications
                    </a>
                </li>

                <li>
                    <a class="nav-link" 
                        href="{{ route('adminreceivedso.index') }}">
                        Received SO Applications
                    </a>
                </li>
                
            </ul>
    </li>

</ul>
