<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function index() 
    {
        //=====GET USER ID-=====
        $user_id = User::where('student_id', session()->get('std_id'))->value('id');

        //=====GET THE POST CREATED BY THE LOGGED IN USER=====
        $posts = Post::where('user_id', $user_id)->get();

        return view('user.managePost', ['posts' => $posts]);
    }

    public function addPost(Request $req)
    {
        if(!$req->picture){
            $req->validate([
                'content' => ['required'],
            ]);
        }

        $newPost = new Post;

        $newPost->user_id = User::where('student_id', session()->get('std_id'))->value('id');
        $newPost->likes = json_encode([]);

        if($req->content){
           $newPost->content = $req->content;
        } else {
            $newPost->content = "";
        }

        if($req->picture) {
            $path = 'uploaded_Images/'.\Illuminate\Support\Str::random().'.'.$req->picture->getClientOriginalExtension();

            while(File::exists($path)){
                $path = 'uploaded_Images/'.\Illuminate\Support\Str::random().'.'.$req->picture->getClientOriginalExtension();
            }
    
    
            if(!File::exists(public_path('uploaded_Images'))){
                File::makeDirectory(public_path('uploaded_Images'), 0755, true);
                File::move($req->picture, $path);
            }
            else{
                File::move($req->picture, $path);
            }

            $newPost->file_path = $path;
        }

        $newPost->save();
        // return redirect('home');
        return back();
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        // return redirect('/user_profile');
        return back();
    }

    public function editPost(Request $req)
    {
        // CONDITION
        // WHEN PRESS ON THE MODAL
        // 1. NO ORI IMAGE
            // 1.1 CONFIRM DON'T HAVE noImage
        // 2. GOT ORI IMAGE
            // 2.1 SELECT noImage
            // 2.2 NO SELECT noImage

        $post = Post::find($req->post_id);

        if($req->content){
            $post->content = $req->content; 
        }
        
        //=====IF USER DOEN'T WANT TO INSERT AN IMAGE, EITHER DOESN'T WANT TO INSERT AN IMAGE OR THERE IS ALREADY A PICTURE EXISTS=====
        if($req->has('noImage')){

            if(File::exists($req->ori_file_path)){
                File::delete($req->ori_file_path);
                $post->file_path = null;
            }

            $post->save();

        //=====IF USER WANT TO INSERT AN IMAGE=====
        } else {

            if($req->picture){

                $path = 'uploaded_Images/'.\Illuminate\Support\Str::random().'.'.$req->picture->getClientOriginalExtension();

                while(File::exists($path)){
                    $path = 'uploaded_Images/'.\Illuminate\Support\Str::random().'.'.$req->picture->getClientOriginalExtension();
                }

                File::move($req->picture, $path);

                $post->file_path = $path;

                //=====CHECK IF THERE ARE ANY ORIGINAL IMAGE, AND DELETE IT IF THERE ARE ANY=====
                if($req->ori_file_path){
                    if(File::exists($req->ori_file_path)){
                        File::delete($req->ori_file_path);
                    }
                }
            }

            $post->save();
        }


        return back();
    }
}
