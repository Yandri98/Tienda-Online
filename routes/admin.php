<?php 

Route::prefix('/admin')->group(function(){
	Route::get('/', 'Admin\DashboardController@getDashboard');
	Route::get('/users','Admin\UserController@getUsers');

	//Modulo Productos
	Route::get('/products','Admin\ProductController@getHome');
	Route::get('/product/add','Admin\ProductController@getProductAdd');
});	
	

 