<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Services\SlugService;
use App\Services\ImageService;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Post::class, 'post');
    }

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
    public function create(Request $request)
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request, SlugService $slugService, ImageService $imageService)
    {
        $post = new Post($request->validated());
        $post->slug = $slugService->createUniqueSlug(Post::class, $post->title);
        $post = $request->user()->posts()->save($post);
        $image = $request->file('image');

        if($image){
            $imageService->saveImage($post, $image);
        }

        dd($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.single', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Post $post)
    {
        return $user->id === $post->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
