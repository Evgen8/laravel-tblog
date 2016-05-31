<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'comments')->get();
        $category = Category::all();
        return view('admin.posts', ['posts' => $posts, 'category' => $category]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', '=', $id)->get();
        return view('admin.viewPost', ['post' => $post, 'comments' => $comments]);
    }

    public function edit_status(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        if($post->status == 0) {
            $post->status = '1';
        } else {
            $post->status = '0';
        }

        if(!$post->save()){
            return 'error';
        } else {
            $posts = Post::with('category', 'comments')->get();
            return view('admin.partials._posts', ['posts' => $posts]);
        }
    }
    public function edit_cat(Request $request)
    {
        $post = $request->post;
        $post = Post::findOrFail($post);
        $post->category_id = $request->id;
        if(!$post->save()){
            return 'error';
        } else {
            $posts = Post::with('category', 'comments')->get();
            return view('admin.partials._posts', ['posts' => $posts]);
        }
    }
}
