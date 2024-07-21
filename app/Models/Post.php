<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // details can be seen on migration/create_post table
    protected $fillable = [
        'title',
        'body',
    ];
}
