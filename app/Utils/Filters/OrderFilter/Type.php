<?php


namespace App\Utils\Filters\OrderFilter;

use App\Enums\OrderType;
use App\Utils\Filters\FilterContract;

class Type implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value = null): void
    {
        if($value){
            $this->query
                ->when(!is_array($value),function ($query)use($value){
                    if ($value == 'failed'){
                        $query->where(function($q) use ($value){
                            $q->where('order_status_id', OrderType::FAILED);
                        });
                    }
                });
        }
    }
}
