<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/




Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
 
Route::post('apply/upload/{id}', 'FileController@upload');

	

	Route::get('/', function () {
		return View::make('home');
	});
		
	
		Route::group(['middleware' => ['web','auth'], 'prefix' => '/admin', 'namespace' => 'Admin'], function () {
	
	//echo 'tylko zalogowani';
			
			Route::get('/', function () {
				
				return View::make('admin.dashboard');
			});
			
			Route::resource('/pages', 'PagesController');

		});