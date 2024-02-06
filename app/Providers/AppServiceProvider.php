<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $websiteCustomization = Setting::first();
        if (isset($websiteCustomization)) {
            if ($websiteCustomization->hasMedia('logo')) {
                $logo = $websiteCustomization->getFirstMediaUrl('logo');
            } else {
                $logo = null;
            }
            if ($websiteCustomization->hasMedia('logo_2')) {
                $logo_2 = $websiteCustomization->getFirstMediaUrl('logo_2');
            } else {
                $logo_2 = null;
            }
            if ($websiteCustomization->hasMedia('logo_3')) {
                $logo_3 = $websiteCustomization->getFirstMediaUrl('logo_3');
            } else {
                $logo_3 = null;
            }

            $config = [
                'logo' => $logo,
                'logo_2' => $logo_2,
                'logo_3' => $logo_3,
                'email' => $websiteCustomization->email,
                'phone' => $websiteCustomization->phone,
                'phone_2' => $websiteCustomization->phone_2,
                'email_2' => $websiteCustomization->email_2,
                'address' => $websiteCustomization->address,
                'address_2' => $websiteCustomization->address_2,
                'timing' => $websiteCustomization->timing,
                'timing_2' => $websiteCustomization->timing_2,
                'copyright' => $websiteCustomization->copyright,
                'footer_about' => $websiteCustomization->footer_about,
                'color' => $websiteCustomization->color,
                'color' => $websiteCustomization->color,
                'color_2' => $websiteCustomization->color_2,
                'color_3' => $websiteCustomization->color_3,
                'color_4' => $websiteCustomization->color_4,
                'facebook' => $websiteCustomization->facebook,
                'twitter' => $websiteCustomization->twitter,
                'instagram' => $websiteCustomization->instagram,
                'linkedin' => $websiteCustomization->linkedin,
                'behance' => $websiteCustomization->behance,
                'pinterest' => $websiteCustomization->pinterest,
                'youtube' => $websiteCustomization->youtube,
            ];
        } else {
            $config = [
                'logo' => null,
                'logo_2' => null,
                'logo_3' => null,
                'email' => null,
                'phone' => null,
                'phone_2' => null,
                'email_2' => null,
                'address' => null,
                'address_2' => null,
                'timing' => null,
                'timing_2' => null,
                'copyright' => null,
                'footer_about' => null,
                'color' => null,
                'color' => null,
                'color_2' => null,
                'color_3' => null,
                'color_4' => null,
                'facebook' => null,
                'twitter' => null,
                'instagram' => null,
                'linkedin' => null,
                'behance' => null,
                'pinterest' => null,
                'youtube' => null,
            ];
        }
        view()->share('setting', $config);
    }
}
