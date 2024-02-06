<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = $_GET;
        if ($search) {
            $date = isset($search['date']) ? $search['date'] : null;
            $attendance = Attendance::where('date', $date)->get();
        } else {
            $date = Carbon::now()->format('Y-m-d');
            $attendance = Attendance::where('date', $date)->get();
        }

        $students = User::where('role_id', 3)->where('status', 1)->get();
        return view('admin.attendance-management.list', compact('attendance', 'students', 'search', 'date'));
    }

    public function detail()
    {
        $search = $_GET;
        if ($search) {
            $student = isset($search['student']) ? $search['student'] : null;
            $month = isset($search['month']) ? $search['month'] : null;

            $attendanceQuery = Attendance::query();
            if ($student) {
                $attendanceQuery->where('student_id', $student);
            }
            if ($month) {
                $attendanceQuery->whereRaw('MONTH(date) = ?', [$month]);
            }
            $attendance = $attendanceQuery->get();
        } else {
            $attendance = null;
        }

        $students = User::where('role_id', 3)->where('status', 1)->get();
        return view('admin.attendance-management.detail-record', compact('attendance', 'search', 'students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = Batch::where('is_active', 1)->get();
        return view('admin.attendance-management.add', compact('batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'date' => 'required',
            'batch' => 'required',
        ]);

        foreach ($request['students'] as $student_data) {
            $student = User::where('id', $student_data['id'])->first();
            $check_current_date_enrty = Attendance::where('student_id', $student->id)->where('date', $request['date'])->first();
            if ($check_current_date_enrty == null) {
                $attendance = Attendance::create([
                    'student_id' => $student->id,
                    'date' => $request['date'],
                    'status' => isset($student_data['status']) ? 1 : 0
                ]);
            }
        }

        Session::flash('message', 'Attendance Created successfully!');

        return redirect()->route('attendance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
    public function search_student(Request $request)
    {
        $batch = Batch::where('id', $request->batch)->first();
        $students = User::where('batch_id', $batch->id)->where('status', 1)->get();
        $studentsHtml = View::make('admin.attendance-management.students', ['students' => $students])->render();

        return response()->json(['html' => $studentsHtml]);
    }

    public function status($id)
    {
        $item = Attendance::where('id', $id)->first();
        $item->status = ($item->status == 1) ? 0 : 1;
        $item->save();
        $message = ($item->status == 1) ? 'Attendance Activated successfully!' : 'Attendance Suspended successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }
    public function leave($id)
    {
        $item = Attendance::where('id', $id)->first();
        $item->status = ($item->status == 2) ? 0 : 2;
        $item->save();
        $message = ($item->status == 2) ? 'Attendance Mark as Leave successfully!' : 'Attendance Remove as Leave successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }
}
