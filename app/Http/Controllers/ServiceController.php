<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return View('admin.pages.services-page',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return View('admin.pages.service',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->parent = $request->parent;
        $service->price = $request->price;
        
        if ($request->hasFile('icon')) {
            $service->addMediaFromRequest('icon')
                 ->toMediaCollection('icons');
        }
        $service->save();

        Session::flash('message', 'Service create successfully!'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $services = Service::all();
        return View('admin.pages.service',compact('services','service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //dd($request);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->parent = $request->parent;
        $service->price = $request->price;
        
        if ($request->hasFile('icon')) {
            $service->clearMediaCollection('icons');
            $service->addMediaFromRequest('icon')->toMediaCollection('icons');
        }
        $service->update();

        Session::flash('message', 'Service Updated successfully!'); 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Session::flash('message', 'Service Deleted successfully!'); 
        return redirect()->back();
    }


    public function web_services()
    {
        $services = Service::all();
        // return View('web.service',compact('services'));
    }

    public function web_services_detail($loc, Service $service)
    {
        // return View('web.service-detail',compact('service'));
    }
}
