<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';


    protected $fillable = ['title', 'category', 'content', 'user_id'];

    public $timestamps = true;
}
