<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Session;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return View('admin.pages.gallery-page', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galleries = Gallery::all();
        return View('admin.pages.gallery',compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $gallery = new Gallery();
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        
        if ($request->hasFile('gallery_image')) {
            $gallery->addMediaFromRequest('gallery_image')
                 ->toMediaCollection('gallery_image');
        }
        $gallery->save();

        Session::flash('message', 'Gallery create successfully!'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $galleries = Gallery::all();
        return View('admin.pages.gallery',compact('gallery','galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //dd($request);
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        
        if ($request->hasFile('gallery_image')) {
            $gallery->clearMediaCollection('gallery_image');
            $gallery->addMediaFromRequest('gallery_image')
                 ->toMediaCollection('gallery_image');
        }
        $gallery->update();

        Session::flash('message', 'Gallery Updated successfully!'); 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        Session::flash('message', 'Gallery Deleted successfully!'); 
        return redirect()->back();
    }

    public function web_gallery()
    {
        $gallery = Gallery::all();
        // return View('web.gallery',compact('gallery'));
    }
}
