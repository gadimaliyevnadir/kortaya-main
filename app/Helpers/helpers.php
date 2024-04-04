<?php

use App\Models\Document;
use App\Models\Language;
use App\Models\ProductStatus;
use App\Models\Setting;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


if (!function_exists('locale')) {
    function locale()
    {
        return app()->getlocale();
    }
}

if (!function_exists('redirect_url_by_user')) {
    function redirect_url_by_user()
    {
        if (auth()->guest()) {
            return 'frontend.login';
        }
        $url = 'frontend.dashboard';
        return $url;
    }
}

if (!function_exists('short_name')) {
    function short_name()
    {
        $array = explode(' ', admin()->name);

        if (count($array) < 2) {
            return strtoupper(substr($array[0], 0, 1));
        }

        return strtoupper(substr($array[0], 0, 1)) . strtoupper(substr($array[1], 0, 1));
    }
}
if (!function_exists('settings')) {
    function settings($type = null)
    {
        $return = '';

        $settings = Cache::remember('settings', 1800, function () {
            return collect(Setting::with('translations')->get());
        });

        foreach ($settings as $setting) {
            if ($setting->code == $type) {
                return $setting->translations->where('locale', locale())->first()->content ?? '';
            }
        }

        return $return;
    }
}


if (!function_exists('admin')) {
    function admin()
    {
        return auth('admin')->user();
    }
}

if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}


if (!function_exists('notify')) {
    function notify($type, $message)
    {
        return "Swal.fire(
                {
                    icon:  '$type',
                    title: '$message',
                    showConfirmButton: false,
                    timer: 3000
                });";
    }
}

if (!function_exists('confirm')) {
    function confirm()
    {
        return "Swal.fire(
                {
                    title: '" . trans('backend.mixins.are_you_sure') . "',
                    text:  '" . trans('backend.mixins.wont_revert') . "',
                    icon:  'warning',
                    showCancelButton:   true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor:  '#d33',
                    confirmButtonText:  '" . trans('backend.buttons.delete') . "',
                    cancelButtonText:   '" . trans('backend.buttons.cancel') . "'
                })";
    }
}

if (!function_exists('confirm_update')) {
    function confirm_update()
    {
        return "Swal.fire(
                {
                    title: '" . trans('backend.mixins.are_you_sure') . "',
                    text:  '" . trans('backend.mixins.wont_update') . "',
                    icon:  'warning',
                    showCancelButton:   true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor:  '#d33',
                    confirmButtonText:  '" . trans('backend.buttons.update') . "',
                    cancelButtonText:   '" . trans('backend.buttons.update') . "'
                })";
    }
}


if (!function_exists('ipfind')) {
    function ipfind()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }
}

if (!function_exists('badge')) {
    function badge($value)
    {
        if ($value) {
            return '<span class="label label-lg label-inline label-light-success">' . trans('backend.mixins.active') . '</span>';
        }

        return '<span class="label label-lg label-inline label-light-danger">' . trans('backend.mixins.passive') . '</span>';
    }
}

if (!function_exists('image_url')) {
    function image_url($name)
    {
        return asset("uploads/$name");
    }
}

if (!function_exists('lang_url')) {
    function lang_url($locale)
    {
        $url = request()->segments();
        array_shift($url);
        $segments = implode('/', $url);

        return url("$locale/$segments");
    }
}

if (!function_exists('current_lang')) {
    function current_lang()
    {
        $result = '';

        foreach (active_langs() as $lang) {
            if (locale() == $lang->code) {
                $result = $lang->name;
                break;
            }
        }

        return $result;
    }
}

if (!function_exists('active_langs')) {
    function active_langs()
    {
        return Language::active()->get();
    }
}

if (!function_exists('default_lang')) {
    function default_lang()
    {
        return optional(Language::default()->first())->code ?? config('app.locale');
    }
}
if (!function_exists('settings')) {
    function settings($type = null)
    {
        $return = '';

        $settings = Cache::remember('settings', 1800, function () {
            return collect(Setting::with('translations')->get());
        });

        foreach ($settings as $setting) {
            if ($setting->name == $type) {
                return $setting->translations->where('locale', locale())->first()->content ?? '';
            }
        }

        return $return;
    }
}

