<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use HasFactory;

    // protection pour dire que ces champs sont modifiables (avec create)
    protected $fillable = [
        'title',
        'slug',
        'content'
    ];

    // protection pour dire que ces champs ne sont pas modifiables
    // protected $guarded = [];
}
