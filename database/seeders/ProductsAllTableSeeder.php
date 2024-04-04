<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Document;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\ProductTranslation;
use App\Models\Size;
use App\Models\Type;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsAllTableSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {

            $this->faker = Faker::create();

            $active_langs = Cache::rememberForever('active_langs', function () {
                return Language::active()->get();
            });
            $imageUrls =[
                [
                    'first_image'=>asset('frontend/assets/images/product-1-1.png'),
                    'second_image'=>asset('frontend/assets/images/product-1-2.jpg'),
                ],
                [
                    'first_image'=>asset('frontend/assets/images/product-2-1.jpg'),
                    'second_image'=>asset('frontend/assets/images/product-2-2.png'),
                ],
                [
                    'first_image'=>asset('frontend/assets/images/product-3-1.png'),
                    'second_image'=>asset('frontend/assets/images/product-3-2.png'),
                ],
                [
                    'first_image'=>asset('frontend/assets/images/product-4-1.jpg'),
                    'second_image'=>asset('frontend/assets/images/product-4-2.jpg'),
                ],
            ];

            $categories = Category::active()->get();
            $brands = Brand::active()->get();
            $statuses = ProductStatus::active()->get();
            $badges = Badge::active()->get();
            $sizes = Size::active()->get();
            $count = 100;
            for ($i = 0; $i < $count; $i++) {
                $price = $this->faker->randomFloat(2, 1, 100);
                $product = Product::create([
                    'name' => $this->faker->name,
                    'slug' => Str::slug($this->faker->name),
                    'brand_id' => $brands->random()->id,
                    'category_id' => $categories->whereNull('parent_id')->random()->id,
                    'quantity_type' => $this->faker->randomElement(['1', '2', '3']),
                    'quantity' => $this->faker->randomNumber(2),
                    'weight' => $this->faker->randomFloat(2, 0, 100),
                    'length' => $this->faker->randomFloat(2, 0, 100),
                    'height' => $this->faker->randomFloat(2, 0, 100),
                    'width' => $this->faker->randomFloat(2, 0, 100),
                    'maximum_quantity' => $this->faker->randomNumber(2),
                    'price' => $price,
                    'discount_price' => ($price - 1),
                    'status' => 1
                ]);
                $product->badges()->sync($badges->random(1)->pluck('id')->toArray());
                $product->productStatuses()->sync($statuses->random(10)->pluck('id')->toArray());

                $imageUrlsCollection = collect($imageUrls);
                $randomImage = $imageUrlsCollection->random();

                $imageUrl = $randomImage['first_image'];
                $client = new Client();
                $response = $client->get($imageUrl);
                $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
                $path = 'public/documents/product_image/' .$product->id .'_' . $imageName;
                Document::create([
                    'manipulationable_type' => 'product',
                    'manipulationable_id' => $product->id,
                    'order' => 'first',
                    'status' => 'main',
                    'document' => 'product_image/' . $product->id .'_' .$imageName,
                    'collection_name' => 'product_image',
                ]);
                Storage::put($path, $response->getBody());

                $imageUrl = $randomImage['second_image'];
                $client = new Client();
                $response = $client->get($imageUrl);
                $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
                $path = 'public/documents/product_image/' .$product->id .'_' .$imageName;
                Document::create([
                    'manipulationable_type' => 'product',
                    'manipulationable_id' => $product->id,
                    'order' => 'second',
                    'document' => 'product_image/' . $product->id .'_' .$imageName,
                    'collection_name' => 'product_image',
                ]);
                Storage::put($path, $response->getBody());


                foreach ($sizes as $size){
                    $price = rand(20,100);
                    $product->combinations()->attach($sizes->random()->id,
                        [
                            'sku' => $this->faker->randomNumber(6),
                            'price' => $price,
                            'stock' => rand(1,10),
                            'discount_rate' => rand(1,100),
                            'code' => Str::uuid(),
                            'discount_price' =>  $price - 1
                        ]);
                }

                foreach ($active_langs as $lang) {
                    ProductTranslation::create([
                        'product_id' => $product->id,
                        'locale' => $lang->code,
                        'meta_title' => $this->faker->sentence(),
                        'meta_keywords' => $this->faker->sentence(),
                        'meta_description' => $this->faker->sentence(),
                        'title' => $this->faker->text(100),
                        'text' => $this->faker->text(200),
                    ]);
                }
            }
        });
    }
}
