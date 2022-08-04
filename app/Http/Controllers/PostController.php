<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Psy\Util\Str;

class PostController extends Controller
{
    public function index()
    {
                // $this->authorize('admin'); If he Admin ,  we load the page for him
        return view('posts.index',[
            'posts' => Post::latest()->filter(
                request(['search','category','author'])
            )->paginate(9)->withQueryString()

        ]);

    }
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post] );
    }

    public function create()
    {
        return view('admin.posts.create');
    }



}
