<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SettingController extends Controller
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
        $data = $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'string|max:50',
            'phone_2' => 'string|max:50',
            'email' => 'email|max:255',
            'email_2' => 'email|max:255',
            'address' => 'max:255',
            'address_2' => 'max:255',
            'timing' => 'max:255',
            'timing_2' => 'max:255',
            'copyright' => 'max:255',
            'footer_about' => 'max:255',
            'color' => 'string|max:50',
            'color_2' => 'string|max:50',
            'color_3' => 'string|max:50',
            'facebook' => 'max:50',
            'twitter' => 'max:50',
            'instagram' => 'max:50',
            'linkedin' => 'max:50',
            'behance' => 'max:50',
            'pinterest' => 'max:50',
            'youtube' => 'max:50',
        ]);

        $settings = Setting::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'email' => $request->email,
                'phone' => $request->phone,
                'phone_2' => $request->phone_2,
                'email_2' => $request->email_2,
                'address' => $request->address,
                'address_2' => $request->address_2,
                'timing' => $request->timing,
                'timing_2' => $request->timing_2,
                'copyright' => $request->copyright,
                'footer_about' => $request->footer_about,
                'color' => $request->color,
                'color_2' => $request->color_2,
                'color_3' => $request->color_3,
                'color_4' => $request->color_4,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'behance' => $request->behance,
                'pinterest' => $request->pinterest,
                'youtube' => $request->youtube,
            ]
        );



        if ($request->hasFile('logo')) {
            $settings->clearMediaCollection('logo');
            $settings->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        if ($request->hasFile('logo_2')) {
            $settings->clearMediaCollection('logo_2');
            $settings->addMediaFromRequest('logo_2')
                ->toMediaCollection('logo_2');
        }

        if ($request->hasFile('logo_3')) {
            $settings->clearMediaCollection('logo_3');
            $settings->addMediaFromRequest('logo_3')
                ->toMediaCollection('logo_3');
        }

        Session::flash('message', 'Setting Added successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
