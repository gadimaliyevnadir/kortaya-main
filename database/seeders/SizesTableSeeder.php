<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class SizesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sizes')->delete();

// size 1 -------------------------------------------------------------------------------------------------
        $model = Size::create([
            'id' => 1,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'standard caliber',
                'slug' => 'standard_caliber'.$lang->code,
            ]);
        }
// size 2 -------------------------------------------------------------------------------------------------
        $model = Size::create([
            'id' => 2,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => '140x160 cm',
                'slug' => '140x160'.$lang->code,
            ]);
        }
// size 3  -------------------------------------------------------------------------------------------------
        $model = Size::create([
            'id' => 3,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => '200x240 cm',
                'slug' => '200x240'.$lang->code,
            ]);
        }
// size 4  -------------------------------------------------------------------------------------------------
        $model = Size::create([
            'id' => 4,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'S',
                'slug' => 's'.$lang->code,
            ]);
        }
// size 5  -------------------------------------------------------------------------------------------------
        $model = Size::create([
            'id' => 5,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'M',
                'slug' => 'm'.$lang->code,
            ]);
        }
// size 6  -------------------------------------------------------------------------------------------------
        $model = Size::create([
            'id' => 6,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'L',
                'slug' => 'l'.$lang->code,
            ]);
        }
// size 7  -------------------------------------------------------------------------------------------------
        $model = Size::create([
            'id' => 7,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'XL',
                'slug' => 'xl'.$lang->code,
            ]);
        }



    }
}
