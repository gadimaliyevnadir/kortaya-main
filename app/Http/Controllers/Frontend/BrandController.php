<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductStatus;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    public function detail(Brand $brand,Request $request)
    {
        $products = Product::filterBy($request->all())->where('brand_id',$brand->id)->paginate(10)->withQueryString();
        $statuses = ProductStatus::whereIn('code',['todays_best_item','todays_top_viewed_item','items_with_a_high_order_rate','new_item',])
                ->active()->with(['products' => function ($query) use($brand) {
                    $query->active()->where('brand_id',$brand->id)->latest()->limit(100);
                 }])->get();
        return view('frontend.pages.brands.detail',compact('brand','products','statuses'));
    }

}
