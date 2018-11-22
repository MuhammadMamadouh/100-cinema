<?php

namespace App\Http\Controllers\User;

use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Kamaln7\Toastr\Facades\Toastr;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDataTable $post)
    {
        $posts = Post::all();
        return view('front.post.posts', compact('posts'));
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
            'user_id' => 'required',
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

        $post = Post::find($id);
        $user = User::find($post->user_id);
        $comments = $post->comments()->get();
        return view('front.post.view', compact('post', 'user', 'comments'));
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
    public function update($id)
    {
        //
        $data = $this->validate(request(), [
            'user_id' => 'required',
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
        Post::where('id', $id)->update($data);
        return response([
            'success' => 'post has been updated successfully'
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
        Post::find($id)->delete();

        return response(['success' => 'deleted successfully']);
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
            Post::destroy(\request('item'));
        } else {
            Post::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('posts'));
    }


    /**
     * Get comments of a work
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comments($id)
    {
        $comments = Post::find($id)->comments()->orderBy('created_at', 'desc')->get();
        return view('front.post.comments', compact('comments'));
    }

    public function posts()
    {

    }

}
