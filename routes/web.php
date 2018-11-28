<?php


\Config::set('auth.defaults.guard', 'web');
Route::get('test', function () {
    return view('test4');
});

\Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'HomeController@search')->name('search');
Route::group(['namespace' => 'Blog'], function () {


    Route::group(['prefix' => 'movie'], function () {
        Route::get('{id}', 'MoviesController@show');
        Route::get('{id}/crew', 'MoviesController@crew');
        Route::get('category/{name}', 'MoviesController@viewMoviesByCategory');
        Route::post('addReview', 'MoviesController@addReview')->name('addReview');
        Route::get('{id}/reviews', 'MoviesController@reviews')->name('reviews');

    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('{id}', 'UserController@profile')->name('profile');
        Route::get('{id}/edit', 'UserController@edit')->name('editProfile');
        Route::post('{id}/update', 'UserController@update')->name('editProfile');
        Route::post('/follow', 'UserController@follow')->name('follow');
        Route::post('/deleteFollow', 'UserController@deleteFollow')->name('deleteFollow');
        Route::get('{id}/reviews', 'UserController@reviews')->name('userReviews');
        Route::get('{id}/posts', 'UserController@posts')->name('userPosts');
    });
    Route::group(['prefix' => 'crew'], function () {
        Route::get('{id}', 'CastController@show');
        Route::get('job/{name}', 'CastController@viewCastsByJob');
    });

    Route::resource('posts', 'PostsController');

    Route::group(['prefix' => 'posts'], function () {
        Route::post('{id}/addComment', 'CommentsController@store')->name('addComment');
        Route::get('{id}/comments', 'PostsController@comments')->name('comments');
    });
});
