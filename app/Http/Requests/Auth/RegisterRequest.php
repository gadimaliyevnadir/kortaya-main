<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'        => 'required|email|max:40|unique:users,email',
            'password'     =>  ['required', 'string', 'min:8'],
            'id_user'     => 'required',
            'first_name'     => 'required',
            'last_name'     => 'required',
            'english_first_name'     => 'nullable',
            'english_last_name'     => 'nullable',
            'address_country'     => 'required',
            'address_line_1'     => 'required',
            'address_line_2'     => 'required',
            'address_city'     => 'required',
            'address_state'     => 'required',
            'address_postal_code'     => 'required',
            'address_postal_code_check'     => 'required',
            'telephone_select_inp_prefix'     => 'nullable',
            'telephone_select_inp_val'     => 'nullable',
            'mobile_telephone_prefix'     => 'required',
            'mobile_telephone'     => 'required',
            'date_of_birth_day'     => 'required',
            'date_of_birth_month'     => 'required',
            'date_of_birth_year'     => 'required',
            'nickname'     => 'nullable',
            'register_gender'     => 'nullable',
            'date_of_anniversary_day'     => 'required',
            'date_of_anniversary_month'     => 'required',
            'date_of_anniversary_year'     => 'required',
            'get_our_site'     => 'required',
            'referrer'     => 'nullable',
            'user_agreement'     => 'required',
            'privacy_policy'     => 'required',
            'register_sms'     => 'required',
            'register_email'     => 'required',
        ];
    }
    public function attributes()
    {
        return [

            'email'        => trans('frontend.labels.email'),
            'password'     => trans('frontend.labels.password'),
        ];
    }
}
