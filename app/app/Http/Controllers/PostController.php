<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Services\ImageStoreService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = Post::all();

        return response($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $publicPathStoredImage = (New ImageStoreService())->storePostImage($request->validated('image'));

      $post = Post::create([
           'user_id' => auth()->user()->id,
           'image' =>  $publicPathStoredImage,             //$request->validated('image'), // storeService?
           'title' =>  $request->validated('title'),
            'description' => $request->validated('description'),
            'text' => $request->validated('text'),
        ]);

      return response($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       $comments = Comment::where('post_id','=',$post->id)->with(['owner','child_comments'])->whereNull('parent_id')->get();

     $post = $post->load('owner');

      $post = collect($post);

    $post =  $post->concat($comments);

       return response($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
