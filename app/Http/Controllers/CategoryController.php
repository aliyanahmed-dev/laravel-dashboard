<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'slug' => 'required|string|max:50|unique:categories',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,jfif,svg|max:500',
        ]);
        $course_cat = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'type' => $request->type,
        ]);

        if ($request->hasFile('image')) {
            $course_cat->addMediaFromRequest('image')
                ->toMediaCollection('thumbnail');
        }

        Session::flash('message', 'Category Added successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    public function update_cat(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($request->id), // Ignore the current user's email
                'max:50',
            ],
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,jfif,svg|max:500',
        ]);
        $course_cat_up = Category::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'type' => $request->type,
        ]);
        $course_cat = Category::where('id', $request->id)->first();
        if ($request->hasFile('image')) {
            $course_cat->clearMediaCollection('thumbnail');
            $course_cat->addMediaFromRequest('image')
                ->toMediaCollection('thumbnail');
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->clearMediaCollection('thumbnail');
        $category->delete();
        Session::flash('message', 'Category Deleted successfully!');
        return redirect()->back();
    }

    public function categories_suspend($id)
    {
        $category = Category::where('id', $id)->first();
        $category->is_active = ($category->is_active == 1) ? 0 : 1;
        $category->save();
        $message = ($category->is_active == 1) ? 'Category Activated successfully!' : 'Category Suspended successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }
}
