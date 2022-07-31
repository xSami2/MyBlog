<?php

use App\Http\Controllers\RegisterController;
use App\Models\Post;
use \App\Http\Controllers\PostController;
use Couchbase\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;




Route::get('/', [PostController::class,'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class , 'show']);

Route::get('register',[RegisterController::class , 'create'] );
Route::post('register',[RegisterController::class , 'store'] );






