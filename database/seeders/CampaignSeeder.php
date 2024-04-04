<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignBelong;
use App\Models\CampaignDetail;
use App\Models\CampaignType;
use App\Models\Language;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('campaigns')->delete();
        \DB::table('campaign_belongs')->delete();
        \DB::table('campaign_details')->delete();
        \DB::table('campaign_types')->delete();
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });
        $this->faker = Faker::create();
// CampaignType ------------------------------------------------------------------------
        for ($i = 0; $i < 10; $i++) {
            $campaignType = CampaignType::create([
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                $campaignType->translations()->create([
                    'locale' => $lang->code,
                    'name' => $this->faker->name,
                ]);
            }
        }
//  CampaignBelong  --------------------------------------------------------------------------------------
        for ($i = 0; $i < 10; $i++) {
            $campaignBelong = CampaignBelong::create([
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                $campaignBelong->translations()->create([
                    'locale' => $lang->code,
                    'name' => $this->faker->name,
                ]);
            }
        }

//  --------------------------------------------------------------------------------------
        $campaign_names = [
            [
                'name' => '$1 DEAL',
            ],
            [
                'name' => 'First Purchase Sale',
            ],
            [
                'name' => 'Clearance',
            ],
            [
                'name' => 'BestSeller Set',
            ]
        ];
        foreach ($campaign_names as $campaign_item) {
            $campaign = Campaign::create([
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                $campaign->translations()->create([
                    'locale' => $lang->code,
                    'name' => $campaign_item['name'],
                    'slug' => $this->faker->slug,
                    'title' => $this->faker->title,
                    'keywords' => $this->faker->slug,
                    'description' => $this->faker->slug,
                    'text' => $this->faker->text,
                ]);
            }
        }
//  --------------------------------------------------------------------------------------
        $campaigns = Campaign::get();
        $campaignTypes = CampaignType::get();
        $campaignBelongs = CampaignBelong::get();
        $products = Product::get();
        foreach ($campaigns as $index => $campaign) {
            $camp_detail = CampaignDetail::create([
                'campaign_id' => $campaigns->random()->id,
                'campaign_type_id' => $campaignTypes->random()->id,
                'campaign_belong_id' => $campaignBelongs->random()->id,
                'started_at' => Carbon::parse(now()->addHour())->format("Y-m-d H:i:s"),
                'ended_at' => Carbon::parse(now()->addMonths(1))->format("Y-m-d H:i:s"),
                'campaign_discount_price' => $index + 15,
                'campaign_discount_percent' => $index + 3,
            ]);

            $camp_detail->products()->sync([$products->random()->id,$products->random()->id]);

        }



    }
}
