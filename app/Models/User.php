<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getTotalBookingAttribute()
    {
        return $this->bookings()->count();
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public static function last()
    {
        return static::all()->last();
    }
    public function batch()
    {
        return $this->belongsTo('App\Models\Batch', 'batch_id');
    }
    public function attended_quizzes()
    {
        return $this->hasMany('App\Models\AttendedQuizzes', 'user_id');
    }

    public function fees()
    {
        return $this->hasMany('App\Models\Fees', 'student_id');
    }
    public function attendace()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'user_id');
    }
}
