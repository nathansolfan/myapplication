<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // details can be seen on migration/create_post table
    // added 'image' > then migration create_posts > $table->string('image')->nullable();
    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    // 2nd relation
    public function user() : BelongsTo
    {
        // $this : Post class. Opposite of User Model
        return $this->belongsTo(User::class);
    }
}
