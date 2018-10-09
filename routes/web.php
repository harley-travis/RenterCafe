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
	
	if( auth()->check() == null ) {
		return redirect('/login');
	} else {
		return view('dashboard.dashboard');
	}
    
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
		'uses'	=> "$c@createProperty",
		'as'	=> 'property.create'
	]);
	
    Route::post('add', [
		'uses'	=> "$c@addProperty",
		'as'	=> 'property.add'
	]);

	Route::get('edit/{id}', [
		'uses'	=> "$c@getPropertyId",
		'as'	=> 'property.edit'
	]);

	Route::post('edit', [
		'uses'	=> "$c@updateProperty",
		'as'	=> 'property.update'
	]);

	Route::get('delete/{id}', [
		'uses'	=> "$c@deleteProperty",
		'as'	=> 'property.delete'
	]);

});

Route::group(['prefix' => 'tenants'], function() {
	$c = 'TenantController';

	Route::get('', [
		'uses'	=> "$c@getTenants",
		'as'	=> 'tenants.overview'
	]);

	Route::get('add', [
		'uses'	=> "$c@createTenant",
		'as'	=> 'tenants.create'
	]);
	
    Route::post('add', [
		'uses'	=> "$c@addTenant",
		'as'	=> 'tenants.add'
	]);

	Route::get('edit/{id}', [
		'uses'	=> "$c@getTenantId",
		'as'	=> 'tenants.edit'
	]);

	Route::post('edit', [
		'uses'	=> "$c@updateTenant",
		'as'	=> 'tenants.update'
	]);

	Route::get('delete/{id}', [
		'uses'	=> "$c@deleteTenant",
		'as'	=> 'tenants.delete'
	]);

});

Route::group(['prefix' => 'maintenance'], function() {
	$c = 'MaintenanceController';

	Route::get('', [
		'uses'	=> "$c@getRequests",
		'as'	=> 'maintenance.overview'
	]);

	Route::get('add', [
		'uses'	=> "$c@createRequest",
		'as'	=> 'maintenance.create'
	]);
	
    Route::post('add', [
		'uses'	=> "$c@addRequest",
		'as'	=> 'maintenance.add'
	]);

	Route::get('view/{id}', [
		'uses'	=> "$c@getRequestId",
		'as'	=> 'maintenance.edit'
	]);

	Route::post('view', [
		'uses'	=> "$c@updateRequest",
		'as'	=> 'maintenance.update'
	]);


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

Auth::routes();

//Route::get('/dashboard', 'HomeController@index')->name('dashboard.dashboard');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');