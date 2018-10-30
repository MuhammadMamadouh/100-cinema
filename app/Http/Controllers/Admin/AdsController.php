<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\AdsDatatable;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param AdsDatatable $ads
     * @return \Illuminate\Http\Response
     */
    public function index(AdsDatatable $ads)
    {

        $pages = $this->frontRoutes();

        return $ads->render('admin.ads.index', compact('pages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'link' => 'required|url',
            'start_at' => 'required|date|',
            'end_at' => 'required|date|',
            'page' => 'required',
            'status' => 'required',
            'image' => v_image(),
        ]);
        if (!empty($data['image'])) {
            $data['image'] = $request->file('image')->storeAs('ads/' . $data['name'], $data['name'] . time());
        }

        $data['start_at'] = strtotime($data['start_at']);
        $data['end_at'] = strtotime($data['end_at']);
        Ads::create($data);

        return redirect(aurl('ads'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

//        return view('layouts.sidebar', compact('ads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ads::find($id);
        $pages = $this->frontRoutes();
        return view('admin.ads.edit', compact('ad', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'link' => 'required|url',
            'start_at' => 'required|date|',
            'end_at' => 'required|date|',
            'page' => 'required',
            'status' => 'required',
            'image' => v_image(),
        ]);
        if (!empty($data['image'])) {
            $data['image'] = $request->file('image')->storeAs('ads/' . $data['name'], $data['name'] . time());
        }

        $data['start_at'] = strtotime($data['start_at']);
        $data['end_at'] = strtotime($data['end_at']);

        Ads::where('id', $id)->update($data);
        return redirect(aurl('ads'))->with('success', 'added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Ads::find($id);
        Storage::deleteDirectory('ads/' . $movie->title);
        $movie->delete();
        session()->flash('success', trans('admin.deleted_record'));
        session()->flash('');
        return redirect(aurl('ads'));
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
            Ads::destroy(\request('item'));
        } else {
            Ads::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('admins'));
    }


    /**
     * Get All Front Routes
     *
     * @return array
     */
    private function frontRoutes()
    {
        $collection = app()->routes->getRoutes();

        $pages = [];
        foreach ($collection as $route) {

            if (strpos($route->uri(), 'admin') !== 0) {
                $pages [] = $route->uri();
            }
        }
        return $pages;
    }

}
