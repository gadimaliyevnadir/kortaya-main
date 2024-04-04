<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormBrandRequest extends FormRequest
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
                'meta_keywords:' . $lang['code'] => request('meta_keywords:'.$lang['code']) ?  implode(', ', array_column(json_decode(request('meta_keywords:'.$lang['code'])), 'value')) : null,
            ]);
        }

        $this->merge([
            'status' => $this->has('status') ? '1' : '0',
        ]);
    }


    public function rules()
    {
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang){
            $return[] = [
                'meta_title:' . $lang['code'] => ['required', 'max:255'],
                'meta_keywords:' . $lang['code'] => ['required', 'max:255'],
                'meta_description:' . $lang['code'] => ['required', 'max:255'],
            ];
        }

        $return[] = [
            'name'          => 'required|max:60',
            'slug'  => ['max:255', Rule::unique('brands','slug')],
            'image'         => 'required',
            'image.*'         => 'image',
            'status' => ['required'],
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'slug' => ['required','max:255',Rule::unique('brands','slug')->ignore($this->brand)],
                'image' => 'image',
            ];
        }

        return Arr::collapse($return);

    }

    public function attributes()
    {
        return [

            'name'          => trans('backend.labels.name'),
            'description'   => trans('backend.labels.description'),
            'description.*' => trans('backend.labels.description'),
            'image'         => trans('backend.labels.image'),
            'image_alt'     => trans('backend.labels.image_alt')
        ];
    }
}
