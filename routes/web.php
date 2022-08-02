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



Route::post('newsletter',function (){
        request()->validate(['email'=> 'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),   // Extract The api key
        'server' => 'us17'
    ]);
    try {

        $mailchimp->lists->addListMember('a4f82592d4',[
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
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







