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
        if (\Auth::check()) {
            $user = new User();
            $posts = $user->followedPosts()->limit(3)->get();
        }
        $movies = DB::table('movies')->orderBy('created_at')->limit(3)->get();

        $videos = DB::table('videos')->inRandomOrder()->first();

        $channel_id = $videos->api_id;
        $api_key = config('youtube.API_Key');

        $json_url = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=$channel_id" .
            "&maxResults=10&order=date&type=video&id=$channel_id&key=$api_key";
        $json_url2 = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&q=%D8%A7%D9%84%D8%B3%D9%8A%D9%86%D9%85%D8%A7%2C+cinema%2Cfilmmaking%2Cfilm+analysis&key=$api_key";
        $listFromYouTube = json_decode(file_get_contents($json_url));

        $key = array_rand($listFromYouTube->items, 1);

        $videos = $listFromYouTube->items[$key];


        return view('home', compact('movies', 'videos', 'posts'));
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
