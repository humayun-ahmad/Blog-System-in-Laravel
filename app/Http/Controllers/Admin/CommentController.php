<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('admin.comments', compact('comments'));
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id)->first();

        $comment->delete();

        Toastr::success('Comment removed Successfully!', 'success');

        return redirect()->back();
    }
}
