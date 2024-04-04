<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory,MediaTrait,TranslationTrait;
    protected  $guarded = [];
    public $with = ['translations','files'];

    public function translations()
    {
        return $this->hasMany(OptionTranslation::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function group():BelongsTo
    {
        return $this->belongsTo(OptionGroup::class,'option_group_id');
    }
}
