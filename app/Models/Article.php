<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    /**
     * Get the comments for the article.
     * one to many
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the categories for the article.
     * many to many relationships => article_category table
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the tags for the article.
     * many to many relationships => article_tag table
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
