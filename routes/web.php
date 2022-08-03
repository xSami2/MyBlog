<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use \App\Http\Controllers\PostController;
use Couchbase\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
use App\Services\Newsletter;


Route::post('newsletter',function (){
        request()->validate(['email'=> 'required|email']);

    try {

        ( new Newsletter())->subscribe(request('email') ); // Do it In episode 60

    } catch (\Exception $e){
        return redirect('/')
            ->with('success','Provide Correct Email Pleases');
    }
    return redirect('/')
        ->with('success','Your are now signed up with our newsletter');
});

Route::get('/', [PostController::class,'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class , 'show']);

Route::get('register',[RegisterController::class , 'create'] )->middleware('guest'); // Are you New User or No ? , Only [Guest] can Access this Route
Route::post('register',[RegisterController::class , 'store'] )->middleware('guest');

Route::get('login',[SessionController::class ,'create'])->middleware("guest");  // Redercit to Login page
Route::post('login',[SessionController::class ,'store'])->middleware("guest");  // Auth To log in
Route::post('logout',[SessionController::class ,'destroy'])->middleware('auth');


Route::post('posts/{post:slug}/comments',[PostCommentsController::class , 'store'] ); // Create Route to Store The Comments

Route::get('admin/posts/create' , [PostController::class , 'create'])->middleware('admin');
Route::post('admin/posts' , [PostController::class , 'store'])->middleware('admin');






