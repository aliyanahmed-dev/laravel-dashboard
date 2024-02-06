<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Zoha\MetableModel;
use App\Models\Page;
use Session;
use App\Models\Service;

class PageController extends Controller
{
    public function submitHome(Request $request)
    {
        $files = $request->file();
        $page = Page::where('name', 'home')->first();
        $homemeta = $page->getMeta('home');
        $req = $request->all();
        $uploadedImages = $homemeta['uploadedImages'] ?? [];
        
        foreach($uploadedImages as $in => $imgs)
        {
            if(is_array($imgs))
            {
                foreach($imgs as $ind => $images)
                {
                    foreach($images as $nam => $img_value)
                    {
                        //dd([$req[$in], $imgs]);
                        if(isset($req[$in][$ind]['index']))
                        {
                            $oldInx = $req[$in][$ind]['index'];
                            if($oldInx != $ind)
                            {
                                //$page->clearMediaCollection($nam.$ind);
                                $attachment = $page->getMedia($nam.$oldInx);
                                if($attachment)
                                {
                                    $uploadedImages[$in][$ind][$nam] = $attachment[0];
                                }
                            }
                        }
                        else
                        {
                            array_splice($uploadedImages[$in], $ind, 1);
                        }
                        
                    }
                }
            }
        }
        //dd($uploadedImages);

        

        if ($files) {
            foreach ($files as $key => $file) {
                if (is_array($file)) {
                    foreach ($file as $index => $items) {
                        foreach($items as $name => $item)
                        {   
                            $page->clearMediaCollection($name.$index);
                            $attachment = $page->addMedia($item)->toMediaCollection($name.$index);
                            $uploadedImages[$key][$index][$name] = $attachment;
                        }
                        
                    }
                } else {
                    $page->clearMediaCollection($key);
                    $attachment = $page->addMedia($file)->toMediaCollection($key);
                    $uploadedImages[$key] = $attachment;
                }
            }
        }

        

        $req['uploadedImages'] = $uploadedImages;
        $page->setMeta('home', $req);
        return redirect()->route('admin_home');
    }

    public function home(Request $request)
    {
        $page = Page::where('name', 'home')->first();
        if($page){
            $homemeta = $page->getMeta('home');
        }
        if($homemeta){
            return view('admin.pages.home-page')->with('meta', $homemeta);
        } else{
            return view('admin.pages.home-page');
        }
    }
    




    public function submitHome2(Request $request)
    {
        $sliderFiles = $request->file('slider');
        // dd($sliderFiles);
    // $files = $request->file();
        $page = Page::where('name', 'home')->first();
    // $homemeta = $page->getMeta('home');
        $req = $request->all();
        // dd($request->all());
    // $uploadedImages = $homemeta['uploadedImages'] ?? [];
    
    // foreach($uploadedImages as $in => $imgs)
    // {
    //     if(is_array($imgs))
    //     {
    //         foreach($imgs as $ind => $images)
    //         {
    //             foreach($images as $nam => $img_value)
    //             {
    //                 //dd([$req[$in], $imgs]);
    //                 if(isset($req[$in][$ind]['index']))
    //                 {
    //                     $oldInx = $req[$in][$ind]['index'];
    //                     if($oldInx != $ind)
    //                     {
    //                         //$page->clearMediaCollection($nam.$ind);
    //                         $attachment = $page->getMedia($nam.$oldInx);
    //                         if($attachment)
    //                         {
    //                             $uploadedImages[$in][$ind][$nam] = $attachment[0];
    //                         }
                            
                            
    //                     }
    //                 }
    //                 else
    //                 {
    //                     //dd(1);
    //                     array_splice($uploadedImages[$in], $ind, 1);
    //                 }
                    
    //             }
    //         }
    //     }
    // }
    // //dd($uploadedImages);

    
        $SlideImg = [];
        if ($sliderFiles) {
            foreach ($sliderFiles as $key => $file) {
                $bgImg = $file['bg_img'] ?? null;
                $slImg = $file['sl_img'] ?? null;
                if($bgImg){
                    $page->clearMediaCollection('background_images'.$key);
                    $attachment1 = $bgMedia = $page->addMedia($bgImg)->toMediaCollection('background_images'.$key);
                    $SlideImg[$key]['bg_img'] = $attachment1;
                    $req['slider'][$key]['bg_img'] = $attachment1;
                }
                if($slImg){
                    $page->clearMediaCollection('slider_images'.$key);
                    $attachment2 = $slMedia = $page->addMedia($slImg)->toMediaCollection('slider_images'.$key);
                    $SlideImg[$key]['sl_img'] = $attachment2;
                    $req['slider'][$key]['sl_img'] = $attachment2;
                }
            }
        }
        
        // $req['uploadedImages'] = $uploadedImages;
         $page->setMeta('home', $req);
         return redirect()->route('admin_home2');
    }

