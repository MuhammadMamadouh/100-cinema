<?php


//=================================================
//================== Admin Links ==================
//=================================================

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

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


        Route::resource('cast', 'CastController');
//        ------------- Cast links ------------------------
        Route::group(['prefix' => 'cast'], function () {
            Route::delete('destroy/all', 'CastController@multiDestroy');
            Route::post('store-media', 'CastController@storeMedia')->name('addCastMedia');
            Route::post('destroy-media', 'CastController@destroyMedia')->name('destroyCastMedia');

            Route::get('{id}/media', 'CastController@media');
            Route::get('{id}/add-jobs', 'CastController@addJobs');
            Route::get('add-jobs', 'CastController@addJobs')->name('addCastJobs');

        });

//        ------------- Ads links ------------------------
        Route::resource('ads', 'AdsController');
        Route::delete('ads/destroy/all', 'AdsController@multiDestroy');

//        ------------- Jobs links ------------------------
        Route::resource('jobs', 'JobController');
        Route::delete('jobs/destroy/all', 'JobController@multiDestroy');

//        ------------- Videos links ------------------------
        Route::resource('videos', 'VideosController');
        Route::delete('videos/destroy/all', 'VideosController@multiDestroy');

//        ------------- Posts links ------------------------
        Route::resource('posts', 'PostsController');
        Route::delete('posts/destroy/all', 'PostsController@multiDestroy');

//        ------------- Roles links ------------------------
        Route::resource('roles', 'RolesController');
        Route::delete('roles/destroy/all', 'RolesController@multiDestroy');


//        ------------- Permissions links ------------------------
        Route::resource('permissions', 'PermissionsController');
        Route::delete('permissions/destroy/all', 'PermissionsController@multiDestroy');


        Route::get('/', 'AdminController@home');

        Route::any('/logout', 'AdminAuth@logout');
    });
});
