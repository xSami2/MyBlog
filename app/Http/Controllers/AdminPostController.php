<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function index()  //
    {
        return view('admin.posts.index',[
           'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }


    public function store()
    {

        $attributes = request();
        $attributes['slug'] =  \Illuminate\Support\Str::slug(request('title'));
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => [Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);


        return redirect('/')->with('success' , 'Your Post Was Published Successfully');


    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit' , ['post' => $post]);
    }

    public function update(Post $post) // to update the post
    {



        $attributes = request();
        $attributes['slug'] =  \Illuminate\Support\Str::slug(request('title'));

        $attributes = request()->validate([
            'title'=> 'required',
            'thumbnail' => ['image']    ,
            'slug' => [Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body'=>'required',
            'category_id' =>['required' , Rule::exists('categories' , 'id')]
        ]);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store("thumbnails");
        }

        $post->update($attributes);
        return redirect('/')->with('success' , ' Post Updated');
    }

    public function destroy(Post $post )  // Delete the post
    {
        $post->delete();
        return redirect('/')->with('success' , ' Post Deleted');

    }
}
