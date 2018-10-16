<?php

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {

    \Config::set('auth.defaults.guard', 'admin');
    Route::get('/login', 'AdminAuth@login');
    Route::post('/login', 'AdminAuth@adminLogin')->name('adminLogin');
    Route::group(['middleware' => 'admin:admin'], function () {

        Route::resource('admins', 'AdminController');
        Route::delete('admins/destroy/all', 'AdminController@multiDestroy');

        Route::resource('users', 'UserController');
        Route::delete('users/destroy/all', 'UserController@multiDestroy');

        Route::resource('movies', 'MoviesController');
        Route::delete('movies/destroy/all', 'MoviesController@multiDestroy');
        Route::post('movies/crew/add', 'MoviesController@addActors')->name('addCrew');
        Route::get('movies/{id}/add_crew', 'MoviesController@addCrew');

        Route::post('movies/category/add', 'MoviesController@addCategory')->name('addCategory');


//        ------------- Cast links ------------------------
        Route::resource('cast', 'CastController');
        Route::delete('cast/destroy/all', 'CastController@multiDestroy');
        Route::get('cast/{id}/add-images', 'CastController@addImages');
        Route::post('cast/store-images', 'CastController@storeImages')->name('addCastImage');

        Route::get('cast/{id}/add-jobs', 'CastController@addJobs');
        Route::get('cast/add-jobs', 'CastController@addJobs')->name('addCastJobs');


        Route::resource('jobs', 'JobController');
        Route::delete('jobs/destroy/all', 'JobController@multiDestroy');


        Route::get('/', function () {
            return view('admin.index');
        });
        Route::any('/logout', 'AdminAuth@logout');
    });


});