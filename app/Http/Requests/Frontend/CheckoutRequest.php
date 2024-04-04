<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CheckoutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $return [] = [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'address_name' => 'required',
            'new_address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'note' => 'required',
            'payment_method' => 'required',
        ];

        return Arr::collapse($return);

    }

}
