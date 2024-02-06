<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizquestion extends Model
{
    use HasFactory;
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    public function quizoptions()
    {
        return $this->hasMany('App\Models\Quizoption', 'quizquestion_id');
    }
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }
}
