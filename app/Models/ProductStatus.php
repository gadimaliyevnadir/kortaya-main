<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductStatus extends Model
{
    use HasFactory, MediaTrait, TranslationTrait;

    protected $guarded = [];
    public $with = ['translations'];

    public function translations()
    {
        return $this->hasMany(ProductStatusTranslation::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_status','product_status_id','product_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeWeekly($query)
    {
        return $query->whereIn('code',['monday','tuesday','wednesday','thursday','friday','saturday','sunday']);
    }
}
