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
                    <h2 style="text-align: center;">Register</h2>
                    <form method="POST" action="{{ route('guest.register.post')}}" >
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                            @error('name')
                            <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            @error('username')
                            <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>E-Mail Address</label>
                            <input type="email" class="form-control" placeholder="E-Mail Address" name="email">
                            @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            @error('password')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="text-align: right;width: 100%;">
                            <button type="submit" class="btn btn-success">Register</button>
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
