<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDay;
use App\Models\ProductStatus;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->get();
        $statuses = ProductStatus::active()->with(['products' => function ($query) {
            $query->active()->latest()->limit(100);
        }])->get();
        $categoriesAll_best_products = Cache::rememberForever('categoriesAll_best_products', function () {
            return Category::active()->with(['products' => function ($query) {
                $query->whereHas('productStatuses', function ($query) {
                    $query->where('code','best_products');
                })->active()->latest()->limit(100);
            }])->get();
        });
        $categoriesAll_new_products = Cache::rememberForever('categoriesAll_new_products', function () {
            return Category::active()->with(['products' => function ($query) {
                $query->whereHas('productStatuses', function ($query) {
                    $query->where('code','new_products');
                })->active()->latest()->limit(100);
            }])->get();
        });
        $products_day = ProductDay::active()->get();
        $settings_four = Setting::whereIn('code', ['free_shipping', 'support', 'money_return', 'onevery_order'])->get();
        $weekly_products = $statuses->whereIn('code', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
        $products_by_day = [
            'new_arrivals' => $statuses->where('code', 'new_arrivals')->first()?->products->whereIn('id', $products_day->pluck('product_id')->toArray()),
            'best_sellers' => $statuses->where('code', 'best_sellers')->first()?->products->whereIn('id', $products_day->pluck('product_id')->toArray()),
            'sale_items'   => $statuses->where('code', 'sale_items')->first()?->products->whereIn('id', $products_day->pluck('product_id')->toArray())
        ];
        return view('frontend.index', compact('sliders', 'statuses','categoriesAll_best_products','categoriesAll_new_products',
            'settings_four', 'weekly_products', 'products_day','products_by_day'));
    }

    public function recentView()
    {
        return view('frontend.pages.recent.index');
    }

    public function recentViewDelete(Product $product)
    {
        $recentView = session()->get('recentView');
        if (isset($recentView[$product->id])) {
            unset($recentView[$product->id]);
            session()->put('recentView', $recentView);
        }
        return $this->jsonSuccess('Product deleted ');
    }


}
