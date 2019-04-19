<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movies;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = [];
        if (\Auth::check()) {
            $user = new User();
            $posts = $user->followedPosts();
        }
        $mostCommented = Post::withCount('comments')->first();
        $posts = Post::inRandomOrder()->limit(3)->get();
        $movies = DB::table('movies')->orderBy('created_at', 'desc')->limit(7)->get();

        $videos = DB::table('videos')->inRandomOrder()->get();
        foreach ($videos as $video) {
            $channel_ids[] = $video->api_id;
        }

        $api_key = config('youtube.API_Key');

        $json_url2 = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&q=%D8%A7%D9%84%D8%B3%D9%8A%D9%86%D9%85%D8%A7%2C+cinema%2Cfilmmaking%2Cfilm+analysis&key=$api_key";

        $youtubeVideo = $this->getVideo($json_url2);
        $channelVideo = $this->getChannelVideos($channel_ids);
        return view('home', compact('movies', 'youtubeVideo', 'posts', 'mostCommented', 'channelVideo'));
    }

    /**
     * Search about user, movie or crew
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $query = \request('query');
        $cast = Cast::where('name', 'like', "%$query%")->select('id', 'name', 'image')->limit(3)->get();
        $movies = Movies::where('title', 'like', "%$query%")->select('id', 'title', 'poster')->limit(3)->get();
        $users = User::where('name', 'like', "%$query%")->select('id', 'name', 'image')->limit(3)->get();
        return view('search', compact('cast', 'movies', 'users'));
    }


    /**
     * Get random Video from json url
     *
     * @param $string
     * @return mixed
     */
    protected function getVideo(string $string)
    {
        $listFromYouTube = json_decode(file_get_contents($string));

        $keys = array_rand($listFromYouTube->items, 4);

        foreach ($keys as $key)
            $video[] = $listFromYouTube->items[$key];

        return $video;
    }

    /**
     * Get random Video from json url
     *
     * @param $string
     * @return mixed
     */
    protected function getChannelVideos(array $channel_ids)
    {
        $api_key = config('youtube.API_Key');
        if (is_array($channel_ids)) {
            foreach ($channel_ids as $channel_id) {
                $json_url[] = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=$channel_id" .
                    "&maxResults=4&order=date&type=video&id=$channel_id&key=$api_key";

            }
        }

        foreach ($json_url as $url) {
            $listFromYouTube[] = json_decode(file_get_contents($url));
        }

        $channels = array_rand($listFromYouTube, 2);
        foreach ($channels as $channel)
            $keys = $listFromYouTube[$channel];

        //            $keys = array_rand($channel->items, 4);

        return $keys->items;
    }

    protected function GetYoutubeVideosByKeyWords(... $keywords)
    {
//        $keywords = func_get_args();

    }

    public function notifications()
    {

    }

}
