<div class="navbar-bg"></div>

      <nav class="navbar navbar-expand-lg main-navbar sticky">

        <div class="form-inline mr-auto">

          <ul class="navbar-nav mr-3">
            <li>
              <a href="#" 
                data-toggle="sidebar" 
                class="nav-link nav-link-lg collapse-btn"> 

                <i data-feather="align-justify"></i>



              </a>

            </li>


            <ul class="navbar-nav navbar-right">
         
          <li class="dropdown">

              <a href="#" data-toggle="dropdown"
                  class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 

                <!-- <img alt="image" src="/img/dropdown.png"
                      class="user-img-radious-style">  -->
                      <i class="fas fa-chevron-circle-down"></i>

                <span class="d-sm-none d-lg-inline-block"></span>

              </a>

            <div class="dropdown-menu dropdown-menu-left pullDown">

              <!-- <div class="dropdown-divider"></div> -->

                <a href="#" class="dropdown-item has-icon"> 
                    <i class="far fa-print"></i> Print
                </a> 

                 <a href="#" class="dropdown-item has-icon"> 
                    <i class="far fa-file-alt"></i> Generate Report
                </a> 


                


              
                
    

            </div>
          </li>
        </ul>


         
          </ul>

        </div>



   <!--  ----- Profile ------
   ------------------ ------->
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown">

              <a href="#" data-toggle="dropdown"
                  class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 

                <img alt="image" src="/assets/img/{{ Auth::user()->role }}.png" data-src="/img/avatars/user.png"
                      class="user-img-radious-style"> 

                <span class="d-sm-none d-lg-inline-block"></span>

              </a>

            <div class="dropdown-menu dropdown-menu-right pullDown">

              <div class="dropdown-title">
                
                <span class="d-block mb-0">{{Auth::user()->username}}</span>
             
                <span class="small tm-0">{{Auth::user()->role}}</span>
              </div>

              <!-- <div class="dropdown-divider"></div> -->

                <a href="{{ route('profile.index') }}" 
                    class="dropdown-item has-icon"> 

                    <i class="far fa-user"></i> Account
                </a> 

                 <a href="{{ route('profile.changepw') }}" 
                    class="dropdown-item has-icon"> 

                    <i class="fas fa-key" >
                    </i> Change Password
                </a> 


                <a href="{{ route('logout')}}" 
                  class="dropdown-item has-icon text-danger" 
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">

                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
              
                <form id="logout-form" 
                    action="{{ route('logout') }}" 
                    method="POST" 
                    style="display: none;">
                    @csrf
                </form>

    

            </div>
          </li>
        </ul>

      </nav>


