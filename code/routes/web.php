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

Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerController@index');


Auth::routes();


Route::group(['middleware' => 'auth'], function() {

	Route::get('/', 'HomeController@index')->name('home');

	//School
    Route::get('/schools','SchoolController@index')->name('schools.index');
    Route::get('/schools/create','SchoolController@create')->name('schools.create');
    Route::post('/schools/create','SchoolController@store')->name('schools.store');

    Route::get('/schools/{hash}','SchoolController@edit')->name('schools.edit');
    Route::put('/schools/{hash}','SchoolController@update')->name('schools.update');

    Route::delete('/schools', 'SchoolController@destroy')->name('schools.destroy');




});



Route::get('/test', function(){
	
	// $data = App\Models\School::with('OfferedCourses')
	// 						->find(1)->OfferedCourses;

	//$data->attach()
	$data = App\Models\School::find(1)->Courses();

	// foreach($data as $item)
	// {
	// 	echo $item->code;
	// }

	return $data;

	return json_encode($data);
});