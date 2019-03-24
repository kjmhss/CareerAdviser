<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", "User\Auth\LoginController@showLoginForm")->name('login_form');
Route::post("/login", "User\Auth\LoginController@login")->name('login');
Route::post("/logout", "User\Auth\LoginController@logout")->name('logout');
Route::get("/register", "User\Auth\RegisterController@showRegistrationForm")->name('register_form');
Route::post("/register", "User\Auth\RegisterController@register")->name('register');
Route::get("/home", "User\HomeController@index")->name('home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get("/login", "Admin\Auth\LoginController@showLoginForm")->name('auth.login_form');
    Route::post("/login", "Admin\Auth\LoginController@login")->name('auth.login');
    Route::post("/logout", "Admin\Auth\LoginController@logout")->name('auth.logout');
    Route::get("/register", "Admin\Auth\RegisterController@showRegistrationForm")->name('auth.register_form');
    Route::post("/register", "Admin\Auth\RegisterController@register")->name('auth.register');
    Route::get("/home", "Admin\HomeController@index")->name('admin.home');
    Route::resource('/advisers', 'Admin\AdvisersController');
    Route::resource('/users', 'Admin\UsersController')->only(['index', 'show', 'destroy']);
});

Route::prefix('adviser')->name('adviser.')->group(function () {
    Route::get("/login", "Adviser\Auth\LoginController@showLoginForm")->name('auth.login_form');
    Route::post("/login", "Adviser\Auth\LoginController@login")->name('auth.login');
    Route::post("/logout", "Adviser\Auth\LoginController@logout")->name('auth.logout');
    Route::get("/register", "Adviser\Auth\RegisterController@showRegistrationForm")->name('auth.register_form');
    Route::post("/register", "Adviser\Auth\RegisterController@register")->name('auth.register');
    Route::get("/home", "Adviser\HomeController@index")->name('adviser.home');
});
