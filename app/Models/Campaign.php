<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Campaign extends Model
{
    use HasFactory,MediaTrait,TranslationTrait;
    protected  $guarded = [];
    public $with = ['translations','files'];

    public function translations()
    {
        return $this->hasMany(CampaignTranslation::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function detail(): HasOne
    {
        return $this->hasOne(CampaignDetail::class);
    }
}
