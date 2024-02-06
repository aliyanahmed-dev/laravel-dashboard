<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Session;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = $_GET;
        if ($search) {
            $student = isset($search['student']) ? $search['student'] : null;
            $month = isset($search['month']) ? $search['month'] : null;

            $feesQuery = Fees::query();

            if ($student) {
                $feesQuery->where('student_id', $student);
            }


            if ($month) {
                $feesQuery->where('month', $month);
            }

            $fees = $feesQuery->get();
        } else {

            $fees = Fees::all();
        }
        $students = User::where('role_id', 3)->where('status', 1)->get();
        return view('admin.fees-management.list', compact('fees', 'search', 'students'));
    }

    public function schedule()
    {
        Artisan::call('app:create-monthly-fees');
        dd('Command Run Succesfully');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fees $fees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fees $fees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fees $fees)
    {
        //
    }
    public function status($id)
    {
        $fees = Fees::where('id', $id)->first();
        $fees->pay_status = ($fees->pay_status == 1) ? 0 : 1;
        $fees->pay_date = ($fees->pay_status == 1) ? now() : null;
        $fees->save();
        $message = ($fees->pay_status == 1) ? 'Fees Paid successfully!' : 'Fees Un Paid successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }
}
