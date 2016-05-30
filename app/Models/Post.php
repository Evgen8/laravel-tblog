<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                    ->orWhere("content", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
    public function scopeSlug()
    {
        // get all posts
        $posts = Post::all();

        // loop through all posts
        foreach ($posts as $post) {
            // convert the title into a slug and save it to the slug field
            $post->slug = Str::slug($post->title);

            // save the post
            $post->save();
        }
    }
}
