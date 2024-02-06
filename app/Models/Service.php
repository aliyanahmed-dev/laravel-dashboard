<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements HasMedia
{
    
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = ['name', 'description', 'parent', 'price'];
    
    public $translatable = ['name', 'description'];
    
    public function children(){
        return $this->hasMany( 'App\Models\Service', 'parent', 'id' );
    }
      
      public function parent(){
        return $this->hasOne( 'App\Models\Service', 'id', 'parent' );
    }
}
