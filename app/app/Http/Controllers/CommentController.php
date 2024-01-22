<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentCreateRequest $request,Post $post)
    {
      $post = $post->comments()->create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->validated('parent_id'),
            'comment' => $request->validated('comment'),
        ]);

       return response($post);

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
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
