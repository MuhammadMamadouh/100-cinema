<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostLike;
use App\Notifications\Notify;
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


    public function create()
    {

        return view('front.post.create');
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
            'title' => 'required|string',
            'slug' => 'required|unique:posts',
            'details' => 'required',
            'image' => v_image('required'),
        ]);
        if (!empty($data['image'])) {
            $data['image'] = $request->file('image')->storeAs('posts', time() . '.' . $request->file('image')->extension());
        }
        $data['user_id'] = \auth()->user()->id;
        Post::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = User::find($post->user_id);
        $likes = $post->likes()->count();
        $comments = $post->comments()->orderBy('created_at', 'desc')->simplePaginate(5);
        if (\request()->ajax()) {
            return $this->comments($post->id);
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
    public function edit(Post $post)
    {
        return view('front.post.create', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $post = Post::findOrFail($id);
        if ($post) {
            $data = $this->validate(request(), [
                'title' => 'required|string',
                'details' => 'required',
                'image' => v_image(),
            ]);
//            if ($post->id === auth()->user()->id) {
            if (!empty($data['image'])) {
                $data['image'] = up()->upload([
                    'file' => 'image',
                    'path' => 'posts',
                    'upload_type' => 'single',
                    'deleted_file' => $post->image,
                    'new_name' => time() . '.' . request()->file('image')->extension(),
                ]);
            }
            $post->update($data);
            return redirect('/')->with('successfully updated');
//            }
        } else {
            abort(500);
        }
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
            // send notification to the author of the post commented on
            $post = Post::find($id);

            // Check if the user has liked his post then don't notify him
            if ($post->user_id !== Auth::user()->id) {
                User::find($post->user_id)->notify(new Notify(auth()->id(), 'likes', $id));
            }
            return response(['liked' => 'like is addedd successfully']);

        } else {
            return response(['redirect' => url('login')]);
        }
    }

    protected function post($id)
    {
        $post = Post::find($id);
        return view('front.loads.posts', compact('post'));
    }
}
