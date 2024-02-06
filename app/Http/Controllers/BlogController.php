<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog-management.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->where('type', 'blog')->get();
        return view('admin.blog-management.add')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|unique:blogs|string|max:50',
            'category' => 'required',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,jfif,svg|max:500',
        ]);
        $user = Auth::user();
        $blog =  Blog::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'category_id' => $request->category,
            'user_id' => $user->id,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);
        // dd($request->image);

        $blog->addMediaFromRequest('image')
            ->toMediaCollection('thumbnail');

        Session::flash('message', 'Blog created successfully!');

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::where('is_active', 1)->where('type', 'blog')->get();
        return view('admin.blog-management.edit')->with(compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $current_blog = Blog::where('id', $blog->id)->first();
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('blogs')->ignore($blog->id), // Ignore the current user's email
                'max:50',
            ],
            'category' => 'required',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,jfif,svg|max:500',
        ]);

        $course =  Blog::where('id', $current_blog->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'category_id' => $request->category,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);



        if ($request->hasFile('image')) {
            $current_blog->clearMediaCollection('thumbnail');
            $current_blog->addMediaFromRequest('image')
                ->toMediaCollection('thumbnail');
        }
        Session::flash('message', 'Blog Updated successfully!');

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->clearMediaCollection('thumbnail');
        $blog->delete();
        Session::flash('message', 'Blog Deleted successfully!');
        return redirect()->back();
    }

    public function suspend(Blog $blog)
    {

        $blog->is_active = ($blog->is_active == 1) ? 0 : 1;
        $blog->save();
        $message = ($blog->is_active == 1) ? 'Blog Activated successfully!' : 'Blog Suspended successfully!';
        Session::flash('message', $message);
        return redirect()->back();
    }

    public function category()
    {
        $categories = Category::where('type', 'blog')->get();
        return view('admin.blog-management.category')->with(compact('categories'));
    }
}
