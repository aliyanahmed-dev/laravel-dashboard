<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function students()
    {
        return $this->hasMany('App\Models\User', 'batch_id');
    }
    public function quizes()
    {
        return $this->hasMany('App\Models\Quiz', 'batch_id');
    }
}
