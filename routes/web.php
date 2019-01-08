<?php


\Config::set('auth.defaults.guard', 'web');
Route::get('test', function () {
    return view('test4');
});
Auth::routes();
// Registration Routes...

Route::post('register', 'Blog\UserAuth@register');

// ==============================================
//               LOGIN LINKS
// ==============================================
// Facebook Login
Route::get('login/facebook', 'Auth\LoginController@facebookRedirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@facebookHandleProviderCallback');

// Google Login
Route::get('login/google', 'Auth\LoginController@googleRedirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@googleHandleProviderCallback');


Route::get('/test', function () {
    auth()->user()->notify(new \App\Notifications\Notify());
});

Route::get('readAllNotify', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
});


// ==============================================
//               HOME LINKS
// ==============================================
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');

Route::group(['namespace' => 'Blog'], function () {

//=======================================================================================

    // ==============================================
    //              MOVIES LINKS
    // ==============================================
    Route::group(['prefix' => 'movie'], function () {
        Route::get('{id}', 'MoviesController@show');
        Route::get('{id}/crew', 'MoviesController@crew');
        Route::get('category/{name}', 'MoviesController@viewMoviesByCategory');
        Route::post('addReview', 'MoviesController@addReview')->name('addReview');
        Route::get('{id}/reviews', 'MoviesController@reviews')->name('reviews');
        Route::get('{atrr}/{value}', 'MoviesController@getMovies');
    });

//=======================================================================================

    // ==============================================
    //               REVIEWS LINKS
    // ==============================================
    Route::resource('reviews', 'ReviewsController');
//=======================================================================================

    // ==============================================
    //               USER LINKS
    // ==============================================
    Route::group(['prefix' => 'user'], function () {
        Route::get('{id}', 'UserController@profile')->name('profile');
        Route::get('{id}/edit', 'UserController@edit')->name('editProfile');
        Route::post('{id}/update', 'UserController@update')->name('editProfile');
        Route::post('/follow', 'UserController@follow')->name('follow');
        Route::post('/deleteFollow', 'UserController@deleteFollow')->name('deleteFollow');
        Route::get('{id}/reviews', 'UserController@reviews')->name('userReviews');
        Route::get('{id}/posts', 'UserController@posts')->name('userPosts');
    });

    // ==============================================
    //               CREW LINKS
    // ==============================================
    Route::group(['prefix' => 'crew'], function () {
        Route::get('{id}', 'CastController@show');
        Route::get('job/{name}', 'CastController@viewCastsByJob');
        Route::get('{id}/media', 'CastController@media');
    });

    // ==============================================
    //               POSTS LINKS
    // ==============================================
    Route::resource('posts', 'PostsController');
    Route::get('most-liked-posts', 'PostsController@mostLiked')->name('mostLikedPosts');
    Route::group(['prefix' => 'posts'], function () {
        Route::post('{id}/addComment', 'CommentsController@store')->name('addComment');
        Route::get('{id}/comments', 'PostsController@comments')->name('comments');
        Route::get('{id}/likes', 'PostsController@likes');
        Route::post('{id}/saveLike', 'PostsController@saveLike');
    });

    // ==============================================
    //               COMMENTS LINKS
    // ==============================================
    Route::resource('comments', 'CommentsController');

    // ==============================================
    //               Notifications LINKS
    // ==============================================
    Route::get('notifications', function (){
        return view('notifications');
    });

    Route::get('event', function (){
       event(new \App\Events\PostLiked(auth()->user()));
       return 'event pushed';
    });
    Route::get('listen', function (){
       return view('welcome');
    });

});

