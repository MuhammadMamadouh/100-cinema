<?php

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movies;
use App\Models\Review;
use Illuminate\Support\Facades\DB;


class MoviesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $movie = Movies::find($id);
        $actors = $movie->actors(3);
        $directors = $movie->directors();
        $movieCategories = $movie->categories;
        $categories = Category::all();
        $avgRating = $movie->averageRate();
        $reviews = $movie->reviews()->simplePaginate(5);
        return view('front.movies.view', compact(
            'movie', 'actors', 'directors', 'categories', 'movieCategories', 'avgRating', 'reviews'
        ));
    }

    /**
     * Add review to a specified work.
     *
     * @return \Illuminate\Http\Response
     */
    public function addReview()
    {
        try {

        } catch (\Exception $exception) {

        }
        $movie = \request()->movie;
        $user = \request()->user;
        $review = \request()->review;
        $rate = \request()->rate;
        $order = array("\n", "\n\r");
        $new_review = str_replace($order, " <br /> ", $review);

        if ($rate > 5) {
            return response(['errors' => 'rate must be not greater than 5']);
        }
        if (empty($review)) {
            return response(['errors' => 'you can\'t add an empty review']);
        } else {
            Review::create([
                'users_id' => $user,
                'movies_id' => $movie,
                'review' => $new_review,
                'rate' => $rate,
            ]);
            return response(['success' => 'review is added successfully']);
        }

//        return response($nreview);
    }


    /**
     * Get reviews of a work
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reviews($id)
    {
        $reviews = Movies::find($id)->reviews();
        return view('front.movies.reviews', compact('reviews'));
    }


    /**
     * add Categories to a movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCategory()
    {
        $movie_id = \request()->movie_id;
        $categories = \request()->categotries;
        DB::table('movies_category')->where('movies_id', $movie_id)->delete();
        foreach ($categories as $category) {
            DB::table('movies_category')->insert([
                'movies_id' => $movie_id,
                'category_id' => $category,
            ]);
        }
        return back();
    }

    /**
     * Category of movies
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewMoviesByCategory($name)
    {
        $category = Category::where('name', $name)->first();
        $movies = Category::find($category->id)->movies;

//        $movies = Category::where('name', $name)->movies();
        return view('front.movies.category', compact('movies', 'category'));
    }

    /**
     * Category of movies
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function crew($id)
    {
        $actors = Movies::find($id)->actors();
        return view('front.movies.crew', compact('actors'));
    }

}
