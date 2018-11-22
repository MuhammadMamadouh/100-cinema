<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movies;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = Post::find(2);
        $user = User::find($post->user_id);
        $posts = Post::all();

        $movies = DB::table('movies')->orderBy('created_at')->limit(3)->get();

//        $api_key = config('youtube.API_Key');
//        $json_url2 = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&q=%D8%A7%D9%84%D8%B3%D9%8A%D9%86%D9%85%D8%A7%2C+cinema%2Cfilmmaking%2Cfilm+analysis&key=$api_key";
//        $listFromYouTube = json_decode(file_get_contents($json_url2));
//
//        $key = array_rand($listFromYouTube->items, 1);
//
//        $video = $listFromYouTube->items[$key];


        return view('home', compact('movies', 'video', 'post', 'user', 'posts'));
    }

    public function search()
    {
        $query = \request('query');
        $cast = Cast::where('name', 'like', '%' . $query . '%')->select('id', 'name', 'image')->get();
        $movies = Movies::where('title', 'like', '%' . $query . '%')->select('id', 'title', 'poster')->get();
        $users = User::where('name', 'like', '%' . $query . '%')->select('id', 'name', 'image')->get();
//        $results = $movies->merge($cast)->merge($users);

        return view('search', compact('cast', 'movies', 'users'));


    }

}
