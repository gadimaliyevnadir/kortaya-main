<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public $cart;
    public $add_check = true;
    public $subtotal;

    public function index()
    {

        return view('frontend.pages.cart.index');
    }

    public function addBasket(Request $request, Product $product)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $auth_check = auth()->check();
            $auth_check ? $this->addBasketDB($product, $data) : $this->addBasketSession($product);
            DB::commit();
            return $this->jsonSuccess('Product added to cart', [
                'cart' => $this->cart,
                'product' => [
                    'image' => $product->first_image,
                    'name' => $product->name,
                    'discount' => $product->main()->pivot->discount_price,
                    'price' => $product->main()->pivot->price,
                    'url' => route('frontend.deleteItemBasket', ['product' => $product->id])
                ],
                'check' => $this->add_check,
                'subtotal' => $this->subtotal . '$',
                'count' => $auth_check ? $this->cart->count() : count($this->cart),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }
    }

    public function addBasketSession($product)
    {
        $cart = session()->get('carts', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            $this->add_check = false;
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
        $this->cart = $cart;
        $totalDiscount = 0;
        foreach ($cart as $item) {
            $totalDiscount += $item['discount_price'] * $item['quantity'];
        }
        $this->subtotal = $totalDiscount;
    }

    public function addBasketDB($product, $data)
    {
        $cart = Cart::updateOrCreate(['user_id' => auth()->id()], ['user_id' => auth()->id()]);
        $info = $cart->infos->where('combination_id', $data['combination'])->where('product_id', $product->id)->first();
        if ($info) {
            $info->qty = ($info->qty + 1);
            $info->save();
            $this->add_check = false;
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
        $this->cart = $cart->infos()->get();
        $totalDiscount = 0;
        foreach ($this->cart as $item) {
            $totalDiscount += $item->discount_price * $item->qty;
        }
        $this->subtotal = $totalDiscount;
    }

    public function deleteItem(Product $product)
    {
        if (auth()->check()) {
            $cart_product = auth()->user()->cart?->infos->where('product_id', $product->id)->first();
            $cart_product->delete();
            $cart = auth()->user()->cart?->infos()->get();
            $this->subtotal = $cart->sum('discount_price');
        } else {
            $cart = session()->get('carts');
            if (isset($cart[$product->id])) {
                unset($cart[$product->id]);
                session()->put('carts', $cart);
            }
            $cart = session()->get('carts');
            $totalDiscount = 0;
            foreach ($cart as $item) {
                $totalDiscount += $item['discount_price'] * $item['quantity'];
            }
            $this->subtotal = $totalDiscount;
        }

        return $this->jsonSuccess('Product deleted ', [
            'carts' => $cart,
            'subtotal' => $this->subtotal . '$',
            'total' => $this->subtotal - 15 . '$',
            'count' => auth()->check() ? $cart->count() : count($cart),
        ]);
    }


    public function incrementDecrementBasket(Request $request, Product $product)
    {
        $data = $request->all();
        $auth_check = auth()->check();
        $data = $auth_check ? $this->incrimentDicrimentBasketDB($product, $data) : $this->incrimentDicrimentBasketSession($product, $data);
        return $this->jsonSuccess('Cart changes', [
            'carts' => $data['cart'],
            'delete' => $data['delete_product'],
            'subtotal' => $this->subtotal . '$',
            'total' => $this->subtotal - 15 . '$',
            'total_price_product' => $data['total_price_product'] . '$',
            'count' => $auth_check ? $data['cart']->count() : count($data['cart']),
        ]);
    }
    public function incrementDecrementBasketTwo(Request $request, Product $product,CartService $cartService)
    {
        $data = $request->all();
        $auth_check = auth()->check();
        if (($data['type'] == 'increment') && !$this->checkMaxCountFromIncrement($product))
            return $this->jsonError('', ['message_error' => 'satış üçün maksimum miqdar ' . $product->maximum_quantity], 500);

        $data = $auth_check ? $cartService->incrimentDicrimentBasketDBTwo($product, $data) : $cartService->incrimentDicrimentBasketSessionTwo($product, $data);
        return $this->jsonSuccess('Cart changes', [
            'carts' => $data['cart'],
            'count' => $auth_check ? $data['cart']->count() : count($data['cart']),
        ]);
    }
    public function checkMaxCountFromIncrement($product)
    {
        if (auth()->user()->cart->infos->count() > 0) {
            $maxCount = auth()->user()->cart->infos->where('product_id', $product->id)->sum('qty');
            if (($maxCount + 1) > $product->maximum_quantity) {
                return false;
            }
        }
        return true;
    }

    public function incrimentDicrimentBasketDB($product, $data)
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        $delete_product = false;
        $cart_product = $cart->infos->where('combination_id', $data['combination'])->where('product_id', $product->id)->first();
        if (($data['type'] == 'increment') && !$this->checkMaxCountFromIncrement($product)) {
            return $this->jsonError('', [
                'message_error' => 'satış üçün maksimum miqdar    ' . $product->maximum_quantity
            ], 500);
        }
        $cart_product->qty = ($data['type'] == 'increment') ? ($cart_product->qty + 1) : ($cart_product->qty - 1);
        $cart_product->save();
        $total_price_product = $cart_product->product->main()->pivot->qty * $cart_product->product->main()->pivot->discount_price;
        if ($cart_product->qty <= 0) {
            $delete_product = true;
            $cart_product->delete();
        }
        $cart = auth()->user()->cart?->infos()->get();
        $totalDiscount = 0;
        foreach ($cart as $item) {
            $totalDiscount += $item->discount_price * $item->qty;
        }
        $this->subtotal = $totalDiscount;
        return   [
            'total_price_product'=>$total_price_product,
            'delete_product'=>$delete_product,
            'cart'=>$cart,
        ];
    }

    public function incrimentDicrimentBasketSession($product, $data)
    {
        $cart = session()->get('carts', []);
        $delete_product = false;
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = ($data['type'] == 'increment') ? ($cart[$product->id]['quantity'] + 1) : ($cart[$product->id]['quantity'] - 1);
        }
        $total_price_product = $cart[$product->id]['quantity'] * $cart[$product->id]['discount_price'];
        if ($cart[$product->id]['quantity'] == 0) {
            unset($cart[$product->id]);
            $delete_product = true;
        }
        session()->put('carts', $cart);
        $cart = session()->get('carts', []);
        $totalDiscount = 0;
        foreach ($cart as $item) {
            $totalDiscount += $item['discount_price'] * $item['quantity'];
        }
        $this->subtotal = $totalDiscount;

        return [
            'total_price_product'=>$total_price_product,
            'delete_product'=>$delete_product,
            'cart'=>$cart,
        ];
    }

}
