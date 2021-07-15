<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $posts= Auth::user()->posts;
//        return $posts;
        return view('author.comments', compact('posts'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if($comment->post->user->id == Auth::id() )
        {
            $comment->delete();
            Toastr::success('Comment removed Successfully!', 'success');
        }else{
            Toastr::error('Comment removed Successfully!', 'Access Denied !!!');
        }



        return redirect()->back();
    }
}
