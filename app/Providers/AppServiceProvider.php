<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Color;
use App\Models\Language;
use App\Models\News;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;
use App\Models\Writer;
use App\Models\Writing;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'user' => User::class,
            'category' => Category::class,
            'brand' => Brand::class,
            'color' => Color::class,
            'product' => Product::class,
            'slider' => Slider::class,
            'setting' => Setting::class,
            'blog' => Blog::class,
            'banner' => Banner::class,
            'language' => Language::class,
            'campaign' => Campaign::class,
        ]);
    }
}
