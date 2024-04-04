<?php

namespace App\Services;

use App\Models\CampaignDetail;
use App\Models\Product;

class CampaignService
{

    public function getCampaignsByProduct(Product $product):Product
    {

        return dd($product->category->name);
    }

    public function storeNewCampaignDetails(
        int $CampaignId,
        int $CampaignTypeId,
        string $started_at,
        string $ended_at,
        float|null $campaign_discount_price,
        float|null $campaign_discount_percent,
        array $brands,
        array $categories,
        array $products,
        array $credits,
        array $prices
    ): CampaignDetail
    {
        $campaign_detail = CampaignDetail::create([
            'campaign_id' => $CampaignId,
            'campaign_type_id' => $CampaignTypeId,
            'started_at' => $started_at,
            'ended_at' => $ended_at,
            'campaign_discount_price' => $campaign_discount_price,
            'campaign_discount_percent' => $campaign_discount_percent,
        ]);

        for ($i = 0; $i < count($categories); $i++) {
            if (isset($categories[$i]) && $categories[$i] != '') {
                $campaign_detail->categories()->attach($categories[$i]);
            }
        }

        for ($i = 0; $i < count($brands); $i++) {
            if (isset($brands[$i]) && $brands[$i] != '') {
                $campaign_detail->brands()->attach($brands[$i]);
            }
        }

        for ($i = 0; $i < count($credits); $i++) {
            if (isset($credits[$i]) && $credits[$i] != '') {
                $campaign_detail->credits()->attach($credits[$i]);
            }
        }

        for ($i = 0; $i < count($products); $i++) {
            if (isset($products[$i]) && $products[$i] != '' && isset($prices[$i]) && $prices[$i] != '') {
                $campaign_detail->products()->attach($products[$i], [
//                    'product_id' => $products[$i],
                    'product_price' => $prices[$i],
                    'product_price_after_discount' => $prices[$i] - ($prices[$i] * $campaign_discount_percent),
                ]);
            }
        }

        return $campaign_detail;

    }

    public function updateCampaignDetails(
        CampaignDetail $campaign_detail,
        int $CampaignId,
        int $CampaignTypeId,
        string $started_at,
        string $ended_at,
        float|null $campaign_discount_price,
        float|null $campaign_discount_percent,
        array $brands,
        array $categories,
        array $credits,
        array $products,
        array $prices
    ): CampaignDetail
    {
        $campaign_detail->update([
            'campaign_id' => $CampaignId,
            'campaign_type_id' => $CampaignTypeId,
            'started_at' => $started_at,
            'ended_at' => $ended_at,
            'campaign_discount_price' => $campaign_discount_price,
            'campaign_discount_percent' => $campaign_discount_percent,
        ]);


        for ($i = 0; $i < count($brands); $i++) {
            if (isset($brands[$i]) && $brands[$i] != '') {
                $campaign_detail->campaign->brands()->sync($brands[$i]);
            }
        }

        for ($i = 0; $i < count($credits); $i++) {
            if (isset($credits[$i]) && $credits[$i] != '') {
                $campaign_detail->credits()->attach($credits[$i]);
            }
        }

        for ($i = 0; $i < count($categories); $i++) {
            if (isset($categories[$i]) && $categories[$i] != '') {
                $campaign_detail->campaign->categories()->sync($categories[$i]);
            }
        }

        for ($i = 0; $i < count($products); $i++) {
            if (isset($products[$i]) && $products[$i] != '' && isset($prices[$i]) && $prices[$i] != '') {
                $campaign_detail->campaign->products()->attach($products[$i], [
                    'product_id' => $products[$i],
                    'product_price' => $prices[$i],
                    'product_price_after_discount' => $prices[$i] - ($prices[$i] * $campaign_discount_percent / 100),
                ]);
            }
        }

        return $campaign_detail;

    }

}
