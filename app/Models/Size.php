<?php

namespace App\Models;

use App\Traits\MediaTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory,MediaTrait,TranslationTrait;
    protected  $guarded = [];

    public $with = ['translations'];

    public function translations()
    {
        return $this->hasMany(SizeTranslation::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
