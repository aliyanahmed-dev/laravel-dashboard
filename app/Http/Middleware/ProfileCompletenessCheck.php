<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileCompletenessCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user(); // Get the currently authenticated user

        if ($user) {
            // Check if any of the required fields are empty
            if (empty($user->guardian_name) || empty($user->guardian_name) || empty($user->guardian_number) || empty($user->cnic_number)) {
                // Redirect or return a response indicating the profile is incomplete
                return redirect()->route('profile_update')->with('error', 'Please complete your profile before accessing the dashboard.');
            }
        }

        return $next($request);
    }
}
