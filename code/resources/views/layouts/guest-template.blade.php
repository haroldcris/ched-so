<!DOCTYPE html>
<html lang="EN">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">

        <link href="/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

        <!-- Main styles for this application -->
        <link href="/css/style.min.css" rel="stylesheet">

    </head>

    <body>
        <div >
            @yield('content')
        </div>

        
        @include('partials.script')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>