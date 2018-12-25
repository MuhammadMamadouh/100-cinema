<?php

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movies;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
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
        $reviews = $movie->reviews()->orderBy('created_at', 'desc')->simplePaginate(5);
        if (\request()->ajax()) {
            return $this->reviews($id);
        }
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
     * Get reviews of a work
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reviews($id)
    {
        $reviews = Movies::find($id)->reviews()->orderBy('created_at', 'desc')->simplePaginate(5);
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
        $crew = Movies::find($id)->getCrewJob();
        return view('front.movies.crew', compact('crew'));
    }

    public function getMovies($attr, $value)
    {
        $movies = Movies::getMovieWhich($attr, $value);
        return view('front.movies.attr', compact('movies'));
    }

    /**
     * new Added Review in HTML FORM
     * @param Review $review
     * @return string
     */
    protected function newReview(Review $review)
    {
        $div1 = " <article class=\"row\" id=\"comment\">
            <div class=\"col-md-2 col-sm-2 hidden-xs\">
                <figure class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"" . \Storage::url(auth()->user()->image) . "\">
                    <figcaption class=\"text-center\"><a
                                href=\"#\">" . auth()->user()->name . "</a>
                    </figcaption>
                </figure>
            </div>
            <div class=\"col-md-10 col-sm-10\">
                <div class=\"panel panel-default arrow left\">
                    <div class=\"panel-body\">
                    
                    <div class=\"col-md-10 col-sm-10\">
                <div class=\"panel panel -default arrow left\">
                    <div class=\"panel-body\">
                        <div class=\"review-block-rate col-sm-4 pull-right\">";
        $ratedStars = array();
        for ($i = 0; $i < $review->rate; $i++) {
            $ratedStars[0 + $i] = "<button type=\"button\" class=\"btn btn-warning btn-xs\" aria-label=\"Left Align\">
                                    <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                </button>";
        }
        for ($i = 0; $i < (5 - $review->rate); $i++) {
            $ratedStars[5 + $i] = "<button type = \"button\" class=\"btn btn-default btn-xs\" aria-label=\"Left Align\">
                                <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                            </button>";
        }
        $stars = implode(' ', $ratedStars);
        $div2 = "</div>
                 <header class=\"text-left\">
                    <div class=\"comment-user\"><i class=\"fa fa-user\"></i>
                        <a href=\"#\">" . auth()->user()->name . "</a>
                    </div>
                    <time class=\"comment-date\" datetime=\"16-12-2014 01:05\"><i
                                class=\"fa fa-clock-o\"></i>$review->created_at
                    </time>
                </header>
                <div class=\"comment-post\">
                    <div class=\"b-description_readmore js-description_readmore\">"
            . htmlspecialchars_decode($review->review) . "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>";


        return $div1 . $stars . $div2;
    }
}
