<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Gallery extends Model implements HasMedia
{
    
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = ['name', 'description'];
    
    public $translatable = ['name', 'description'];
}
