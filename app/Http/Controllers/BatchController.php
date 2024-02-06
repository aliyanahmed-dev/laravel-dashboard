<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::all();
        return view('admin.batch-management.list', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::where('is_active', 1)->get();
        $teachers = User::where('role_id', 2)->get();
        return view('admin.batch-management.add', compact('courses', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:250',
            'batch_id' => 'required|unique:batches',
            'limit' => 'required',
            'course' => 'required',
            'teacher' => 'required',
        ]);

        $batch =  Batch::create([
            'name' => $request->name,
            'batch_id' => $request->batch_id,
            'limit' => $request->limit,
            'course_id' => $request->course,
            'teacher_id' => $request->teacher,
        ]);
        // dd($request->image);


        Session::flash('message', 'Batch created successfully!');

        return redirect()->route('batches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {

        $courses = Course::where('is_active', 1)->get();
        $teachers = User::where('role_id', 2)->get();
        return view('admin.batch-management.edit', compact('courses', 'teachers', 'batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Batch $batch)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:250',
            'batch_id' => [
                'required',
                Rule::unique('batches')->ignore($batch->id),
            ],
            'limit' => 'required',
            'course' => 'required',
            'teacher' => 'required',
        ]);

        $batch =  Batch::where('id', $batch->id)->update([
            'name' => $request->name,
            'batch_id' => $request->batch_id,
            'limit' => $request->limit,
            'course_id' => $request->course,
            'teacher_id' => $request->teacher,
        ]);
        Session::flash('message', 'Batch Updated successfully!');

        return redirect()->route('batches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        Session::flash('message', 'Blog Deleted successfully!');
        return redirect()->back();
    }

    public function suspend($id)
    {
        $batch = Batch::where('id', $id)->first();
        $batch->is_active = ($batch->is_active == 1) ? 0 : 1;
        $batch->save();
        $message = ($batch->is_active == 1) ? 'Batch Activated successfully!' : 'Batch Suspended successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }
}
