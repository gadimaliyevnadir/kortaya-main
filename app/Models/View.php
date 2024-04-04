<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'views';

    public function viewable()
    {
        return $this->morphTo();
    }
}
