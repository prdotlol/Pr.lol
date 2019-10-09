<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $attributes = [
        'title',
        'slug',
        'content',
        'image',
        'page' => false,
        'official' => false,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\PostType', 'post_type', 'slug');
    }
}
