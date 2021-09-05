<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// route auth
Route::post('/regis', 'Api\Auth\AuthController@register'); //regis
Route::post('/login', 'Api\Auth\AuthController@login'); //login

// route jasa
//jasa product
Route::get('/jasa/product/{id}', 'Api\JasaRental\AdminRentalController@getProduct'); //get product
Route::post('/jasa/addproduct', 'Api\JasaRental\AdminRentalController@addProduct'); //add product
Route::post('/jasa/updateproduct', 'Api\JasaRental\AdminRentalController@updateProduct'); //update Product
Route::post('/jasa/deleteproduct/{product_id}', 'Api\JasaRental\AdminRentalController@deleteProduct'); //deleteProduct
Route::get('/jasa/order/{id}', 'Api\JasaRental\AdminRentalController@orderByJasa');
Route::post('/jasa/order/changestatus/{id}/{key}', 'Api\JasaRental\AdminRentalController@changeStatus');

//route users
Route::get('/users/getalljasa', 'Api\User\UserController@getAllJasa'); //user get all jasa
Route::get('/users/getproductjasa/{id}', 'Api\User\UserController@getProductJasa'); //user getproduct jasa
Route::post('/users/order', 'Api\User\UserController@userOrder'); //user order
Route::get('/users/getmyorder/{id}', 'Api\User\UserController@getMyOrder'); //user getorder
//user update profile
Route::post('/users/updateprofile', 'Api\User\UserController@updateProfile'); //user update profile
