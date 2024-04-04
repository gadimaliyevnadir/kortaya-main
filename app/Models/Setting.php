<?php

namespace App\Models;

use App\Traits\DocumentTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Setting extends Model
{
    use HasFactory,DocumentTrait;

    protected $guarded = [];

    public $with = ['translations','files'];
    public function translations()
    {
        return $this->hasMany(SettingTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(SettingTranslation::class)
            ->where('locale',app()->getlocale());
    }
    public function translate($code)
    {
        return $this->translations->where('locale', $code)->first();
    }
}
