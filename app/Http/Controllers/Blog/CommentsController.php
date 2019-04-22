<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\Notify;
use App\User;

class CommentsController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return response()->json(['comment' => $comment]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store($id)
    {
        $data = $this->validate(request(), [
            'body' => 'required|string',
        ]);
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $id;
        $comment->body = $data['body'];
        $comment->save();
        // send notification to the author of the post commented on
        $post = Post::find($id);
        User::find($post->user_id)->notify(new Notify(auth()->id(), ' commented on ', $id));

        $addedComment = $this->addedComment($comment);
        return response()->json(['comment' => $addedComment]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = $this->validate(request(), [
            'body' => 'required|string',
        ]);
        Comment::where('id', $id)->update($data);

        return response([
            'body' => $data['body']
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

        Comment::find($id)->delete();

        return response(['success' => 'deleted successfully']);
    }

    /**
     * new Added comment in HTML FORM
     * @param Comment $comment
     * @return string
     * @throws \Throwable
     */
    protected function addedComment(Comment $comment)
    {
        return view('front.post.comment', compact('comment'))->render();
    }
}
