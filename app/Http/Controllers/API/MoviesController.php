<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Resources\Movies\MoviesCollection;
use App\Http\Resources\Movies\MoviesResource;
use App\Models\Category;
use App\Models\Movies;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MoviesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return MoviesCollection
     */
    public function index()
    {
        return new MoviesCollection(Movies::paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movies::find($id);
        return new MoviesResource($movie);
        $reviews = $movie->reviews()->orderBy('created_at', 'desc')->simplePaginate(5);
//        if (\request()->ajax()) {
//            return $this->reviews($id);
//        }
        $actors = $movie->actors(3);
        $directors = $movie->directors();
        $movieCategories = $movie->categories;
        $categories = Category::all();
        $avgRating = floor($movie->averageRate());
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

        $review = \request()->review;
        $rate = \request()->rate;
//        $order = array("\n", "\n\r");
//        $new_review = str_replace($order, " <br /> ", $review);

        if ($rate > 5) {
            return response(['errors' => 'rate must be not greater than 5']);
        }
        if (empty($review)) {
            return response(['errors' => 'you can\'t add an empty review']);
        } else {
            $review = Review::create([
                'user_id' => Auth::user()->id,
                'movies_id' => $movie,
                'review' => $review,
                'rate' => $rate,
            ]);
            $new_review = $this->newReview($review);
            return response(['review' => $new_review]);
        }
    }

    /**
     * new Added Review in HTML FORM
     * @param Review $review
     * @return string
     */

    /**
     * Get reviews of a work
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reviews($id)
    {
        return Movies::find($id)->reviews()->orderBy('created_at', 'desc')->simplePaginate(5);

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
        $crew = Movies::find($id)->getCrewJob();
        return view('front.movies.crew', compact('crew'));
    }

    public function getMovies($attr, $value)
    {
        $movies = Movies::getMovieWhich($attr, $value);
        return view('front.movies.attr', compact('movies'));
    }
}
