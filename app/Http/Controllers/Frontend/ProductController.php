<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function detail(Product $product)
    {
        $qty_product = 0;
        $review_status = null;
        if (auth()->check() && auth()->user()?->cart?->infos->where('product_id', $product->id)->first())
            $qty_product = auth()->user()?->cart?->infos->where('product_id', $product->id)->first()->qty;

        $cart = session()->get('carts', []);
        if (!auth()->check() && isset($cart[$product->id]))
            $qty_product = $cart[$product->id]['quantity'];

        if (auth()->check()) {
            $review_status = Order::where('user_id', auth()->id())->whereHas('products', function ($query) use ($product) {
                $query->where('product_id', $product->id);
            })->first();
        }
        $similar_products = Product::with('badges')->where('category_id', $product->category_id)->limit(20)->get();
        $this->recentView($product);
        return view('frontend.pages.products.single_product', compact('product',
            'similar_products', 'qty_product', 'cart','review_status'));
    }

    public function recentView($product)
    {
        $recentView = session()->get('recentView', []);
        if (!isset($recentView[$product->id])) {
            $recentView[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'quantity' => 1,
                'combination_id' => $product->main()->id,
                'price' => $product->main()->pivot->price,
                'maximum_quantity' => $product->main()->pivot->maximum_quantity,
                'discount_price' => $product->main()->pivot->discount_price,
                'image' => $product->first_from_images,
            ];
        }
        session()->put('recentView', $recentView);
    }

    public function popupDate(Product $product)
    {
        $auth = auth()->check();
        if ($auth)
            Cart::updateOrCreate(['user_id' => auth()->id()], ['user_id' => auth()->id()]);

        $carts_products = $auth ? auth()->user()->cart?->infos : session()->get('carts', []);
        try {
            return $this->jsonSuccess('', [
                'images' => $product->files,
                'name' => $product->name,
                'qtybutton_url' => route('frontend.incrementDecrementBasketTwo', ['product' => $product->id]),
                'like_url' => route('frontend.like', ['product' => $product]),
                'add_basket_url' => route('frontend.addBasket', ['product' => $product]),
                'combination_id' => $product->main()->pivot->id,
                'content' => translation($product)->text,
                'qty_cart' => $auth ? ($carts_products->where('product_id', $product->id)->first() ? $carts_products->where('product_id', $product->id)->first()->qty : 0) : (isset($carts_products[$product->id]) ? $carts_products[$product->id]['quantity'] : 0),
                'discount_price' => $product->main()->pivot->discount_price,
                'price' => $product->main()->pivot->price,
                'sku' => $product->main()->pivot->sku,
                'rate' => 10,
            ],
            );
        } catch (\Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }
    }
}
