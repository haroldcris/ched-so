<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="description" content="CHED-SO Application">     
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }} v{{ env('APP_VERSION') }} @yield('title')</title>

  <!-- General CSS Files -->
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <link rel="stylesheet" href="/assets/css/app.min.css">
  <link rel="stylesheet" href="/assets/bundles/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="/assets/bundles/select2/dist/css/select2.min.css">
  
    <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/components.css">
  <link rel="stylesheet" href="/assets/css/custom.css">

  <link rel="stylesheet" type="text/css" href="/css/datepicker.css">
  <script src="/js/datepicker.min.js" ></script>

    @yield('head')

</head>

<body class="light light-sidebar 

  @if (\Auth::user()->role == "admin")
      
      theme-green

  @elseif (\Auth::user()->role == "hei")

      theme-cyan

  @elseif (\Auth::user()->role == "supervisor")
     
      theme-green

      @endif 

">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      @include('partials.navbar')

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> 
            	<img alt="image" src="/img/logo.png" class="header-logo" /> 
            	<span class="logo-name"></span>
            </a>
          </div>
          <div class="sidebar">

          @include('partials.sidebar.' . Auth::user()->role .   '-sidebar')


          
          </div>
        </aside>
      </div>
             
      

      <!-- Main Content -->
      <div class="main-content" >

        <section class="section">
          <div class="section-body container">
            <!-- add content here -->
            
            @yield ('content')

          </div>
        </section>



      </div>
      
      @yield('modal')

      @include ('partials.footer')            

    </div>
  </div>

  <script src="/assets/js/app.min.js"></script>
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <script src="/assets/js/custom.js"></script>
  
  <script src="/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  {{-- <script src="/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> --}}
  <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>

  
  <!-- Page Specific JS File -->
  
  
  
  @if(session('message'))
      <script>
          $(function() {
              showToast("{{ session('message') }}");
          });
      </script>            

  @endif

  @yield('script')
  
</body>

</html>