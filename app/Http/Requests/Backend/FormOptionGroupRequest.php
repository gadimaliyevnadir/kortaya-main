<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormOptionGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->has('status') ? '1' : '0',
            'is_filtered' => $this->has('is_filtered') ? '1' : '0',
        ]);

    }

    public function rules()
    {

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        foreach ($active_langs as $lang){
            $return[] = [
                'name:' . $lang['code'] => ['required', 'max:255'],
                'slug:' . $lang['code'] => ['nullable','max:255',Rule::unique('option_group_translations','slug')],
            ];

            // For Update
            if ($this->filled('_method') && $this->get('_method') == 'PUT') {
                $return[] = [
                    'slug:' . $lang['code'] => ['nullable','max:255'],
                ];
            }
        }

        $return[] = [
            'category_id' => 'required|exists:categories,id',
            'status' => ['required'],
            'is_filtered' => ['required'],
        ];

        return Arr::collapse($return);
    }

    public function attributes()
    {
        return [
            'category_id' => trans('backend.labels.category'),
        ];
    }
}
