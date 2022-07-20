<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {  // Which Dir your in
    
    return view('posts',[
        'posts' => Post::all()
    ]); // which file to Load
});
Route::get('/post/{post}', function ($slug) {  // Which Dir your in
  
     
  
  
    return view('post',[
    'post'=> Post::find($slug)
   ]);
   
})->where('post', '[A-z_/-]+');
