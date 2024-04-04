<?php


namespace App\Utils\Filters\ProductFilter;

use App\Utils\Filters\FilterContract;

class SortBy implements FilterContract
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
                    switch ($value) {
                        case '1':
                            $query->latest();
                            break;
                        case '2':
                            $query->oldest();
                            break;
                    }
                });
        }
    }
}
