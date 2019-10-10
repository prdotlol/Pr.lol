<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;

class Image extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
}
