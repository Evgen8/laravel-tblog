<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::count();
        $comments = Comment::count();
        $users = User::where('is_admin', '=', 0)->count();
        $admin = User::where('is_admin', '=', 1)->count();

        return view('admin.main', ['posts' => $posts, 'comments' => $comments, 'users' => $users, 'admin' => $admin ]);
    }

}
