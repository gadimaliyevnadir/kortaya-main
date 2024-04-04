<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Cart;
use App\Models\Package;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function loginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            if (auth('web')->attempt($credentials)) {
                $url = redirect_url_by_user();
                if (!$request->ajax()) {
                    return redirect()->route($url);
                }
                $cart_products = session()->get('carts', []);
                $cart = Cart::updateOrCreate(['user_id' => auth()->id()], ['user_id' => auth()->id()]);
                foreach ($cart_products as $item) {
                    $cart->infos()->create([
                        'product_id' => $item['product_id'],
                        'combination_id' => $item['combination_id'],
                        'price' => $item['price'],
                        'discount_price' => $item['discount_price'],
                        'total_price' => $item['discount_price'] * $item['quantity'],
                        'qty' => $item['quantity'],
                    ]);
                }
                session()->put('carts', []);
                return $this->jsonSuccess(trans('backend.messages.success.login'), [
                    'redirect' => route($url),
                ]);
            }
            return $this->jsonError('', [
                'message' => trans('backend.messages.warning.login'),
            ], 500);
        } catch (Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message' => trans('backend.messages.warning.login'),
                'message_error' => trans('backend.messages.warning.login')
            ], 500);
        }
    }

    public function registerForm()
    {
        return view('frontend.auth.register_form');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user->info()->create([
                'id_two' => $data['id_user'],
                'english_first_name' => isset($data['english_first_name']) ? $data['english_first_name'] : null,
                'english_last_name' => isset($data['english_last_name']) ? $data['english_last_name'] : null,
                'date_of_birth_day' => $data['date_of_birth_day'].$data['date_of_birth_month'].$data['date_of_birth_year'],
                'nickname' => isset($data['nickname']) ? $data['nickname'] : null,
                'register_gender' => isset($data['register_gender']) ? $data['register_gender'] :null,
                'date_of_anniversary_day' => $data['date_of_anniversary_day'].$data['date_of_anniversary_month'].$data['date_of_anniversary_year'],
                'get_our_site' => $data['get_our_site'],
                'referrer' => isset($data['referrer']) ? $data['referrer'] :null,
                'user_agreement' =>$data['user_agreement'] === "true" ? '1' : '0',
                'privacy_policy' =>$data['privacy_policy'] === "true" ? '1' : '0',
                'register_sms' =>$data['register_sms'] === "true" ? '1' : '0',
                'register_email' =>$data['register_email'] === "true" ? '1' : '0',
            ]);
            $user->addresses()->create([
                'address_country' => $data['address_country'],
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'address_city' => $data['address_city'],
                'address_state' => $data['address_state'],
                'address_postal_code' => $data['address_postal_code'],
                'telephone' =>isset($data['telephone']) ? $data['telephone_prefix'].$data['telephone'] :null,
                'mobile_telephone' => $data['mobile_telephone_prefix'].$data['mobile_telephone'],
            ]);

            DB::commit();
            Auth::login($user);
            $cart_products = session()->get('carts', []);
            $cart = Cart::updateOrCreate(['user_id' => auth()->id()], ['user_id' => auth()->id()]);
            foreach ($cart_products as $item) {
                $cart->infos()->create([
                    'product_id' => $item['product_id'],
                    'combination_id' => $item['combination_id'],
                    'price' => $item['price'],
                    'discount_price' => $item['discount_price'],
                    'total_price' => $item['discount_price'] * $item['quantity'],
                    'qty' => $item['quantity'],
                ]);
            }
            session()->put('carts', []);
            return $this->jsonSuccess('Registration successfully', [
                'redirect' => route('frontend.dashboard'),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            Auth::logout();
            Log::channel('frontend')->error($e->getMessage());
            return $this->jsonError('', [
                'message_error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        try {
            auth('web')->logout();
            return redirect(route('frontend.login.loginForm'))->withSuccess(trans('backend.messages.success.logout'));
        } catch (Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return back()->withError(trans('backend.messages.error.logout'));
        }
    }
}
