<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //    protected $fillable= ['title', 'excerpt', 'body','slug','category_id'];

    protected $guarded = [];
    protected $with = ['category','author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user() // Pull All Post from the user
    {
        return $this->belongsTo(User::class);
    }
    public function  author() // Laravel Will Search for the [user_id]
    {
         return $this->belongsTo(User::class,'user_id'); // Laracvel Will Pull All post Realted to [User_ID]
    }

}
