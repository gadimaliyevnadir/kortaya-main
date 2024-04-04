<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory,MediaTrait,TranslationTrait;
    protected  $guarded = [];

    public $with = ['translations','subCategories'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function options(): HasMany
    {
        return $this->hasMany(OptionGroup::class)->active()->with('options');
    }
    public function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }

    public function scopeMain($query)
    {
        return $query->where('parent_id', null);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
