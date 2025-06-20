<?php

namespace App\Models;

use App\Traits\FormatsDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadImage;

class Product extends Model
{
    use HasFactory,FormatsDates,UploadImage;

    protected $guarded = [];

    protected $with = ['images'];

    
    public function category()
    {
        return $this->belongsTo(Pcategory::class);
    }
    public static function individual()
    {
        return self::where('user_id', auth()->user()->id)->get();
    }
    public static function general()
    {
        return self::where('user_id', 0)->get();
    }
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
     public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function getImagesArrayAttribute(): array
    {
        return $this->images
                    ->pluck('image_url')
                    ->map(fn($p) => $this->getImageUrl($p))
                    ->toArray();
    }
    protected $appends = ['images_array'];

}
