<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $perPage = $request->input('per_page', 12);
        $products = Product::filterBy($request->all())->paginate($perPage)->withQueryString();
        return view('frontend.pages.search.index',compact('products'));
    }
}
