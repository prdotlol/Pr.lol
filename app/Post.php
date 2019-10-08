<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $attributes = [
        'title',
        'slug',
        'content',
        'page' => false,
        'official' => false,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
