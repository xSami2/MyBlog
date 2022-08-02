<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post): \Illuminate\Http\RedirectResponse
    {
        request()->validate([  // Make Sure there is a Comment
           'body'=> 'required'
        ]);

       $post->comments()->create([       // Create The Comment in DB
           'user_id' => auth()->id(),
           'body'=> request('body')
       ]);

        return back();
    }
}