if (!function_exists('translation')) {
    function translation($model)
    {
        return $model?->translations->where('locale', locale())->first();
    }
}

if (!function_exists('translation_first')) {
    function translation_first($model)
    {
        $translations = $model?->translations;
        return $translations
            ? $translations->where('locale', locale())->first() ?? $translations->first()
            : null;
    }
}

if (!function_exists('product_statuses')) {
    function product_statuses($code)
    {
        $product_statuses = Cache::rememberForever('product_statuses', function () {
            return ProductStatus::active()->get();
        });
        return $product_statuses->where('code', $code)->first();
    }
}

if (!function_exists('alphabet')) {
    function alphabet($brands, $letter,$red = null)
    {
        $list = '';

        foreach ($brands->filter(function ($brand) use ($letter) {
            return preg_match('/^[' . preg_quote($letter, '/') . ']/i', $brand->name);
        }) as $brand) {
            if ($red){
                $list .= "<a class='letterMobileBox_item' href='".route('frontend.brand.detail',['brand'=>$brand])."'><li>$brand->name </li></a>";
            }else{
                $list .= "<a  href='".route('frontend.brand.detail',['brand'=>$brand])."'><li>$brand->name </li></a>";
            }
        }
        return $list;
    }
}
if (!function_exists('upload_image')) {
    function upload_image($url,$collection_name,$model,$id)
    {
        $imageUrl = asset($url);
        $client = new Client();
        $response = $client->get($imageUrl);

        $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
        $path = 'public/documents/'.$collection_name.'/' . $imageName;
        Document::create([
            'manipulationable_type' => $model,
            'manipulationable_id' => $id,
            'document' => $collection_name.'/' . $imageName,
            'collection_name' => $collection_name,
        ]);
        Storage::put($path, $response->getBody());
    }
}


if (!function_exists('translation_month')) {
    function translation_month($date)
    {
        $d = \Illuminate\Support\Carbon::parse($date)->format('d-m-Y') ;
        $m = \Illuminate\Support\Carbon::parse($d)->format('m');
        $arr = [
            '01' => [
                'az' => 'Yanvar ',
                'en' => 'January ',
                'ru' => 'Январь ',
                'tr' => 'Ocak ',
            ],
            '02' => [
                'az' => 'Fevral ',
                'en' => 'February ',
                'ru' => 'Февраль ',
                'tr' => 'Şubat ',
            ],
            '03' => [
                'az' => 'Mart ',
                'en' => 'March ',
                'ru' => 'Март ',
                'tr' => 'Mart ',
            ],
            '04' => [
                'az' => 'Aprel ',
                'en' => 'April ',
                'ru' => 'Апрель ',
                'tr' => 'Nisan ',
            ],
            '05' => [
                'az' => 'May ',
                'en' => 'May ',
                'ru' => 'Май ',
                'tr' => 'Mayıs ',
            ],
            '06' => [
                'az' => 'İyun ',
                'en' => 'June ',
                'ru' => 'Июнь ',
                'tr' => 'Haziran ',
            ],
            '07' => [
                'az' => 'İyul ',
                'en' => 'July ',
                'ru' => 'Июль ',
                'tr' => 'Temmuz ',
            ],
            '08' => [
                'az' => 'Avqust ',
                'en' => 'August ',
                'ru' => 'Август ',
                'tr' => 'Ağustos ',
            ],
            '09' => [
                'az' => 'Sentyabr ',
                'en' => 'September ',
                'ru' => 'Сентябрь ',
                'tr' => 'Eylül ',
            ],
            '10' => [
                'az' => 'Oktyabr ',
                'en' => 'October ',
                'ru' => 'Октябрь ',
                'tr' => 'Ekim ',
            ],
            '11' => [
                'az' => 'Noyabr ',
                'en' => 'November ',
                'ru' => 'Ноябрь ',
                'tr' => 'Kasım ',
            ],
            '12' => [
                'az' => 'Dekabr ',
                'en' => 'December ',
                'ru' => 'Декабрь ',
                'tr' => 'Aralık ',
            ],
        ];
        $d =  substr_replace($d, $arr[$m][locale()], 3, 2);
        return str_replace('-', ' ', $d);
    }
}
