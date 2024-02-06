<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportBookings implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    // public function collection()
    // {
    //     return Booking::select('id','user_id','phone_number','full_name','email','area','block','street','avenue','house','floor','additional_detail','payment_method','place_date','time','status','total_amount','created_at')->with('services')->get();
    // }
    public function view(): View
    {
        return view('admin.pages.exports.bookings', [
            'bookings' => Booking::all()
        ]);
    }
}
