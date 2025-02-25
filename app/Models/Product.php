<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function individual()
    {
        return self::where('user_id', auth()->user()->id)->get();
    }
    public static function general()
    {
        return self::where('user_id', 0)->get();
    }
}
