<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zoha\Metable;

class Booking extends Model
{
    use HasFactory, Metable;
    protected $fillable = ['phone_number','full_name', 'email', 'area','block','street','avenue','house','floor','additional_detail','payment_method','place_date','time','terms_and_conditions', 'user_id', 'status', 'total_amount'];
    protected $casts = [
        'time' => 'string',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_service');
           // ->withPivot('quantity'); // If your pivot table has additional columns
    }

    public function services_ids()
    {
        return $this->services->pluck('id')->toArray();
    }
}
