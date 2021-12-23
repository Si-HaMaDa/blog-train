<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $comment = Comment::with('user', 'blog')->find(3);
        // dd($comment->user->name);

        // $blog = Blog::with('comments')->find(1);
        // dd($blog->comments[1]->name);

        // $blog = Blog::with('users')->find(3);
        // dd($blog);

        $comments = Comment::all()->load('user');
        return view('admin.comment.index')->with('comments', $comments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('success', 'You deleted the Comment');
        return redirect(route('comments.index'));
    }
}
