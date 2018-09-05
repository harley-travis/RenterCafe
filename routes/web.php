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

Route::get('/', function () {
    return view('dashboard.dashboard');
});

Route::get('dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard.dashboard');
Auth::routes();

Route::group(['prefix' => 'property'], function() {
	$c = 'PropertyController';

	Route::get('', [
		'uses'	=> "$c@getProperties",
		'as'	=> 'property.overview'
	]);
    
    Route::get('add', [
		'uses'	=> "$c@addApplicant",
		'as'	=> 'property.create'
	]);

	Route::get('edit/{id}', [
		'uses'	=> "$c@editApplicant",
		'as'	=> 'property.edit'
	]);

	Route::get('delete', [
		'uses'	=> "$c@deleteApplicant",
		'as'	=> 'property.delete'
	]);

});

Route::group(['prefix' => 'maintenance'], function() {
	$c = 'MaintenanceController';

});

Route::group(['prefix' => 'repairs'], function() {
	$c = 'RepairController';

});

Route::group(['prefix' => 'reports'], function() {
	$c = 'ReportController';

});

Route::group(['prefix' => 'feedback'], function() {
	$c = 'FeedbackController';

});

Route::get('/home', 'HomeController@index')->name('home');

