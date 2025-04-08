<?php

namespace App\Models;

use App\Traits\FormatsDates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,FormatsDates;

    protected $guarded = [];



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
}
