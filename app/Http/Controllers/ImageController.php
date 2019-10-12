<?php

namespace App\Http\Controllers;

use Uuid;
use Image as InterventionImage;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($model, $image, $alt = '', $comment = '')
    {
        $webp = (string) InterventionImage::make($image)->encode('webp', 90);
        $extension = '.webp';
        $uuid = Uuid::generate(4);
        $fileName = 'images/' . $uuid . $extension;

        Storage::disk('public')->put($fileName, $webp);

        $imageModel = new Image;
        $imageModel->uuid = $uuid;
        $imageModel->model_name = get_class($model);
        $imageModel->related_model_id = $model->id;
        $imageModel->url = Storage::url($fileName);
        $imageModel->alt = $alt;
        $imageModel->comment = $comment;
        $imageModel->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
