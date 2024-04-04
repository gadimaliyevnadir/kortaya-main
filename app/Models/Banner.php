<?php

namespace App\Models;

use App\Traits\DocumentTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Banner extends Model
{
    use HasFactory, TranslationTrait, DocumentTrait;

    protected $guarded = [];

    public $with = ['translations','files'];

    public function translations()
    {
        return $this->hasMany(BannerTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(BannerTranslation::class)
            ->where('locale',Session::get('locale'));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1)->orderBy('order');
    }
}
