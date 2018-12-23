<?php

namespace App\Http\Controllers\Blog;

use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\User;

class CommentsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $data = $this->validate(request(), [
            'user_id' => 'required',
            'post_id' => 'required',
            'comment' => 'required|string',
        ]);
        $data['post_id'] = $id;
        $comment = Comment::create($data);

        $addedComment = $this->addedComment($comment);

        return response(['comment' => $addedComment]);
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
     * new Added comment in HTML FORM
     * @param Comment $comment
     * @return string
     */
    protected function addedComment(Comment $comment)
    {
        $div = " <article class=\"row\" id=\"comment\">
            <div class=\"col-md-2 col-sm-2 hidden-xs\">
                <figure class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"" . \Storage::url(auth()->user()->image) . "\">
                    <figcaption class=\"text-center\"><a
                                href=\"#\">" . auth()->user()->name . "</a>
                    </figcaption>
                </figure>
            </div>
            <div class=\"col-md-10 col-sm-10\">
                <div class=\"panel panel-default arrow left\">
                    <div class=\"panel-body\">
                        <header class=\"text-left\">
                            <div class=\"comment-user\"><i class=\"fa fa-user\"></i>
                                <a href=\"#\">" . auth()->user()->name . "</a>
                            </div>
                            <time class=\"comment-date\" datetime=\"16-12-2014 01:05\"><i
                                        class=\"fa fa-clock-o\"></i>$comment->created_at
                            </time>
                        </header>
                        <div class=\"comment-post\">
                            <div class=\"b-description_readmore js-description_readmore\">$comment->comment
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>";

        return $div;
    }
}
