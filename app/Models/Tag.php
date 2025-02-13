<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    // Posts with this tag
    public function posts()
    {
        return $this->belongsToMany(Post::class)
            ->withTimestamps();
    }

    // Get the route key name
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
