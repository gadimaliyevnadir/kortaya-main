<?php

namespace App\Models;

use App\Enums\ProductStatusType;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use App\Utils\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory,
        HasSlug,
        Sluggable,
        MediaTrait,
        TranslationTrait;

    protected $guarded = [];

    public $with = ['translations', 'combinations', 'files','reviews'];

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function productStatuses(): BelongsToMany
    {
        return $this->belongsToMany(ProductStatus::class, 'product_status', 'product_id', 'product_status_id');
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'option_products', 'product_id', 'option_id');
    }

    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(Badge::class, 'badge_products', 'product_id', 'badge_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function combinations(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'combinations', 'product_id', 'size_id')
            ->withPivot('id', 'size_id', 'price', 'discount_price', 'stock', 'code', 'status', 'discount_rate', 'sku')
            ->withTimestamps()->orderBy('size_id', 'desc');
    }

    public function main()
    {
        return $this->combinations->where('pivot.status', true)->first() ?? $this->combinations->first();
    }


    public function scopePopular($query)
    {
        return $query->orderByUniqueViews()->whereRelation('productStatuses', 'product_status_id', ProductStatusType::POPULAR_PRODUCTS);
    }

    public function scopeNewProducts($query)
    {
        return $query->whereRelation('productStatuses', 'product_status_id', ProductStatusType::NEW_PRODUCTS);
    }

    public function scopeBestSeller($query)
    {
        return $query->whereRelation('productStatuses', 'product_status_id', ProductStatusType::BEST_SELLER_PRODUCTS);
    }

    public function scopeOutletProducts($query)
    {
        return $query->where('outlet', 1);
    }

    public function scopeDiscount($query)
    {
        return $query->whereNotNull('discount_price');
    }

    public function scopePopularPhones($query)
    {
        return $query->orderByUniqueViews()->where('category_id', 40)->whereRelation('productStatuses', 'product_status_id', ProductStatusType::POPULAR_PHONES);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeRate($query)
    {
        $rate_count = $this->reviews->count();
        $rate_sum = $this->reviews->sum('ratings_review_point');
        $rate = $rate_count > 0 ? round(($rate_sum / $rate_count), 1) : 1;
        return  100 / 5 * $rate;
    }

    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utils\Filters\ProductFilter';
        $filter = new FilterBuilder($query, $filters, $namespace);
        return $filter->apply();
    }

    public function checkMaxCount($product, $cart, $data)
    {
        if ($cart->infos->count() > 0) {
            $maxCount = $cart->infos->where('product_id', $product->id)->sum('qty');
            if (($data['count_product'] + $maxCount) > $product->maximum_quantity) {
                return false;
            }
        }
        return true;
    }


    public function getAppUrlAttribute()
    {

        if (isset($this->slug)) {
            return route('frontend.product.detail', ['slug' => $this->slug]);
        }

        return 'javascript:void(0);';
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }
}
