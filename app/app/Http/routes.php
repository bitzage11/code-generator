<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['routeMiddleware' => 'web'], function () {

	   // index page
	   Route::get('/', 'AuthController@index');
	   Route::get('login', 'AuthController@login');
	   Route::post('admin_login', 'AuthController@admin_login');

	   Route::post('search', 'AdminController@search');
	   Route::get('download', 'AdminController@download');

	   Route::get('logout', 'AuthController@authLogout');
	  
	// admin area
   Route::group(['middleware' => 'adminAuth'], function() {

         // user area
         Route::get('admin/dashboard', 'AdminController@dashboard');

         Route::post('code/generate', 'AdminController@generator');
         Route::get('code/excel', 'AdminController@excelsheet');

   }); //admin closed

});

