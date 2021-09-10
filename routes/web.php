<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('auth.login');
// });


Auth::routes();
Route::group(
    ['middleware' => ['auth', 'ceklevel:0']],
    function () {
        Route::get('/', 'AdminController@index')->name('home');

        //hapus user
        Route::get('/delete/{id}', 'AdminController@deleteUser')->name('hapusUser');
        Route::get('/resetpassword/{id}', 'AdminController@resetPwd')->name('resetPwd');

        //jasa
        Route::get('/jasarental', 'AdminController@getJasaRental')->name('jasa');
        Route::get('/editjasa/{id}', 'AdminController@editJasa')->name('editJasa');
        Route::post('/updatejasa/{id}', 'AdminController@updateJasaRental')->name('updateJasa');
        Route::get('/rubahstatus/{id}/{status}', 'AdminController@changeStatus')->name('status');

        //customer
        Route::get('/customer', 'AdminController@getCustomer')->name('customer');
    }
);
