<?php

namespace App\Models;

use App\Utils\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_method',
        'note',
        'phone',
        'new_address',
        'company_name',
        'address_name',
        'first_name',
        'last_name',
        'order_id',
        'session_id',
        'ip_address',
        'email',
        'order_status_id',
        'total_amount',
        'user_id',
        'package_id',
    ];


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }
    public function getStatus()
    {
        $orderStatusId = $this->order_status_id;
        switch ($orderStatusId) {
            case 1:
                $status = 'Pending';
                break;
            case 2:
                $status = 'APPROVED';
                break;
            case 3:
                $status = 'CANCELLED';
                break;
            case 4:
                $status = 'FAILED';
                break;
            default:
                $status = 'Unknown Status';
                break;
        }
        return $status;
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utils\Filters\OrderFilter';
        $filter = new FilterBuilder($query, $filters, $namespace);
        return $filter->apply();
    }
}
