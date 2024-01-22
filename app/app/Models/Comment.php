<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['user_id','parent_id','post_id','comment'];


    public function post()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function parent_comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class,'parent_id','id');
    }

    public function child_comments(): HasMany
    {
        return $this->hasMany(Comment::class,'parent_id','id')->with('owner','child_comments');
    }




}
