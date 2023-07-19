<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
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
        'content',
        'category_id'
    ];

    // protection pour dire que ces champs ne sont pas modifiables
    // protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
