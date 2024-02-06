<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class LocalizationController extends Controller
{
    public function change(Request $request,$tolocale) {
        
        if (!in_array($tolocale, ['en', 'ar'])){
            $tolocale = 'en';
        }
        Session::put('locale', $tolocale);
        app()->setLocale($tolocale);


        //$segments = str_replace(url('/'), '', url()->previous());
        //$segments = array_filter(explode('/', $segments));
        //array_shift($segments);
        //array_unshift($segments, $tolocale);
        //return url()->previous();
        //return redirect()->to(implode('/', $segments));
        return redirect()->route('home', ['locale' => $tolocale]);
    }
}
