<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendedQuizzes extends Model
{
    use HasFactory;
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\AttendedQuizAnswers', 'attended_quiz_id');
    }
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
