<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.pages.profile.index');

    }
    public function edit()
    {
        return view('frontend.pages.profile.edit');

    }
    public function profileAddresses()
    {
        return view('frontend.pages.profile.addresses');

    }
    public function profileAddressesEdit(Address $address)
    {
        return view('frontend.pages.profile.createAddress',compact('address'));

    }
    public function profileAddAddresses()
    {
        return view('frontend.pages.profile.createAddress');

    }
    public function orderTracking(Request $request)
    {
        $orders = Order::filterBy($request->all())->where('user_id',auth()->id())->get();
        return view('frontend.pages.orders.tracking',compact('orders'));
    }

    public function wishlist()
    {
        $wishlists = auth()->user()->wishlists;
        return view('frontend.pages.profile.wishlist', compact('wishlists'));

    }

    public function like(Product $product)
    {
        try {
            if (!auth()->check()){
                return $this->jsonSuccess('', [
                    'redirect' => route('frontend.login'),
                ]);
            }
            $change_fill = true;
            $if_exist_like = Wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->first();
            if (!$if_exist_like) {
                Wishlist::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id()
                ]);
            } else {
                $if_exist_like->delete();
                $change_fill = false;
            }
            $message = $change_fill ? trans('backend.messages.success.added_to_favorites') : trans('backend.messages.success.removed_from_favorites');
            return $this->jsonSuccess($message, [
                'change_fill' => $change_fill
            ]);
        } catch (\Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }
    }

    public function profileUpdate(ProfileRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $user->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
            ]);

            $user->info()->update([
                'id_two' => $data['id_user'],
                'english_first_name' => isset($data['english_first_name']) ? $data['english_first_name'] : null,
                'english_last_name' => isset($data['english_last_name']) ? $data['english_last_name'] : null,
                'date_of_birth_day' => $data['date_of_birth_day'].$data['date_of_birth_month'].$data['date_of_birth_year'],
                'nickname' => isset($data['nickname']) ? $data['nickname'] : null,
                'register_gender' => isset($data['register_gender']) ? $data['register_gender'] :null,
                'date_of_anniversary_day' => $data['date_of_anniversary_day'].$data['date_of_anniversary_month'].$data['date_of_anniversary_year'],
                'get_our_site' => $data['get_our_site'],
                'referrer' => isset($data['referrer']) ? $data['referrer'] :null,
            ]);
            if (isset($data['password'])) {
                $user->fill([
                    'password' => Hash::make($data['password']),
                ])->save();
            }
            DB::commit();
            return $this->jsonSuccess(trans('backend.messages.success.profile'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }

    }
    public function newAddress(Request $request)
    {
        $data  =  $request->all();
        try {
            auth()->user()->addresses()->create([
                'address_label' => $data['address_label'],
                'name_recipient' => $data['name_recipient'],
                'address_country' => $data['address_country'],
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'address_city' => $data['address_city'],
                'address_state' => $data['address_state'],
                'address_postal_code' => $data['address_postal_code'],
                'telephone_prefix' =>isset($data['telephone_select_inp_prefix']) ? $data['telephone_select_inp_prefix'] : null,
                'telephone' =>isset($data['telephone_select_inp_prefix']) ? $data['telephone_select_inp_val'] :null,
                'mobile_telephone_prefix' => $data['mobile_telephone_prefix'],
                'mobile_telephone' => $data['mobile_telephone'],
                'set_default' => $data['set_default'] === "true" ? '1' : '0',
            ]);
            return $this->jsonSuccess(trans('backend.messages.success.profile'),[
                'redirect'=>route('frontend.profile.addresses')
            ]);
        } catch (\Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }

    }
    public function profileAddressesUpdate(Address $address,Request $request)
    {
        $data  =  $request->all();
        try {
            auth()->user()->addresses()->where('id',$address->id)->update([
                'address_label' => $data['address_label'],
                'name_recipient' => $data['name_recipient'],
                'address_country' => $data['address_country'],
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'address_city' => $data['address_city'],
                'address_state' => $data['address_state'],
                'address_postal_code' => $data['address_postal_code'],
                'telephone_prefix' =>isset($data['telephone_select_inp_prefix']) ? $data['telephone_select_inp_prefix'] : null,
                'telephone' =>isset($data['telephone_select_inp_prefix']) ? $data['telephone_select_inp_val'] :null,
                'mobile_telephone_prefix' => $data['mobile_telephone_prefix'],
                'mobile_telephone' => $data['mobile_telephone'],
                'set_default' => $data['set_default'] === "true" ? '1' : '0',
            ]);
            return $this->jsonSuccess(trans('backend.messages.success.profile'),[
                'redirect'=>route('frontend.profile.addresses')
            ]);
        } catch (\Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }

    }
    public function deleteAddress(Request $request)
    {
        $ids = $request->get('ids');
        try {
            auth()->user()->addresses()->whereIn('id',$ids)->delete();
            return $this->jsonSuccess(trans('backend.messages.success.profile'));
        } catch (\Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }

    }
    public function deleteOrder(Order $order)
    {
        try {
            auth()->user()->orders()->where('id',$order->id)->delete();
            return $this->jsonSuccess(trans('backend.messages.success.delete'));
        } catch (\Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }

    }
}
