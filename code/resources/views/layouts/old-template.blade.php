<!DOCTYPE html>
<html lang="EN">
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.navbar')
        @include('partials.sidebar')

        <section class="main container is-fluid">
            @yield('content')
        </section>

        <!-- Scripts -->
        
        <script src="{{ asset('js/app.js') }}"></script>        
        @yield('script')

    

    </body>
</html>