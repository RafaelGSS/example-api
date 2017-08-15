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

Route::group(['prefix' => 'v1'], function()
{
	Route::get('/', function() {
		return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);
	});

	// Jobs routes 

	Route::get('/jobs', 'JobsController@index')->name('jobs.index');
	Route::get('/jobs/create', 'JobsController@create')->name('jobs.create');
	Route::post('/jobs', 'JobsController@store')->name('jobs.store');
	Route::get('/jobs/{id}', 'JobsController@show')->name('jobs.show');
	Route::get('/jobs/{id}/edit', 'JobsController@edit')->name('jobs.edit');
	Route::put('/jobs/{id}', 'JobsController@update')->name('jobs.update');
	Route::delete('/jobs/{id}', 'JobsController@destroy')->name('jobs.destroy');

	Route::resource('companies', 'CompaniesController');



});
	// If the user makes a request GET at the root of the application

Route::get('/', function () {
	return redirect('v1');
});