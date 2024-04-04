<?php

namespace App\Services;

use App\Actions\Backend\Product\ProductCreateAction;
use App\Actions\Backend\Product\ProductUpdateAction;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public Product $product;

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $action = new ProductCreateAction();
            $action->setData($data)->handle();
            $this->product = $action->product;
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
    public function update(array $data)
    {
        try {
            DB::beginTransaction();
            $action = new ProductUpdateAction();
            $action->setData($data)->handle();
            $this->product = $action->product;
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
}
