<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\OrderType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        if (auth()->user()?->cart?->infos->count() == 0)
            return redirect()->route('frontend.dashboard');

        return view('frontend.pages.checkout.index');

    }


    public function save(CheckoutRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $order = Order::create([
                'email' => $user->email,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'company_name' => $data['company_name'],
                'address_name' => $data['address_name'],
                'new_address' => $data['new_address'],
                'total_amount' => 0,
                'phone' => $data['phone'],
                'note' => $data['note'],
                'payment_method' => $data['payment_method'],
                'user_id' => $user->id,
                'order_status_id' => OrderType::AWAITING_PAYMENT,
                'ip_address' => ipfind(),
            ]);
            $subtotal_curd = 0;
            foreach (auth()->user()?->cart?->infos as $cart_product) {
                $subtotal_curd += ($cart_product->product->main()->pivot->discount_price * $cart_product->qty);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'combination_id' => $cart_product->combination_id,
                    'product_id' => $cart_product->product_id,
                    'qty' => $cart_product->qty,
                    'discount_price' => $cart_product->product->main()->pivot->discount_price,
                    'total_price' => $cart_product->product->main()->pivot->discount_price * $cart_product->qty,
                ]);
            }
            $order->total_amount = $subtotal_curd;
            $order->save();
            auth()->user()->cart->delete();
            DB::commit();
            $url = ($data['payment_method'] == 1) ? route('frontend.dashboard') : route('frontend.dashboard');
            return $this->jsonSuccess('', [
                'redirect' => $url,
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            info($e->getMessage());
            return $this->jsonSuccess($e->getMessage());
        }
    }


    public function approved(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = json_decode(file_get_contents('php://input'), true);
            if (!empty($data['code']) && $data['code'] == '00000') {
                $order_id = $data['payload']['orderDescription'];
                $order = Order::findOrFail($order_id);
                $option = $order->package->expiration_date;
                switch ($option) {
                    case OrderTime::FOR_A_MONTH:
                        $order->expiration_date = now()->addMonths(1);
                        break;
                    case OrderTime::FOR_3_MONTHS:
                        $order->expiration_date = now()->addMonths(3);
                        break;
                    case OrderTime::FOR_A_YEAR:
                        $order->expiration_date = now()->addYears(1);
                        break;

                    default:
                        $order->expiration_date = null;
                        break;
                }
                $order->order_status_id = \App\Enums\OrderType::APPROVED;
                $order->save();
            }
        }

        return view('frontend.payment.success');
    }

    public function declined(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = json_decode(file_get_contents('php://input'), true);

            if (!empty($data['code']) && $data['code'] != '00000') {
                $order_id = $data['payload']['orderDescription'];
                $order = Order::findOrFail($order_id);
                $order->update(['order_status_id' => \App\Enums\OrderType::FAILED]);
            }
        }

        return view('frontend.payment.error');
    }

    public function canceled(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = json_decode(file_get_contents('php://input'), true);
            if (!empty($data['code']) && $data['code'] != '00000') {
                $order_id = $data['payload']['orderDescription'];
                $order = Order::findOrFail($order_id);
                $order->update(['order_status_id' => \App\Enums\OrderType::CANCELLED]);
            }
        }

        return view('frontend.payment.error');
    }
}
