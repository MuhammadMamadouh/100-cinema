<?php

namespace App\Http\Resources\Movies;

use Illuminate\Http\Resources\Json\JsonResource;

class MoviesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'image' => $this->poster,
            'story' => $this->story,
            'href' => [
                'reviews'=> url("api/movie/$this->id/reviews")
            ]
        ];
    }
}
