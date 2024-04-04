<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDay extends Model
{
    use HasFactory,MediaTrait,TranslationTrait;
    protected  $guarded = [];
    public $with = ['translations','files','product'];

    public function translations()
    {
        return $this->hasMany(ProductDayTranslation::class);
    }
    public function scopeActive($query)
    {
        return $query->where('expired_at', '>=', now())->where('status', 1);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
