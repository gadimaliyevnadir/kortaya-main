<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Language;
use App\Models\OptionGroup;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ShareServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });
        $settings = Cache::rememberForever('settings', function () {
            return Setting::get();
        });
        $brands = Cache::rememberForever('brands', function () {
            return Brand::get();
        });
        $categories = Cache::rememberForever('categories', function () {
            return Category::get();
        });
        $option_groups = Cache::rememberForever('option_groups', function () {
            return OptionGroup::get();
        });
        $banners = Cache::rememberForever('banners', function () {
            return Banner::active()->get();
        });
        $campaigns = Cache::rememberForever('campaigns', function () {
            return  Campaign::with(['detail'])->get();
        });
        $best_items = Cache::rememberForever('best_items', function () {
            return  Product::limit(3)->get();
        });
        View::share([
            'langs' => $active_langs,
            'settings' => $settings,
            'brands' => $brands,
            'categories' => $categories,
            'option_groups' => $option_groups,
            'banners' => $banners,
            'campaigns' => $campaigns,
            'best_items' => $best_items,
        ]);

    }

    public function register()
    {
    }
}
