<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function posts()
    {
        return $this->hasOne('App\Models\Post', 'id', 'post_id');
    }
}
