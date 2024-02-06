<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coupons = Coupon::all();
        return View("admin.pages.coupons", compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View("admin.pages.coupon-page");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $coupon = Coupon::create([
            'coupon' => $request->coupon,
            'discount' => $request->discount,
            'type' => $request->type,
            'limit' => $request->limit,
            'used' => $request->used,
            'expiry' => $request->expiry,
        ]);


        session()->flash('flash.banner', 'Created successfully.');
        session()->flash('flash.bannerStyle', 'success');

        if ($request->saveAndContinue) {
            return back();
        }
        return redirect()->route('coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return View("admin.pages.coupon-page", compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        // Start from here ...
        // dd($coupon);
        // $coupon = Coupon::find($coupon);
        $coupon->update([
            'coupon' => $request->coupon,
            'discount' => $request->discount,
            'type' => $request->type,
            'limit' => $request->limit,
            'used' => $request->used,
            'expiry' => $request->expiry,
        ]);


        session()->flash('flash.banner', 'Updated successfully.');
        session()->flash('flash.bannerStyle', 'success');

        if ($request->updateAndContinue) {
            return back();
        }
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        return back();
    }

    public function checkPromo(Request $request)
    {
        $promo = $request->input('promo');

        $validCoupon = Coupon::where('coupon', $promo)
            ->where('limit', '>=', DB::raw('used'))
            ->where('expiry', '>=', Carbon::now())
            ->first();

        if ($validCoupon) {
            return response()->json([
                'status' => 'success',
                'data' => $validCoupon,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
            ]);
        }
    }
}
