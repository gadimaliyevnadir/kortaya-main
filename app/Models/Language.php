<?php

namespace App\Models;

use App\Traits\DocumentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory,DocumentTrait;
    protected $fillable = ['name','code','default','status'];
    protected  $table= 'languages';
    public function scopeDefault($query)
    {
        return $query->where('default', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
