<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageStoreService
{
    public function storePostImage(?UploadedFile $image) : ?string
    {
        if(!is_null($image)) {
            $imagePath = $image->store('images/posts');
            $imagePath = \env('APP_URL') . "/storage/" . $imagePath;

            return $imagePath;
        }
        return null;
    }

    public function updatePostImage(?UploadedFile $image,Post $post) : ?string
    {
        if (is_null($image)){
            return $post->image;
        }
        $this->deletePostImage($post->image);

        $imagePath = $image->store('images/posts');
        $imagePath = \env('APP_URL') . "/storage/" . $imagePath;

        return $imagePath;
    }

    public function deletePostImage(?string $oldImage) :void
    {
        if (!is_null($oldImage)){
            $oldImage = explode('http://localhost/storage/images/posts/', $oldImage);
            $oldImage = $oldImage[1];
            Storage::disk('public')->delete("images/posts/$oldImage");
        }
    }


}
