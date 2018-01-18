<!DOCTYPE html>
<html lang="en">

    <head>
        @include('partials._head')
    </head>

    <body>

        @include('partials._nav')
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        @yield('header')

        <!-- Main Content -->
        <div class="container">
            @include('partials._messages')
            
            
            @yield('content')

        </div><!--end of container-->

        <hr>

        <!-- Footer -->
        @include('partials._footer')

        @include('partials._javascripts')
            @yield('scripts')

    </body>

</html>
