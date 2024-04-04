<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Product;
use App\Models\ProductDay;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ProductsDaySeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {
            $products = Product::get();
            $langs = Language::get();
            for ($i = 0; $i < 100; $i++) {
                $productDay = ProductDay::create([
                    'expired_at' => '2025-01-17 14:11:00',
                    'product_id' => $products->random()->id,
                ]);
                foreach ($langs as $lang) {
                    $productDay->translations()->create([
                        'locale' => $lang->code,
                        'title' => 'Hurry Up! Offer Ends In:',
                    ]);
                }
            }
        });

    }
}
