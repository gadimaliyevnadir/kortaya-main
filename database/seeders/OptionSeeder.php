<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\OptionTranslation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class OptionSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {

            \DB::table('options')->delete();
        \DB::table('option_translations')->delete();

        $this->faker = Faker::create();

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        $options_groups = OptionGroup::all();

        $count=20;
        for ($i = 0; $i < $count; $i++) {
            $option =  Option::create([
                'option_group_id' => $options_groups->random()->id,
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                OptionTranslation::create([
                    'option_id' => $option->id,
                    'locale' => $lang->code,
                    'name' => $this->faker->name,
                    'slug' => Str::slug($this->faker->name),
                ]);
            }
        }
        });
    }
}
