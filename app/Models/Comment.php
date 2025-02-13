<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'post_id',
        'user_id',
        'parent_id',
        'status'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    // The post this comment belongs to
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // The user who made the comment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Parent comment
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Child comments (replies)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Scope for approved comments
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope for pending comments
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
