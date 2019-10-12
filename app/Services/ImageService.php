<?php

namespace App\Services;

use Illuminate\Support\Str;

class ImageService
{
    public function saveImage($modelClass, $image, $alt = '', $comment = '')
    {
        $imageUrl = app('App\Http\Controllers\ImageController')->store($modelClass, $image);
    }
}
