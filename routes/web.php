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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('dashboard', 'DashboardController');

    Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');

    Route::resource('requestpage','RequestPageController'); //tambahkan baris ini
    Route::get('/requestpage/deletos/{id}', 'RequestPageController@deletos')->name('requestpage.deletos');

    Route::get('pending/requestpage', 'RequestPageController@pending')->name('requestpage.pending');
    Route::get('/requestpage/{id}/approve', 'RequestPageController@approval')->name('requestpage.approve');
    Route::get('/requestpage/{id}/decline', 'RequestPageController@declination')->name('requestpage.decline');
});

Route::group(['as'=>'member.','prefix'=>'member','namespace'=>'Member','middleware'=>['auth','member']], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('dashboard', 'DashboardController');

    Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');


    Route::resource('requestpage','RequestPageController'); //tambahkan baris ini
    Route::get('/requestpage/deletos/{id}', 'RequestPageController@deletos')->name('requestpage.deletos');

    Route::get('pending/requestpage', 'RequestPageController@pending')->name('requestpage.pending');
});

