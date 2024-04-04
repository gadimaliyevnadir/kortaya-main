<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignDetail extends Model
{
    protected $guarded = [];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    public function type()
    {
        return $this->belongsTo(CampaignType::class,'campaign_type_id');
    }

    public function belong()
    {
        return $this->belongsTo(CampaignType::class,'campaign_belong_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'campaign_detail_products', 'campaign_detail_id', 'product_id');
    }
}
