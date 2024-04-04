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
use App\Models\Size;
use App\Models\Type;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {
            $active_langs = Language::get();
            $this->faker = Faker::create();
            $categories = Category::active()->get();
            $brands = Brand::active()->get();
            $statuses = ProductStatus::active()->get();
            $badges = Badge::active()->get();
            $colors = Color::active()->get();
            $types = Type::active()->get();
            $sizes = Size::active()->get();

//        product 1    -------------------------------------------------------------------------------------
            $price = $this->faker->randomFloat(2, 1, 100);
            $product = Product::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'brand_id' => $brands->random()->id,
                'category_id' => $categories->random()->id,
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
            $product->productStatuses()->sync($statuses->random(1)->pluck('id')->toArray());

            $imageUrl = asset('frontend/assets/images/product-1-1.png');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/product_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'product',
                'manipulationable_id' => $product->id,
                'document' => 'product_image/' . $imageName,
                'collection_name' => 'product_image',
            ]);
            Storage::put($path, $response->getBody());

            foreach ($active_langs as $lang) {
                $product->translations()->create([
                    'product_id' => $product->id,
                    'locale' => $lang->code,
                    'meta_title' => $this->faker->sentence(),
                    'meta_keywords' => $this->faker->sentence(),
                    'meta_description' => $this->faker->sentence(),
                    'text' =>'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.
Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.',
                    'title' => 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.',
                ]);
            }
            foreach ($types as $type) {
                $product->colors()->attach($colors->random()->id,
                    [
                        'type_id' => $type->id,
                        'sku' => $this->faker->randomNumber(6),
                        'size_id' => $sizes->random()->id,
                        'price' => rand(20, 100),
                        'stock' => rand(1, 10),
                        'code' => Str::uuid(),
                        'discount_number' => rand(1, 1000)
                    ]);
            }

//        product 2    -------------------------------------------------------------------------------------
            $price = $this->faker->randomFloat(2, 1, 100);
            $product = Product::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'brand_id' => $brands->random()->id,
                'category_id' => $categories->random()->id,
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
            $product->productStatuses()->sync($statuses->random(1)->pluck('id')->toArray());

            $imageUrl = asset('frontend/assets/images/product-2-1.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/product_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'product',
                'manipulationable_id' => $product->id,
                'document' => 'product_image/' . $imageName,
                'collection_name' => 'product_image',
            ]);
            Storage::put($path, $response->getBody());

            foreach ($active_langs as $lang) {
                $product->translations()->create([
                    'product_id' => $product->id,
                    'locale' => $lang->code,
                    'meta_title' => $this->faker->sentence(),
                    'meta_keywords' => $this->faker->sentence(),
                    'meta_description' => $this->faker->sentence(),
                    'text' =>'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.
Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.',
                    'title' => 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.',
                ]);
            }
            foreach ($types as $type) {
                $product->colors()->attach($colors->random()->id,
                    [
                        'type_id' => $type->id,
                        'sku' => $this->faker->randomNumber(6),
                        'size_id' => $sizes->random()->id,
                        'price' => rand(20, 100),
                        'stock' => rand(1, 10),
                        'code' => Str::uuid(),
                        'discount_number' => rand(1, 1000)
                    ]);
            }



//        product 3    -------------------------------------------------------------------------------------
            $price = $this->faker->randomFloat(2, 1, 100);
            $product = Product::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'brand_id' => $brands->random()->id,
                'category_id' => $categories->random()->id,
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
            $product->productStatuses()->sync($statuses->random(1)->pluck('id')->toArray());

            $imageUrl = asset('frontend/assets/images/product-2-2.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/product_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'product',
                'manipulationable_id' => $product->id,
                'document' => 'product_image/' . $imageName,
                'collection_name' => 'product_image',
            ]);
            Storage::put($path, $response->getBody());

            foreach ($active_langs as $lang) {
                $product->translations()->create([
                    'product_id' => $product->id,
                    'locale' => $lang->code,
                    'meta_title' => $this->faker->sentence(),
                    'meta_keywords' => $this->faker->sentence(),
                    'meta_description' => $this->faker->sentence(),
                    'text' =>'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.
Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.',
                    'title' => 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.',
                ]);
            }
            foreach ($types as $type) {
                $product->colors()->attach($colors->random()->id,
                    [
                        'type_id' => $type->id,
                        'sku' => $this->faker->randomNumber(6),
                        'size_id' => $sizes->random()->id,
                        'price' => rand(20, 100),
                        'stock' => rand(1, 10),
                        'code' => Str::uuid(),
                        'discount_number' => rand(1, 1000)
                    ]);
            }


//        product 4    -------------------------------------------------------------------------------------
            $price = $this->faker->randomFloat(2, 1, 100);
            $product = Product::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'brand_id' => $brands->random()->id,
                'category_id' => $categories->random()->id,
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
            $product->productStatuses()->sync($statuses->random(1)->pluck('id')->toArray());

            $imageUrl = asset('frontend/assets/images/product-4-1.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/product_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'product',
                'manipulationable_id' => $product->id,
                'document' => 'product_image/' . $imageName,
                'collection_name' => 'product_image',
            ]);
            Storage::put($path, $response->getBody());

            foreach ($active_langs as $lang) {
                $product->translations()->create([
                    'product_id' => $product->id,
                    'locale' => $lang->code,
                    'meta_title' => $this->faker->sentence(),
                    'meta_keywords' => $this->faker->sentence(),
                    'meta_description' => $this->faker->sentence(),
                    'text' =>'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.
Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.',
                    'title' => 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.',
                ]);
            }
            foreach ($types as $type) {
                $product->colors()->attach($colors->random()->id,
                    [
                        'type_id' => $type->id,
                        'sku' => $this->faker->randomNumber(6),
                        'size_id' => $sizes->random()->id,
                        'price' => rand(20, 100),
                        'stock' => rand(1, 10),
                        'code' => Str::uuid(),
                        'discount_number' => rand(1, 1000)
                    ]);
            }


//        product 5    -------------------------------------------------------------------------------------
            $price = $this->faker->randomFloat(2, 1, 100);
            $product = Product::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'brand_id' => $brands->random()->id,
                'category_id' => $categories->random()->id,
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
            $product->productStatuses()->sync($statuses->random(1)->pluck('id')->toArray());

            $imageUrl = asset('frontend/assets/images/product-4-1.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/product_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'product',
                'manipulationable_id' => $product->id,
                'document' => 'product_image/' . $imageName,
                'collection_name' => 'product_image',
            ]);
            Storage::put($path, $response->getBody());

            foreach ($active_langs as $lang) {
                $product->translations()->create([
                    'product_id' => $product->id,
                    'locale' => $lang->code,
                    'meta_title' => $this->faker->sentence(),
                    'meta_keywords' => $this->faker->sentence(),
                    'meta_description' => $this->faker->sentence(),
                    'text' =>'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.
Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.',
                    'title' => 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.',
                ]);
            }
            foreach ($types as $type) {
                $product->colors()->attach($colors->random()->id,
                    [
                        'type_id' => $type->id,
                        'sku' => $this->faker->randomNumber(6),
                        'size_id' => $sizes->random()->id,
                        'price' => rand(20, 100),
                        'stock' => rand(1, 10),
                        'code' => Str::uuid(),
                        'discount_number' => rand(1, 1000)
                    ]);
            }



        });





    }
}
