<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionGroup extends Model
{
    use HasFactory, MediaTrait, TranslationTrait;

    protected $guarded = [];
    public $with = ['translations', 'files'];

    public function translations()
    {
        return $this->hasMany(OptionGroupTranslation::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class)->active();
    }
}
