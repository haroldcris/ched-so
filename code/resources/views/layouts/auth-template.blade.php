<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"> 
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>{{ config('app.name') }} v{{ env('APP_VERSION') }} @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/assets/css/app.min.css">
  <link rel="stylesheet" href="/assets/bundles/bootstrap-social/bootstrap-social.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='/img/logo.ico' />
</head>

<body>
  <div class="loader"></div>
 
    @yield('content')


    <script src="/js/axios.min.js"></script>

    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>


    @yield('script')
  </body>

</html>