<html>
    <head>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>

    <body>

        <div class="container">
            <div class="row" style="width: 50%;margin: 0 auto 0 auto;margin-top:100px;">
                <div class="col-md-12">
                    <h2 style="text-align: center;">Login</h2>
                    <form method="POST" action="{{ route('guest.login.post')}}">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div style="text-align: right;width: 100%;">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>

                        @if(session()->has('errorMessage'))
                            <div class="alert alert-danger" role="alert" style="margin-top:10px;">
                                {{session()->get('errorMessage')}}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger" role="alert" style="margin-top:10px;">
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br/>
                                @endforeach
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
