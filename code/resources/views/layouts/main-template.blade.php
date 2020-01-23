 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CHED-SO Application">     
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} v{{ env('APP_VERSION') }} @yield('title')</title>

     @include('partials.head')
 </head>
 
 {{-- 
 <!-- BODY options, add following classes to body to change options
 
 // Header options
 1. '.header-fixed'					- Fixed Header
 
 // Brand options
 1. '.brand-minimized'       - Minimized brand (Only symbol)
 
 // Sidebar options
 1. '.sidebar-fixed'					- Fixed Sidebar
 2. '.sidebar-hidden'				- Hidden Sidebar
 3. '.sidebar-off-canvas'		- Off Canvas Sidebar
 4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
 5. '.sidebar-compact'			  - Compact Sidebar
 
 // Aside options
 1. '.aside-menu-fixed'			- Fixed Aside Menu
 2. '.aside-menu-hidden'			- Hidden Aside Menu
 3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu
 
 // Breadcrumb options
 1. '.breadcrumb-fixed'			- Fixed Breadcrumb
 
 // Footer options
 1. '.footer-fixed'					- Fixed footer
 
 -->
--}}

 <body class="app header-fixed sidebar-fixed .sidebar-off-canvas aside-menu-fixed aside-menu-hidden">
     <header class="app-header navbar">
         <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
         <a class="navbar-brand" href="/"></a>
         <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">☰</button>

         @include('partials.navbar')

     </header>

     <div class="app-body">
        {{ Auth::user()->role }}

         <div class="sidebar">            

            @if(Auth::user()->role = App\Models\Role::Admin)

                @include('partials.sidebar.admin-sidebar')

            @elseif (Auth::user()->role = App\Models\Role::HEI)
            
            
            @endif



         </div>

         <!-- Main content -->
         <main class="main">

             <!-- Breadcrumb -->
             @include('partials.breadcrumb')


             @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">{{ Session::get('message') }}</h4>
                </div>
             @endif

             <div class="container-fluid">
                 <div class="animated fadeIn">
                     @yield('content')
                 </div>

             </div>
             <!-- /.conainer-fluid -->
         </main>



     </div>
     @include('partials.footer')

     @include('partials.script')
     

     <!-- GenesisUI main scripts -->
     <script src="/js/app.js"></script>


     @yield('script')

 </body>

 </html>
