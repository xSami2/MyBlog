<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //    protected $fillable= ['title', 'excerpt', 'body','slug','category_id'];


    protected $with = ['category','author'];


    public function scopeFilter($query , array $filters)
    {
        $query->when($filters['search'] ?? false , fn($query ,$search) =>
            $query->where(fn ($query) =>
            $query->where('title', 'like', '%' . request("search") . '%')
                ->orWhere('body', 'like', '%' . request("search") . '%')));

        $query->when($filters['category'] ?? false , fn ($query , $category) =>
            $query->whereHas("category", fn($query) =>
            $query->where('slug', $category)));
        $query->when($filters['author'] ?? false , fn ($query , $author) =>
                $query->whereHas("author", fn($query) =>
                $query->where('username', $author)));


    }


    public function  comments() // Pull All Comment For Spifece Post
    {
        return $this->hasMany(Comment::class);   // Post Has Many Comments
    }

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
