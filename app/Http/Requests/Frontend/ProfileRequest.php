<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email'        => 'required|email|max:40|unique:users,email,' . auth()->id(),
            'first_name'     => 'required',
            'last_name'     => 'required',
            'password'     =>  ['nullable', 'string', 'min:8', 'confirmed'],
            'id_user'     => 'required',
            'english_first_name'     => 'required',
            'english_last_name'     => 'required',
            'date_of_birth_day'     => 'required',
            'date_of_birth_month'     => 'required',
            'date_of_birth_year'     => 'required',
            'nickname'     => 'required',
            'register_gender'     => 'required',
            'date_of_anniversary_day'     => 'required',
            'date_of_anniversary_month'     => 'required',
            'date_of_anniversary_year'     => 'required',
            'referrer'     => 'required',
            'get_our_site'     => 'required',
        ];
    }
}
