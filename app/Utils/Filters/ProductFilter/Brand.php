<?php


namespace App\Utils\Filters\ProductFilter;

use App\Utils\Filters\FilterContract;

class Brand implements FilterContract
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
                    $query->where(function($q) use ($value){
                        $q->where('brand_id', $value);
                    });
                });
        }
    }
}
