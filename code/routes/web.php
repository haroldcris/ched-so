<?php 

Route::any('/adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');
Route::any('/myadminer', '\Aranyasen\LaravelAdminer\AdminerController@index');

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/account','ProfileController@index')->name('profile.index');
Route::get('/change-password','ProfileController@change')->name('profile.changepw');
Route::post('/change-password','ProfileController@store')->name('profile.store');

Route::put('/account/update', 'ProfileController@update')->name('profile.update');




Route::group(['middleware' => 'isAdmin'], function () {

    /*************************
	|	ROUTES FOR ADMIN ROLE 
     **************************/    

    // Users     
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/create', 'UserController@create')->name('user.create');
    Route::post('/users/create', 'UserController@store')->name('user.store');

    Route::get('/users/{hash}', 'UserController@edit')->name('user.edit');
    Route::put('/users/{hash}', 'UserController@update')->name('user.update');

    Route::delete('/users', 'UserController@destroy')->name('user.destroy');
    Route::post('/users/search', 'UserController@search')->name('user.search');




    // School
    Route::get('/schools', 'SchoolController@index')->name('school.index');
    Route::get('/schools/create', 'SchoolController@create')->name('school.create');
    Route::post('/schools/create', 'SchoolController@store')->name('school.store');

    Route::get('/schools/{hash}', 'SchoolController@edit')->name('school.edit');
    Route::put('/schools/{hash}', 'SchoolController@update')->name('school.update');

    Route::delete('/schools', 'SchoolController@destroy')->name('school.destroy');
    Route::post('/schools/search', 'SchoolController@search')->name('school.search');



    //courses 
    Route::get('/courses','CourseController@index')->name('course.index');
    Route::get('/courses/create','CourseController@create')->name('course.create');
    Route::post('/courses/create','CourseController@store')->name('course.store');

    Route::get('/courses/{hash}', 'CourseController@edit')->name('course.edit');
    Route::put('/courses/{hash}', 'CourseController@update')->name('course.update');
    Route::delete('/courses', 'CourseController@destroy')->name('course.destroy');

    Route::post('/courses/search', 'CourseController@search')->name('course.search');

    //offered courses
    Route::get('/offered-courses','OfferedCourseController@index')->name('offeredcourse.index');
    Route::get('/offered-courses/create','OfferedCourseController@create')->name('offeredcourse.create');
    Route::post('/offered-courses/create','OfferedCourseController@store')->name('offeredcourse.store');

    Route::get('/offered-courses/{hash}', 'OfferedCourseController@edit')->name('offeredcourse.edit');
    Route::put('/offered-courses/{hash}', 'OfferedCourseController@update')->name('offeredcourse.update');
    Route::delete('/offered-courses', 'OfferedCourseController@destroy')->name('offeredcourse.destroy');

    //soapplication
    Route::get('/filed-so-application','AdminSOController@index')->name('adminso.index');    
    Route::post('/filed-so-application','AdminSOController@submit')->name('adminso.submit');

    Route::get('/received-so-application','AdminReceivedSoController@index')->name('adminreceivedso.index');    
    Route::get('/archive-so-application','AdminSOController@index')->name('adminso.archived');

});





Route::group(['middleware' => 'isHei'], function () {
   
     /*************************
    |   ROUTES FOR HEI  ROLE 
     **************************/    

    //so (hei application form) 
    Route::get('/special-order','HeiSOController@index')->name('heiso.index');
    Route::get('/special-order/create','HeiSOController@create')->name('heiso.create');
    Route::post('/special-order/create','HeiSOController@store')->name('heiso.store');

    Route::get('/special-order/{hash}','HeiSOController@edit')->name('heiso.edit');
    Route::put('/special-order/{hash}','HeiSOController@update')->name('heiso.update');

    Route::delete('/special-order','HeiSOController@destroy')->name('heiso.destroy');
    Route::post('/special-order/submit','HeiSOController@submit')->name('heiso.submit');

    Route::get('/hei-filed-special-order','HeiFiledSoController@index')->name('heifiledso.index');
    Route::get('/released-special-order','HeiReleasedSoController@index')->name('heireleasedso.index');

    //applications display
    //Route::get('/special-order/list','ApprovedAppController@index')->name('approvedapp.index');
    //pending application
    

    //deficients application
    Route::get('/deficients','DeficientController@index')->name('deficientapp.index');

  

});





Route::group(['middleware' => 'isSupervisor'], function () {
   
     /*************************
    |   ROUTES FOR Supervisor ROLE 
     **************************/    
     // supervisor (validate)
    Route::get('/validate','DocsValidationController@index')->name('docsvalidation.index');
    //archived application
    Route::get('/archived','ArchivedController@index')->name('archived.index');
  


    Route::get('/filed-special-order','SupervisorFiledSoController@index')->name('supervisorfiledso.index');
    Route::post('/filed-special-order','SupervisorFiledSoController@submit')->name('supervisorfiledso.submit');
    Route::get('/validated-so-application','SupervisorValidatedSoController@index')->name('supervisorvalidatedso.index');    
    //Route::get('/released-special-order','SupervisorReleasedSoController@index')->name('heireleasedso.index');

});




Route::get('/test', 'HomeController@test');