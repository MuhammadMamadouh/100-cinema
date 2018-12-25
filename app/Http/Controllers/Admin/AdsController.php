<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdsDatatable;
use App\Http\Controllers\Controller;
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

    public function edit($id)
    {
        $ad = Ads::find($id);
        $pages = $this->frontRoutes();
        return view('admin.ads.edit', compact('ad', 'pages'));
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
        Ads::create($data);
        return response(['success' => 'ad has been added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ads::find($id);
        $time = time() - strtotime($ad->start_at);
        $oldAds = Ads::where('end_at', '>', time())->get();
        return $oldAds;
//        return view('layouts.sidebar', compact('ads'));
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
        $ad = Ads::find($id);
        if ($ad) {
            Storage::deleteDirectory('ads/' . $ad->name);
            $ad->delete();
            return response(['success' => 'ad has been deleted successfully']);

        } else {
            return response(['errors' => 'something error']);
        }
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
     * Get All Front End Routes URI
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
