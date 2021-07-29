<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use HasMediaTrait;

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

    /**
     * Get the user that owns the article.
     * Parameter second of belongsTo() is name of foreign_key
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Get all categories owned by article and return links to view them
     * href="'.route('articles.index').'?category_id='.$category->id.'"
     */
    public function getCategoriesLinksAttribute()
    {
        $categories = $this->categories()->get()->map(function($category) {
            return '<a class="text-blue-500" href="' . route('articles.index') . '?category_id=' . $category->id . '">' . $category->name . '</a>';
        })->implode(' | ');

        if ($categories == '') return 'none';

        return $categories;
    }

    /**
     * Get all tags owned by article and return links to view them
     * href="'.route('articles.index').'?tag_id='.$tag->id.'"
     */
    public function getTagsLinksAttribute()
    {
        $tags = $this->tags()->get()->map(function($tag) {
            return '<a class="text-blue-500" href="' . route('articles.index') . '?tag_id=' . $tag->id . '">' . $tag->name . '</a>';
        })->implode(' | ');

        if ($tags == '') return 'none';

        return $tags;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('small')
            ->width(100)
            ->height(100);

        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200);

        $this->addMediaConversion('large')
            ->width(400)
            ->height(200);
    }
}
