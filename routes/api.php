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
//    Route::apiResource('{id}', 'Api\MoviesController@show');
//    Route::apiResource('{id}/crew', 'Api\MoviesController@crew');
//    Route::apiResource('category/{name}', 'Api\MoviesController@viewMoviesByCategory');
//    Route::post('addReview', 'Api\MoviesController@addReview')->name('addReview');
    Route::apiResource('/{movie}/reviews', 'Api\ReviewsController');
//    Route::apiResource('{atrr}/{value}', 'Api\MoviesController@getMovies');
});
//Route::apiResource('/reviews', 'Api\ReviewsController');