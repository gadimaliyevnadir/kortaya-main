<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Combination extends Model
{
    use HasFactory;
    protected $table = 'combinations';
    protected $guarded = [];

//    public function color(): BelongsTo
//    {
//        return $this->belongsTo(Color::class);
//    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
//    public function type(): BelongsTo
//    {
//        return $this->belongsTo(Type::class);
//    }
}
