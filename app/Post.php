<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    /*public static function getPost($postName)
    {
        $array = DB::table('posts')->where('id', '=', $id)->get();
        return $array;
    }*/
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
