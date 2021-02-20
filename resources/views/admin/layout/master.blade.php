<html>
    <head>
        <title>@yield('title', "MASTER PAGE")</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toastr/toastr.min.css') }}" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body>
        <div class="container" id="menu">
            <div class="row">
                <div class="col-md-6" style="padding:7px;">
                    <a href="{{route('admin.home')}}" class="btn btn-info" style="color:white;">HOME</a>
                </div>

                <div class="col-md-6 text-right" style="margin-top: 10px;">
                    <span style="font-size: 20px;font-weight: bold;margin-right: 10px;">Welcome, {{auth()->user()->name}}</span>
                    <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
                </div>
            </div>

        </div>
        <hr/>

        @yield('content')

        @yield('css')

        @yield('javascript')

        @yield('js_init')

        <script>
            $( document ).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>
    </body>
</html>
