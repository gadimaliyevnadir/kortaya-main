<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class FormOptionRequest extends FormRequest
{
    public function authorize()
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

        foreach ($active_langs as $lang){
            $return[] = [
                'name:' . $lang['code'] => ['required', 'max:255'],
                'slug:' . $lang['code'] => ['nullable','max:255',Rule::unique('option_translations','slug')],
            ];

            // For Update
            if ($this->filled('_method') && $this->get('_method') == 'PUT') {
                $return[] = [
                    'slug:' . $lang['code'] => ['nullable','max:255'],
                ];
            }
        }

        $return[] = [
            'option_group_id'   => 'required|exists:option_groups,id',
            'status' => ['required'],
        ];

        return Arr::collapse($return);
    }

    public function attributes()
    {
        return [
            'group_id'   => trans('backend.labels.group'),
        ];
    }
}
