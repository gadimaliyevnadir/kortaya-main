<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class FormBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->has('status') ? '1' : '0',
        ]);
    }

    public function rules()
    {
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });
        foreach ($active_langs as $lang) {
            $return[] = [
                'name:' . $lang['code'] => ['required'],
                'text:' . $lang['code'] => ['required'],
            ];
        }

        // For Store
        $return[] = [
            'link' => ['string', 'nullable'],
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => ['required'],
            'status' => ['required'],
            'banner_type' => ['required'],
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'image' => 'filled',
            ];
        }

        return Arr::collapse($return);

    }

    public function attributes()
    {
        return [
            'image' => trans('backend.labels.image'),
        ];
    }
}
