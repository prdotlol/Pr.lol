<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;


class BrandController extends Controller
{
    public function logo()
    {
        $icons = ['cool.svg', 'happy.svg', 'love.svg', 'ouch.svg', 'ouu.svg', 'speechless.svg', 'ghost.svg', 'excited.svg'];
        shuffle($icons);
        $storagePath = public_path('./image/pr-icons/' . $icons[0]);
        $headers['Cache-Control'] = 'no-cache, no-store, must-revalidate';
        return response()->file($storagePath, $headers);
    }

    public function inspiration(){
        return Inspiring::quote();
    }
}
