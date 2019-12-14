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

		Route::prefix('admin')->group(function () {

			Route::middleware('auth:admin')->group(function () {

				//Dashboard
				Route::get('/', 'DashboardController@index');

				//Products

				Route::resource('/products', 'ProductController');

				//Order
				Route::resource('/orders', 'OrderController');

				//Users
				Route::resource('/users', 'UsersCntroller');


				Route::get('/confirm/{id}', 'OrderController@confirm')->name('order.confirm');
				Route::get('/pending/{id}', 'OrderController@pending')->name('order.pending');

				Route::get('/logout','AdminUserController@logout');

			});


			Route::get('/login','AdminUserController@index');
			Route::post('/login','AdminUserController@store');

		});

///Front
///
	   Route::get('/','Front\HomeController@index');

		// USer Register

	   Route::get('/user/register','Front\RegitrationController@index');
	   Route::post('/user/register','Front\RegitrationController@store');

		//User Login

		Route::get('/user/login','Front\SessionsController@index');
		Route::post('/user/login','Front\SessionsController@store');

		//User Logout

		Route::get('/user/logout','Front\SessionsController@logout');

		//user Profile
		Route::get('/user/profile','Front\ProfileController@index');

		Route::get('/user/order/{id}','Front\ProfileController@show');

		//Cart route
        Route::get('/cart','Front\FrontController@index');
		Route::post('/cart','Front\FrontController@store')->name('cart');
		Route::delete('/cart/remove/{product}','Front\FrontController@destroy')->name('cart.destroy');
		Route::post('/cart/saveLater/{product}','Front\FrontController@saveLater')->name('cart.saveLater');

		//SaveForlaterController
		Route::delete('/savelater/remove/{product}','Front\SaveForlaterController@destroy')->name('saveLater.destroy');
		Route::post('/moveToCart/{product}','Front\SaveForlaterController@movetocart')->name('saveLater.moveToCart');



		Route::get('empty', function (){

			Cart::instance('default')->destroy();

		});

		//checkout

		Route::get('/checkout','Front\CheckoutController@index');
		Route::post('/checkout','Front\CheckoutController@store')->name('checkout');

