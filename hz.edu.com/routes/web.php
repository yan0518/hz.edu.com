<?php

/*
|--------------------------------------------------------------te------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', function(){
	return redirect('login');
});

// login 
Route::group([], function($router){
    $router->get('login', 'Auth\LoginController@showLoginForm');
    $router->post('login', 'Auth\LoginController@login');

    $router->get('register', 'Auth\RegisterController@showRegistrationForm');
    $router->post('register', 'Auth\RegisterController@register');
    $router->post('logout', 'Auth\LoginController@logout');

    $router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $router->post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::group(['middleware' => ['web','auth'], 'prefix' => 'students'], function($router){
    Route::get('/', function(){
        return redirect('students/info');
    });
    $router->get('info', 'StudentsController@info')->name('students.info');
    $router->get('new', 'StudentsController@entrance');
    $router->get('class', 'StudentsController@class')->name('students.class');

    $router->post('new', 'StudentsController@new')->name('students.new');
    
});

Route::get('/home', 'HomeController@index')->name('home');