    public function home2(Request $request)
    {
        $page = Page::where('name', 'home')->first();
        if ($page) {
            $mediaItems = $page->getMedia();
        }
        if($page){
            $homemeta = $page->getMeta('home');
        }
        if($homemeta){
            return view('admin.pages.home-new')->with('meta', $homemeta)->with('mediaItems', $mediaItems);
        } else{
            return view('admin.pages.home-new');
        }
    }




    public function about(Request $request)
    {
        $page = Page::where('name', 'about')->first();
        if($page){
            $homemeta = $page->getMeta('about');
        }

        if($homemeta){
            return view('admin.pages.about-page')->with('meta', $homemeta);
        } else{
            return view('admin.pages.about-page');
        }
    }
    public function submitAbout(Request $request)
    {
        $files = $request->file();
        $page = Page::where('name', 'about')->first();
        $aboutmeta = $page->getMeta('about');
        $req = $request->all();
        $uploadedImages = $aboutmeta['uploadedImages'] ?? [];
        
        foreach($uploadedImages as $in => $imgs)
        {
            if(is_array($imgs))
            {
                foreach($imgs as $ind => $images)
                {
                    foreach($images as $nam => $img_value)
                    {
                        //dd([$req[$in], $imgs]);
                        if(isset($req[$in][$ind]['index']))
                        {
                            $oldInx = $req[$in][$ind]['index'];
                            if($oldInx != $ind)
                            {
                                //$page->clearMediaCollection($nam.$ind);
                                $attachment = $page->getMedia($nam.$oldInx);
                                if($attachment)
                                {
                                    $uploadedImages[$in][$ind][$nam] = $attachment[0];
                                }
                                
                                
                            }
                        }
                        else
                        {
                            //dd(1);
                            array_splice($uploadedImages[$in], $ind, 1);
                        }
                        
                    }
                }
            }
        }
        //dd($uploadedImages);

        

        if ($files) {
            foreach ($files as $key => $file) {
                if (is_array($file)) {
                    foreach ($file as $index => $items) {
                        foreach($items as $name => $item)
                        {   
                            $page->clearMediaCollection($name.$index);
                            $attachment = $page->addMedia($item)->toMediaCollection($name.$index);
                            $uploadedImages[$key][$index][$name] = $attachment;
                        }
                        
                    }
                } else {
                    $page->clearMediaCollection($key);
                    $attachment = $page->addMedia($file)->toMediaCollection($key);
                    $uploadedImages[$key] = $attachment;
                }
            }
        }

        

        $req['uploadedImages'] = $uploadedImages;
        $page->setMeta('about', $req);
        return redirect()->route('admin_about');
    }


    public function settings()
    {
        $page = Page::where('name', 'setting')->first();
        if($page){
            $settingmeta = $page->getMeta('setting');
        }
        
        if($settingmeta){
            return view('admin.pages.settings')->with('meta', $settingmeta);
        } else{
            return view('admin.pages.settings');
        }
    }
    public function submitSettings(Request $request)
    {
        $req = $request->all();
        $page = Page::where('name', 'setting')->first();
        
        if($req && $page){
            $page->setMeta('setting', $req);
            Session::flash('message', 'Service create successfully!'); 
            return redirect()->back();
        }

        Session::flash('message', 'Service create Failed!'); 
        return redirect()->back();
    }
    




    // For Web Start
    public function web_home()
    {
        $page = Page::where('name', 'home')->first();
        if ($page) {
            $mediaItems = $page->getMedia();
        }
        if($page){
            $homemeta = $page->getMeta('home');
        }
        if($homemeta){
            $data = json_decode($page->metarelation[0]->value, true);
            // return view('web.home')->with('data', $data)->with('mediaItems', $mediaItems);
            // return view('admin.pages.home-new')->with('meta', $homemeta)->with('mediaItems', $mediaItems);
        } else{
            // return view('web.home');
            // return view('admin.pages.home-new');
        }
    }

    public function web_about()
    {
        $page = Page::where('name', 'about')->first();
        if ($page) {
            $mediaItems = $page->getMedia();
        }
        if($page){
            $homemeta = $page->getMeta('about');
        }
        if($homemeta){
            $data = json_decode($page->metarelation[0]->value, true);
            // return view('web.about-us')->with('data', $data)->with('mediaItems', $mediaItems);
        } else{
            // return view('web.about-us');
        }
    }

    public function web_booking()
    {
        $services = Service::all();
        $page = Page::where('name', 'setting')->first();
        if($page){
            $homemeta = $page->getMeta('setting');
        }
        if($homemeta){
            $data = json_decode($page->metarelation[0]->value, true);
            // return view('web.book-an-appointment',compact('services'))->with('data', $data);
        } else{
            // return view('web.book-an-appointment',compact('services'));
        }
    }
    // For Web End
}
