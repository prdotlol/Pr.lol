<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    protected $guarded = [
        'page',
        'official',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\PostType', 'post_type', 'slug');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'related_model_id', 'id')->where('model_name', get_class($this->get()));
    }
}
