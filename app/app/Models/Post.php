<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['user_id','image','title','description','text'];


    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }



}
