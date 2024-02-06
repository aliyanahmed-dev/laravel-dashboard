<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\Service;
use App\Exports\ExportBookings;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Page;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        $users = User::all();
        return View("admin.pages.bookings",compact('bookings', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $services = Service::all();
        return View('admin.pages.booking',compact('users', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($booking)
    {
        $booking = Booking::find($booking);
        $users = User::all();
        $services = Service::all();
        if($booking){
            $booking_coupon = $booking->getMeta('booking_coupon');
            $booking_loyality = $booking->getMeta('booking_loyality');
        }
        return View('admin.pages.edit-booking',compact('booking', 'users', 'services', 'booking_coupon', 'booking_loyality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        Session::flash('message', 'Booking Deleted successfully!'); 
        return redirect()->back();
    }


    public function filter_search(Request $request)
    {      
      
    }

    public function export(Request $request){
    }
}
