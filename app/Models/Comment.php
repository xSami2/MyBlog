<?php

namespace App\Models;
use App\Models\Post;
use App\Models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function post() // Laravel will Search For [post_id] . Why ? He uses the Name of  function to find out
    {
        return $this->belongsTo(Post::class , 'post_id'); // Comments Belongs to which Post?
    }

     public function author()
    {
       return $this->belongsTo(User::class , 'user_id'); //Comments Belongs to which Author?
    }



}
