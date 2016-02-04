<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent; 

class Post extends Eloquent {

    protected $fillable = [
        'content',
        'author',
        'date'
    ];

}
