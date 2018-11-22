<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDataTable $post)
    {
        return $post->render('admin.posts.index', ['title' => '']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'users_id' => 'required',
            'title' => 'required|string',
            'details' => 'required',
            'image' => v_image('required'),
        ]);
        if (!empty($data['image'])) {
            $data['image'] = $request->file('image')->storeAs('posts/', time());
        }
        Post::create($data);

        return response([
            'success' => 'post has been added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
        $data = $this->validate(request(), [
            'users_id' => 'required',
            'title' => 'required|string',
            'details' => 'required',
            'image' => v_image(),
        ]);

        if (!empty($data['image'])) {
//            $data['image'] = $request->file('image')->store('users');
            $data['image'] = up()->upload([
                'file' => 'image',
                'path' => 'posts/',
                'upload_type' => 'single',
                'deleted_file' => Post::find($id)->image,
                'new_name' => time(),
            ]);
        }
        $post = Post::where('id', $id)->update($data);
        return response([
            'success' => 'post has been updated successfully'
        ]);

//        return response($post);
//        return redirect(aurl('posts'))->with('success', 'added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        Post::find($id)->delete();

        return response(['success' => 'deleted successfully']);
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function multiDestroy()
    {
        if (is_array(request('item'))) {
            Post::destroy(\request('item'));
        } else {
            Post::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('posts'));
    }


}
