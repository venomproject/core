<?php




Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
 
Route::post('apply/upload/{id}', 'FileController@upload');


	

	

Route::get('{id}/{seo}', 'SiteController@show')->where('id', '[0-9]+');
Route::get('/', 'SiteController@index');
	
	
	
		Route::group(['middleware' => ['web','auth'], 'prefix' => '/admin', 'namespace' => 'Admin'], function () {
	
			
			Route::get('/', function () {
				return View::make('admin.dashboard');
			});
			
			Route::resource('/pages', 'PagesController');
			
			Route::post('/seo_generator', 'PagesController@seo_generator');

		});
		
		