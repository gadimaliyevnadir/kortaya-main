<?php

namespace App\Actions\Backend\Product;

use App\Actions\AbstractAction;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductUpdateAction extends AbstractAction
{
    public Product $product;

    public function handle()
    {
        $model = $this->data['product'];
        $model->update([
            'name' => $this->check_param('name'),
            'slug' => $this->check_param('slug'),
            'weight' => $this->check_param('weight'),
            'length' => $this->check_param('length'),
            'height' => $this->check_param('height'),
            'width' => $this->check_param('width'),
            'category_id' => $this->check_param('category_id'),
            'brand_id' => $this->check_param('brand_id'),
            'quantity_type' => $this->check_param('quantity_type'),
            'quantity' => $this->check_param('quantity'),
            'maximum_quantity' => $this->check_param('maximum_quantity'),
            'status' => $this->check_param('status'),
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->updateOrcreate(
                ['locale' => $lang->code],
                [
                    'meta_title' => $this->data['meta_title:' . $lang->code],
                    'meta_keywords' => $this->data['meta_keywords:' . $lang->code],
                    'meta_description' => $this->data['meta_description:' . $lang->code],
                    'text' => $this->data['text:' . $lang->code],
                ]
            );
        }
        if (isset($this->data['colors'])) {
            $model->combinations()->detach();
            foreach ($this->data['colors'] as $color) {
                $model->combinations()->attach($color['size_id'],
                    [
                        'size_id' => $color['size_id'],
                        'discount_rate' => $color['discount_rate'],
                        'price' => $color['price'],
                        'stock' => $color['stock'],
                        'code' => $color['code'],
                        'status' => $color['status_color'],
                        'discount_price' => $color['discount']
                    ]);
            }
        }
        if (isset($this->data['badges']))
            $model->badges()->sync($this->data['badges']);

        if (isset($this->data['statuses']))
            $model->productStatuses()->sync($this->data['statuses']);

        if (isset($this->data['options']))
            $model->options()->sync($this->data['options']);

        $this->product = $model;
    }

    public function check_param($param)
    {
        return array_key_exists($param, $this->data) ? $this->data[$param] : $this->data['product']->$param;
    }
}
