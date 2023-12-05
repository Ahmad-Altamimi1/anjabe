<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeslider extends Model
{
    use HasFactory;
    public $timestamps = false;

    function posts (){
        return $this->belongsTo(Post::class,'postId',"id");
    }
}

