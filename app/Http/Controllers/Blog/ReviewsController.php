<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        return response()->json(['review' => $review]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store()
    {
        $movie = \request()->movie;
        $review = \request()->review;
        $rate = \request()->rate;
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
            $new_review = $this->addedReview($review);
            return response()->json(['comment' => $new_review]);
        }
    }

    /**
     * new Added Review in HTML FORM
     * @param Review $Review
     * @return string
     * @throws \Throwable
     */
    protected function addedReview(Review $review)
    {
        return view('front.movies.review', compact('review'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = $this->validate(request(), [
            'review' => 'required|string',
            'rate' => 'nullable'

        ]);
        Review::where('id', $id)->update($data);

        return response([
            'review' => $data['review']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::find($id)->delete();

        return response(['success' => 'deleted successfully']);
    }


}
