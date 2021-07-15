<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
//        return $posts;
        return view('posts', compact('posts'));
    }
    public function details($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $blogKey = 'blog_'.$post->id;
        if(!Session::has($blogKey)){
            $post->increment('view_count');
            Session::put($blogKey, 1);
        }
        $randomPosts = Post::all()->random(3);

        $comments = Comment::latest()->get();
        return view('post', compact('post', 'randomPosts', 'comments'));
    }

    public function postByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category', compact('category'));
    }

    public function postByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        return view('tag', compact('tag'));
    }
}
