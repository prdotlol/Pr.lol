<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function getIncrementing()
    {
        return false;
    }


    protected $fillable = [
        'url',
        'alt',
        'comment',
    ];

    protected $guarded = [
        'uuid',
    ];
}
