<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\BadgeTranslation;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class BadgesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('badges')->delete();
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });
        $badges = [
            [
                'id' => 1,
                'bg_color' => '#d8e3a4',
                'text_color' => '#2d3131',
                'border_color' => NULL,
                'icon' => NULL,
                'status' => '1',
                'order' => 1,
                'created_at' => '2022-03-31 10:47:59',
                'updated_at' => '2022-04-01 11:59:59',
                'name' => 'İlkin ödənişsiz',
                'slug' => 'ilkin-odenissiz',
            ],
            [
                'id' => 2,
                'bg_color' => '#549480',
                'text_color' => '#ffffff',
                'border_color' => '#549480',
                'icon' => NULL,
                'status' => '1',
                'order' => 2,
                'created_at' => '2022-04-01 11:56:30',
                'updated_at' => '2022-04-01 12:42:21',
                'name' => 'Əlavə endirimlə',
                'slug' => 'elave-endirimle',
            ],
            [
                'id' => 3,
                'bg_color' => '#3ac1ee',
                'text_color' => '#ffffff',
                'border_color' => '#3ac1ee',
                'icon' => NULL,
                'status' => '1',
                'order' => 3,
                'created_at' => '2022-04-01 11:57:13',
                'updated_at' => '2022-04-01 12:41:42',
                'name' => 'İndi al, sonra ödə',
                'slug' => 'indi-al-sonra-ode',
            ],
            [
                'id' => 4,
                'bg_color' => '#ffffff',
                'text_color' => '#73b5a1',
                'border_color' => '#73b5a1',
                'icon' => NULL,
                'status' => '1',
                'order' => 4,
                'created_at' => '2022-04-01 11:57:24',
                'updated_at' => '2022-04-01 12:43:20',
                'name' => 'Visa ilə 3% endirim',
                'slug' => 'visa-ile-3-endirim',
            ],
            ];
        foreach ($badges as $badge) {
            $badge_item = Badge::create([
                'id' => $badge['id'],
                'bg_color' => $badge['bg_color'],
                'text_color' => $badge['text_color'],
                'border_color' => $badge['border_color'],
                'icon' =>$badge['icon'],
                'status' => $badge['status'],
                'order' => $badge['order'],
                'created_at' =>$badge['created_at'],
                'updated_at' => $badge['updated_at'],
            ]);
            foreach ($active_langs as $lang) {
                BadgeTranslation::create([
                    'locale' => $lang->code,
                    'badge_id' => $badge_item->id,
                    'name' => $badge['name'],
                    'slug' => $badge['slug'].'_'.$lang->code,
                ]);
            }
        }

    }
}
