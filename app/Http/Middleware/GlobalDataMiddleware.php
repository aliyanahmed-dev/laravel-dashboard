<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Page;

class GlobalDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {
        $page = Page::where('name', 'setting')->first();
        $setting = $page->getMeta('setting');
        // dd($setting);
        // Add your global data here
        // $globalData = [
        //     'siteName' => 'My Laravel App',
        //     'version' => '1.0.0',
        // ];

        // Share the global data with all views
        \View::share('globalData', $setting);

        return $next($request);
    }

}
