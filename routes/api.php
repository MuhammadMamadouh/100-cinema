<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/movies', 'Api\MoviesController');
Route::group(['prefix' => 'movie'], function () {
    Route::get('{id}', 'Api\MoviesController@show');
    Route::get('{id}/crew', 'Api\MoviesController@crew');
    Route::get('category/{name}', 'Api\MoviesController@viewMoviesByCategory');
    Route::post('addReview', 'Api\MoviesController@addReview')->name('addReview');
    Route::get('{id}/reviews', 'Api\MoviesController@reviews')->name('reviews');
    Route::get('{atrr}/{value}', 'Api\MoviesController@getMovies');
});
