<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course-management.list', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->where('type', 'course')->get();
        return view('admin.course-management.add')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|unique:courses|string|max:255',
            'category' => 'required',
            'students' => 'required',
            'price' => 'required',
            'duration' => 'required|string',
            'level' => 'required|string',
            'requirments' => 'required|string',
            'materials' => 'required|string',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'video_type' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,jfif,svg|max:500',
        ]);

        $course =  Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'category_id' => $request->category,
            'students' => $request->students,
            'price' => $request->price,
            'duration' => $request->duration,
            'level' => $request->level,
            'requirements' => $request->requirments,
            'materials' => $request->materials,
            'video_type' => $request->video_type,
            'video_iframe' => $request->video_iframe,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'is_featured' => $request['featured'] ? 1 : 0,
        ]);
        if ($request->video_type == 'file') {
            $course->addMediaFromRequest('video_file')
                ->toMediaCollection('video');
        }
        // dd($request->image);

        $course->addMediaFromRequest('image')
            ->toMediaCollection('thumbnail');

        Session::flash('message', 'Course created successfully!');

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {

        $categories = Category::where('is_active', 1)->where('type', 'course')->get();
        return view('admin.course-management.edit')->with(compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $current_course = Course::where('id', $course->id)->first();
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('courses')->ignore($course->id), // Ignore the current user's email
                'max:255',
            ],
            'category' => 'required',
            'students' => 'required',
            'price' => 'required',
            'duration' => 'required|string',
            'level' => 'required|string',
            'requirments' => 'required|string',
            'video_type' => 'required|string',
            'materials' => 'required|string',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,jfif,svg|max:500',
        ]);

        $course =  Course::where('id', $current_course->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'category_id' => $request->category,
            'students' => $request->students,
            'price' => $request->price,
            'duration' => $request->duration,
            'video_type' => $request->video_type,
            'video_iframe' => $request->video_iframe,
            'level' => $request->level,
            'requirements' => $request->requirments,
            'materials' => $request->materials,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'is_featured' => $request['featured'] ? 1 : 0,
        ]);


        if ($request->video_type == 'file') {
            if ($request->hasFile('video_file')) {
                $current_course->clearMediaCollection('video_file');
                $current_course->addMediaFromRequest('video_file')
                    ->toMediaCollection('video');
            }
        }

        if ($request->hasFile('image')) {
            $current_course->clearMediaCollection('thumbnail');
            $current_course->addMediaFromRequest('image')
                ->toMediaCollection('thumbnail');
        }
        Session::flash('message', 'Course Updated successfully!');

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->clearMediaCollection('thumbnail');
        $course->clearMediaCollection('video_file');
        $course->delete();
        Session::flash('message', 'Course Deleted successfully!');
        return redirect()->back();
    }

    public function suspend(Course $course)
    {
        $course->is_active = ($course->is_active == 1) ? 0 : 1;
        $course->save();
        $message = ($course->is_active == 1) ? 'Service Activated successfully!' : 'Service Suspended successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }

    public function category()
    {
        $categories = Category::where('type', 'course')->get();
        return view('admin.course-management.category')->with(compact('categories'));
    }
}
