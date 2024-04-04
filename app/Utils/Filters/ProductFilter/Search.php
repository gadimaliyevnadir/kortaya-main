<?php


namespace App\Utils\Filters\ProductFilter;

use App\Utils\Filters\FilterContract;
use Illuminate\Support\Facades\Cache;

class Search implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value = null): void
    {
        if ($value) {
            // search panelinde ki mehsullar
            $hotKeywords = Cache::get('hot_keyword', []);
            $hotKeywords[] = $value;
            $hotKeywords = array_slice($hotKeywords, -10);
            Cache::put('hot_keyword', $hotKeywords, 60 * 60 * 24 * 7);

            $this->query
                ->when(!is_array($value), function ($query) use ($value) {
                    $query->where('name', 'like', "%$value%")
                        ->orWhereHas('translations', function ($query) use ($value) {
                            $query->where('text', 'like', "%$value%");
                        });
                });
        }
    }
}
