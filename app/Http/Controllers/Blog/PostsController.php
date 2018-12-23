<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostLike;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostLiked()
    {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->simplePaginate(10);
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
        $likes = Post::find($id)->likes()->count();
        $comments = $post->comments()->orderBy('created_at', 'desc')->simplePaginate(1);
        if (\request()->ajax()) {
            return $this->comments($id);
        }
        return view('front.post.view', compact('post', 'user', 'comments', 'likes'));
    }

    /**
     * Get comments of a work
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comments($id)
    {
        $comments = Post::find($id)->comments()->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('front.post.comments', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
     * Get count of Likes pf specified post
     *
     * @param $id
     * @return mixed
     */
    public function likes($id)
    {
        $likes = Post::find($id)->likes()->count();
        return $likes;
    }

    /**
     * Auth User likes a specified post
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function saveLike($id)
    {
        if (Auth::check()) {
            $findLike = PostLike::where('user_id', Auth::user()->id)->where('post_id', $id)->first();
            if ($findLike) {
                $findLike->delete();
                return response(['deleted' => 'like is deleted successfully']);
            }
            $like = new PostLike();
            $like->user_id = Auth::user()->id;
            $like->post_id = $id;
            $like->save();
            return response(['liked' => 'like is addedd successfully']);

        } else {
            return response(['redirect' => url('login')]);
        }
    }

}
