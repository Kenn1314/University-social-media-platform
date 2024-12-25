<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // echo Auth::user()->role;

        $posts = Post::all(); // GET ALL POSTS

        if(Gate::allows('isUser'))
        {
            //=====FIND THE USER BASED ON STUDENT ID AND GET ALL THE POSTS CREATED BY THE USER (NOT USED)=====
            // $user = User::where('student_id', '=', session()->get('std_id'))->first();            
            // return view('user.userHome', ['posts' => $user->createdPost]);

            // return $posts->likes;
            return view('user.userHome', ['posts' => $posts]);
            // return view('home');
        } else {
            return view('admin.adminHome');
        }
    }
}
