<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 
        'user_id', 
        'name', 
        'slug', 
        'description', 
        'image', 
        'category_id', 
        'tags', 
        'seo_title', 
        'seo_meta_tags', 
        'seo_description'
    ];

    /**
     * Relationship: Blog belongs to a User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Blog belongs to a Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
