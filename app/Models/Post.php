<?php

namespace App\Models;

use App\Traits\FormatsDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory, SoftDeletes,FormatsDates;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'meta_description',
        'status',
        'category_id',
        'user_id',
        'published_at',
        'views_count'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'published_at' => 'datetime',
        'views_count' => 'integer',
    ];

    /**
     * The relationships that should always be loaded.
     */
    protected $with = ['category'];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The tags that belong to the post.
     */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * Get the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'published');
    }

    /**
     * Scope a query to only include draft posts.
     */
    public function scopeDraft(Builder $query): void
    {
        $query->where('status', 'draft');
    }

    /**
     * Scope a query to only include posts from a given category.
     */
    public function scopeInCategory(Builder $query, $categoryId): void
    {
        $query->where('category_id', $categoryId);
    }

    /**
     * Scope a query to filter by tag.
     */
    public function scopeHasTag(Builder $query, $tagId): void
    {
        $query->whereHas('tags', function ($query) use ($tagId) {
            $query->where('tags.id', $tagId);
        });
    }

    /**
     * Scope a query to search posts.
     */
    public function scopeSearch(Builder $query, string $search): void
    {
        $query->where(function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('meta_description', 'like', "%{$search}%");
        });
    }

    /**
     * Get the post's featured image url.
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image
            ? Storage::disk('public')->url($this->featured_image)
            : null;
    }

    /**
     * Get the post's reading time in minutes.
     */
    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200); // Average reading speed
        return $minutes;
    }

    /**
     * Increment the view count.
     */
    public function incrementViewCount()
    {
        $this->increment('views_count');
    }

    /**
     * Check if post is published.
     */
    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}