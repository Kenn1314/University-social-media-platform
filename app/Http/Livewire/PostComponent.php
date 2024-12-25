<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class PostComponent extends Component
{

    public $posts;
    // public $sendBtn;
    public $inputComment;
    public $class ='not';
    public $style;
    public $post_size;
    // public $liked = '';

    public function mount($posts, $post_size)
    {
        $this->posts = $posts;
        $this->inputComment = '';
        $this->style = 'color: gray; cursor: not-allowed; pointer-events: none;';
        $this->post_size = $post_size;
        // $this->class = 'not';

        // $this->sendBtn = "disabled-link";
    }
    
    public function updatedInputComment()
    {
        if(empty($this->inputComment)){
            $this->style = "color: gray; cursor: not-allowed; pointer-events: none;";
        } else {
            $this->style = "color: #007FFF; cursor: pointer;";
        }
    }

    public function handleLike($id)
    {
        $post = Post::find($id);
        $likes = json_decode($post->likes, true);

        if(in_array(session()->get('std_id'), $likes)) {
            // Remove std_id from the array
            $index = array_search(session()->get('std_id'), $likes);
            unset($likes[$index]);
        } else {
            // Add std_id to the array
            $likes[] = session()->get('std_id');
        }

        $post->likes = json_encode($likes);
        $post->save();

        if($this->post_size != ''){
            $this->posts = Post::all();
        } else {
            $this->posts = User::where('student_id', session()->get('std_id'))->first()->createdPost;
        }
    }

    public function handleComment($postId)
    {
        $comment = new Comment;
        $comment->post_id = $postId;
        $comment->user_id = User::where('student_id', session()->get('std_id'))->first()->id;
        $comment->comment = $this->inputComment;
        $comment->save();

        if($this->post_size != ''){
            $this->posts = Post::all();
        } else {
            $this->posts = User::where('student_id', session()->get('std_id'))->first()->createdPost;
        }

        $this->reset(['inputComment', 'class', 'style']);
        // $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->reset(['inputComment', 'class', 'style']);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.post-component');
    }
}
