<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function users()
    {
        $users = User::where('is_admin', '=', 0)->get();
        return view('admin.users', ['users' => $users]);
    }

}
