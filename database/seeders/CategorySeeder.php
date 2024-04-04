<?php

namespace Database\Seeders;

use App\Models\BrandTranslation;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->delete();
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });
        $this->faker = Faker::create();
        $categories = [
            [
                'code' => 'makeup',
                'name' => 'MAKEUP',
            ],
            [
                'code' => 'accessory',
                'name' => 'ACCESSORY',
            ],
            [
                'code' => 'hair',
                'name' => 'HAIR',
            ],
            [
                'code' => 'body',
                'name' => 'BODY',
            ],
            [
                'code' => 'skincare',
                'name' => 'SKINCARE',
            ],

            [
                'code' => 'dryness_hydration',
                'name' => 'DRYNESS / HYDRATION',
            ],
            [
                'code' => 'sun_cream_fluid',
                'name' => 'SUN CREAM / FLUID',
            ],
            [
                'code' => 'lip_make_up',
                'name' => 'LIP MAKE UP',
            ],
            [
                'code' => 'solution',
                'name' => 'SOLUTION',
            ],

        ];

        foreach ($categories as $category) {
//            1111111111111111111111111111111111111111111111111111
            $cat = Category::create([
                'code' => $category['code'],
            ]);
            foreach ($active_langs as $lang) {
                CategoryTranslation::create([
                    'category_id' => $cat->id,
                    'locale' => $lang->code,
                    'name' => $category['name'],
                ]);
            }

            for ($i = 0; $i < 5; $i++) {
//                2222222222222222222222222222222222222222222222222222222222222
                $sub_cat =  $cat->subCategories()->create([
                    'code' => $this->faker->slug,
                ]);
                foreach ($active_langs as $lang) {
                    CategoryTranslation::create([
                        'category_id' => $sub_cat->id,
                        'locale' => $lang->code,
                        'name' => $this->faker->name,
                    ]);
                }

                for ($j = 0; $j < 5; $j++) {
//                    3333333333333333333333333333333333333333333333333333333333333333333333333
                    $sub_sub_cat =  $sub_cat->subCategories()->create([
                        'code' => $this->faker->slug,
                    ]);
                    foreach ($active_langs as $lang) {
                        CategoryTranslation::create([
                            'category_id' => $sub_sub_cat->id,
                            'locale' => $lang->code,
                            'name' => $this->faker->name,
                        ]);
                    }
                }

            }

        }
    }
}
