<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('guest.home');

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'middleware' => 'admin'], function () { //middleware açıklaması : admin mi ?
    Route::get('/login', 'LoginController@index')->name('guest.login');
    Route::post('/login', 'LoginController@login')->name('guest.login.post');
    Route::get('/register', 'RegisterController@index')->name('guest.register');
    Route::post('/register', 'RegisterController@register')->name('guest.register.post');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'permission'], function () { //middleware açıklaması : admin mi ve yetki kontrolü
    Route::get('/', 'AdminHomeController@index')->name('admin.home');

    Route::group(['prefix' => 'task', 'namespace' => 'Task'], function () {
        Route::get('/', 'TaskController@index')->name('admin.task');
        Route::get('add', 'TaskController@getAdd')->name('admin.task.add');
        Route::post('create', 'TaskController@create')->name('admin.task.create');
        Route::get('edit/{id}', 'TaskController@getEdit')->name('admin.task.edit');
        Route::put('update/{id}', 'TaskController@update')->name('admin.task.update');
        Route::delete('delete', 'TaskController@delete')->name('admin.task.delete');
    });

});

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('/logout', 'LogoutController@logout')->name('logout');
});
