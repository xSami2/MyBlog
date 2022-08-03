<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Psy\Util\Str;

class PostController extends Controller
{
    public function index()
    {

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
        return view('posts.create');
    }
    public function store()
    {
        $attributes = request();



        $attributes['slug'] =  \Illuminate\Support\Str::slug(request('title'));

        $attributes = request()->validate([
           'title'=> 'required',
            'slug' => [Rule::unique('posts','slug')],
           'excerpt' => 'required',
            'body'=>'required',
            'category_id' =>['required' , Rule::exists('categories' , 'id')]
        ]);
        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/')->with('success' , 'Your Post Was Published Successfully');
    }


}
