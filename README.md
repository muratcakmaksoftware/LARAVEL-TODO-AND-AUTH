## Laravel Authentication & TODO
###Requirements
- Bootstrap Install
````
composer require laravel/ui

php artisan ui bootstrap

npm install && npm run dev

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
````

- Font Awesome

````
npm install font-awesome --save

resources/sass/app.scss
@import "node_modules/font-awesome/scss/font-awesome.scss";

npm run dev

<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
````

- [JQUERY Download](https://jquery.com/download/)
````
public/js/jquery/jquery-3.5.1.min.js
````

- [Toastr Download](https://codeseven.github.io/toastr/)
````
public/css/toastr/toastr.min.css
public/js/toastr/toastr.min.js
````

###Configuration
routes/web.php for need.
````
app/Providers/RouteServiceProvider.php
protected $namespace = 'App\\Http\\Controllers';
````
Paginator for need
````
app/Providers/AppServiceProvider.php
Paginator::useBootstrap();
````

###Information
#####Admin Account
````
username: murat
password: 1234
````

#####Member Account
````
username: kerem
password: 1234
````

#####Middleware
````
app/Http/Kernel.php

protected $routeMiddleware = [
'admin' => \App\Http\Middleware\Admin\AdminAuth::class, //Admin check
'permission' => \App\Http\Middleware\Admin\AdminPermission::class, //Admin Check + Permission Check 
````
#####Auth Config
````
config/auth.php

'defaults' => [
    'guard' => 'users',
    'passwords' => 'users',
],

'guards' => [
    'users' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
    ],
],
````
