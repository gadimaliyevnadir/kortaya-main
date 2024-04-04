<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('faqs')->delete();
        $model = Faq::create([
            'id' => 1,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Lorem ipsum dolor sit amet?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id erat sagittis, faucibus metus malesuada, eleifend turpis. Mauris semper augue id nisl aliquet, a porta lectus mattis. Nulla at tortor augue. In eget enim diam. Donec gravida tortor sem, ac fermentum nibh rutrum sit amet. Nulla convallis mauris vitae congue consequat. Donec interdum nunc purus, vitae vulputate arcu fringilla quis. Vivamus iaculis euismod dui.',
            ]);
        }

        $model = Faq::create([
            'id' => 2,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id erat sagittis, faucibus metus malesuada, eleifend turpis. Mauris semper augue id nisl aliquet, a porta lectus mattis. Nulla at tortor augue. In eget enim diam. Donec gravida tortor sem, ac fermentum nibh rutrum sit amet. Nulla convallis mauris vitae congue consequat. Donec interdum nunc purus, vitae vulputate arcu fringilla quis. Vivamus iaculis euismod dui.',
            ]);
        }
    }
}
