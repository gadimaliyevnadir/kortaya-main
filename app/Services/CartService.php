<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function incrimentDicrimentBasketDBTwo($product, $data)
    {
        $cart = Cart::updateOrCreate(['user_id' => auth()->id()], ['user_id' => auth()->id()]);
        $info = $cart->infos->where('combination_id', $data['combination'])->where('product_id', $product->id)->first();
        if ($info) {
            $info->qty = ($data['type'] == 'increment') ? ($info->qty + 1) : ($info->qty - 1);
            $info->save();
            if ($info->qty <= 0) {
                $info->delete();
            }
        } else {
            $cart->infos()->create([
                'product_id' => $product->id,
                'combination_id' => $product->main()->pivot->id,
                'price' => $product->main()->pivot->price,
                'discount_price' => $product->main()->pivot->discount_price,
                'total_price' => $product->main()->pivot->discount_price,
                'qty' => 1,
            ]);
        }
        $cart = auth()->user()->cart?->infos()->get();
        return   [
            'cart'=>$cart,
        ];
    }

    public function incrimentDicrimentBasketSessionTwo($product, $data)
    {
        $cart = session()->get('carts', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = ($data['type'] == 'increment') ? ($cart[$product->id]['quantity'] + 1) : ($cart[$product->id]['quantity'] - 1);
            if ($cart[$product->id]['quantity'] == 0) {
                unset($cart[$product->id]);
            }
        } else {
            $cart[$product->id] = [
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
        session()->put('carts', $cart);
        $cart = session()->get('carts', []);
        return [
            'cart'=>$cart,
        ];
    }


}
