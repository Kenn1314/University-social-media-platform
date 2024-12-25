<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function navigateToUserProfile () {

        $posts = User::where('student_id', session()->get('std_id'))->first()->createdPost;
        return view('user.userProfile', ['posts'=> $posts]);
    }

    public function viewUser(Request $req)
    {
        return view('user.viewUser', ['user_id' => $req->id]);
    }
}
