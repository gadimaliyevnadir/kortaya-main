<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('types')->delete();
// Metal Resin Lather Polymer
// type 1 -------------------------------------------------------------------------------------------------
        $model = Type::create([
            'id' => 1,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Metal',
                'slug' => 'metal'.$lang->code,
            ]);
        }
// type 2 -------------------------------------------------------------------------------------------------
        $model = Type::create([
            'id' => 2,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Resin',
                'slug' => 'resin'.$lang->code,
            ]);
        }
// type 3 -------------------------------------------------------------------------------------------------
        $model = Type::create([
            'id' => 3,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Lather',
                'slug' => 'lather'.$lang->code,
            ]);
        }
// type 4 -------------------------------------------------------------------------------------------------
        $model = Type::create([
            'id' => 4,
            'status' => '1',
            'created_at' => '2022-04-12 20:47:52',
            'updated_at' => '2022-04-12 20:47:52',
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Polymer',
                'slug' => 'polymer'.$lang->code,
            ]);
        }
    }
}
