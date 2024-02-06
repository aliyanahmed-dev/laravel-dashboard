<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    public function batch()
    {
        return $this->belongsTo('App\Models\Batch', 'batch_id');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Quizquestion', 'quiz_id');
    }
}
