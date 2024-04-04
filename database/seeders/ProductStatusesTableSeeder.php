<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\ProductStatus;
use App\Models\ProductStatusTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class ProductStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('product_statuses')->delete();
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });
        $statuses = [
            [
                'status' => '1',
                'name' => 'Best Sellers',
                'code' => 'best_sellers',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'Discounted products',
                'code' => 'discounted_products',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'Papular products',
                'code' => 'papular_products',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'Sale Items',
                'code' => 'sale_items',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'New Arrivals',
                'code' => 'new_arrivals',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'Best Offer',
                'code' => 'best_offer',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'New Products',
                'code' => 'new_products',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
// ----------------------------------------------------------------------------------------------------------------------
            [
                'status' => '1',
                'name' => 'BEST PRODUCT',
                'code' => 'best_products',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
// ----------------------------------------------------------------------------------------------------------------------
            [
                'status' => '1',
                'name' => 'Today\'s BEST Item',
                'code' => 'todays_best_item',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'Today\'s TOP Viewed Item',
                'code' => 'todays_top_viewed_item',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'Items with a High Order Rate',
                'code' => 'items_with_a_high_order_rate',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
            [
                'status' => '1',
                'name' => 'New Item',
                'code' => 'new_item',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],

// ----------------------------------------------------------------------------------------------------------------------
            [
                'status' => '1',
                'name' => 'ONLY MONDAY',
                'code' => 'monday',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],[
                'status' => '1',
                'name' => 'ONLY TUESDAY',
                'code' => 'tuesday',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],[
                'status' => '1',
                'name' => 'ONLY WEDNESDAY',
                'code' => 'wednesday',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],[
                'status' => '1',
                'name' => 'ONLY THURSDAY',
                'code' => 'thursday',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],[
                'status' => '1',
                'name' => 'ONLY FRİDAY',
                'code' => 'friday',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],[
                'status' => '1',
                'name' => 'ONLY SATURDAY',
                'code' => 'saturday',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],[
                'status' => '1',
                'name' => 'ONLY SUNDAY',
                'code' => 'sunday',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ],
        ];

        foreach ($statuses as $status) {
            $stat = ProductStatus::create([
                'status' => $status['status'],
                'code' => $status['code'],
                'created_at' => $status['created_at'],
                'updated_at' => $status['updated_at'],
            ]);
            foreach ($active_langs as $lang) {
                ProductStatusTranslation::create([
                    'product_status_id' => $stat->id,
                    'locale' => $lang->code,
                    'name' => $status['name'],
                ]);
            }
        }
    }
}
