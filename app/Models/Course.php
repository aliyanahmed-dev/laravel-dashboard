<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];


    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }


    public static function last()
    {
        return static::all()->last();
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'course_id');
    }
}
