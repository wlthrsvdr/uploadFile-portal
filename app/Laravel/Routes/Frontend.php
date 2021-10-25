<?php

Route::group([
	'as' => "frontend.",
	'namespace' => "Frontend",
	'middleware' => ["web"],
], function () {

	Route::get('/', ['as' => "index", 'uses' => "MainController@index"]);

	Route::group(['as' => "portal.", 'prefix' => "portal"], function () {
		Route::get('/', ['as' => "index", 'uses' => "FileUploadController@index"]);

		Route::get('create', ['as' => "create", 'uses' => "FileUploadController@create"]);
		Route::post('create', ['uses' => "FileUploadController@store"]);

		Route::get('edit/{id?}', ['as' => "edit", 'uses' => "FileUploadController@edit"]);
		Route::post('edit/{id?}', ['uses' => "FileUploadController@update"]);

		Route::any('delete/{id?}', ['as' => "destroy", 'uses' => "FileUploadController@destroy"]);
	});
});
