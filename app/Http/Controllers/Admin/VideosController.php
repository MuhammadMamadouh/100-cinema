<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\VideosDatatable;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @param ChannelDatatable $videos
     * @return \Illuminate\Http\Response
     */
    public function index(VideosDatatable $videos)
    {
        $types = $this->getPossibleStatuses();
        return $videos->render('admin.videos.index', compact('types'));
    }

    /**
     * Get Enum values from type field in videos table
     *
     * @return array
     */
    protected function getPossibleStatuses()
    {
        $enum = DB::select(DB::raw('SHOW COLUMNS FROM videos WHERE Field = "type"'))[0]->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $enum, $matches);

        $types = array();

        foreach (explode(',', $matches[1]) as $value) {
            $types[] = trim($value, "'");
        }
        return $types;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'link' => 'required|url',
            'api_id' => 'required',
            'type' => 'required'

        ]);
        Video::create($data);

        return redirect(aurl('videos'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {

        $cliend_id = '87b4269f122b4ec9a1b23ec497b9f9ee';
        $accessToken = '1697392227.87b4269.48007fb74a4947eab45d5019343cf5b8';

        $videos = DB::table('videos')
            ->inRandomOrder()
            ->first();

        $channel_id = $videos->api_id;
        $api_key = config('youtube.API_Key');

        $json_url = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=$channel_id" .
            "&maxResults=10&order=date&type=video&id=$channel_id&key=$api_key";
        $json_url2 = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&q=%D8%A7%D9%84%D8%B3%D9%8A%D9%86%D9%85%D8%A7%2C+cinema%2Cfilmmaking%2Cfilm+analysis&key=$api_key";
        $listFromYouTube = json_decode(file_get_contents($json_url2));

        $key = array_rand($listFromYouTube->items, 1);

        $videos = $listFromYouTube->items[$key];
        return view('test4', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'link' => 'required|url',
            'channel_id' => 'required',
        ]);

        Video::where('id', $id)->update($data);
        return redirect(aurl('videos'))->with('success', 'added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = Video::find($id);
        $channel->delete();
        session()->flash('success', trans('admin.deleted_record'));
        session()->flash('');
        return redirect(aurl('videos'));
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy()
    {
        if (is_array(request('item'))) {
            Video::destroy(\request('item'));
        } else {
            Video::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('admins'));
    }
}
