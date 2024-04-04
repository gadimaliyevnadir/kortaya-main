<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                RoleSeeder::class,
                AdminSeeder::class,
                LanguageTableSeeder::class,
                PermissionsTableSeeder::class,
                SettingSeeder::class,
            ]
        );
        //front seeders
        $this->call(
            [
                SliderSeeder::class,
                CategorySeeder::class,
                ProductStatusesTableSeeder::class,
                FaqsSeeder::class,

                OptionGroupSeeder::class,
                OptionSeeder::class,

                BadgesTableSeeder::class,

                BrandTableSeeder::class,
                BannerSeeder::class,

                SizesTableSeeder::class,

                BlogTableSeeder::class,

                ProductsAllTableSeeder::class,
                ProductsDaySeeder::class,
                CampaignSeeder::class,

//                TypesTableSeeder::class,

//                ColorsTableSeeder::class,
//                ColorTranslationsTableSeeder::class,

            ]);
    }
}
