<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'category_id');
    }
    public function blogs()
    {
        return $this->hasMany('App\Models\Blog', 'category_id');
    }
}
