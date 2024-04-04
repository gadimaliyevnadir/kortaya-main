<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class AboutController extends Controller
{
    public function about()
    {
        $settings_about = Setting::get();;
//        $settings_about = Setting::whereIn('code', ['free_shipping', 'support', 'money_return', 'onevery_order'])->get();
        return view('frontend.pages.about.index',compact('settings_about'));
    }
}
