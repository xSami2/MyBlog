<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use \App\Http\Controllers\PostController;
use Couchbase\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;




Route::get('/', [PostController::class,'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class , 'show']);

Route::get('register',[RegisterController::class , 'create'] )->middleware('guest'); // Are you New User or No ? , Only [Guest] can Access this Route
Route::post('register',[RegisterController::class , 'store'] )->middleware('guest');
Route::post('logout',[SessionController::class ,'destroy']);









