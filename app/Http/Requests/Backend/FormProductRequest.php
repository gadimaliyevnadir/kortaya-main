<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang){
            $this->merge([
                'keywords:' . $lang['code'] => request('keywords:'.$lang['code']) ?  implode(', ', array_column(json_decode(request('keywords:'.$lang['code'])), 'value')) : null,
            ]);
        }

        $this->merge([
//             'discount_price' => !empty(request('discount_number')) && (request('discount_number') < request('price')) ? (request('price') - request('discount_number')) : null,
             'outlet' => $this->has('outlet') ? 1 : 0,
             'status' => $this->has('status') ? '1' : '0',
             'quantity_type' =>  1,
        ]);

    }

    public function rules()
    {
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });
        foreach ($active_langs as $lang) {
            $return[] = [
                'text:' . $lang['code'] => ['nullable'],
                'meta_title:' . $lang['code'] => ['required', 'string', 'max:255'],
                'meta_description:' . $lang['code'] => ['required', 'string', 'max:255'],
                'meta_keywords:' . $lang['code'] => ['required', 'string'],
            ];
        }

        $return[] = [
            'name'          => 'required|max:255',
            'slug'          => ['max:255', Rule::unique('products','slug')],
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,|max:2048',
            'badges' => 'nullable',
            'badges.*' => 'exists:badges,id',
            'options' => 'nullable',
            'options.*' => 'exists:options,id',
            'colors' => 'required',
            'colors.*' => 'required',
            'statuses' => 'nullable',
            'statuses.*' => 'exists:product_statuses,id',
//            'price' => 'required|numeric',
//            'discount_number' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
//            'discount_price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'weight' => 'nullable',
            'length' => 'nullable',
            'height' => 'nullable',
            'maximum_quantity' => 'required',
            'width' => 'nullable',
            'quantity_type' => 'nullable',
            'outlet' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'slug' => ['required','max:255'],
                'image' => 'filled',
            ];
        }


        return Arr::collapse($return);
    }
}
