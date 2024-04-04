<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Models\Document;
use App\Models\Language;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandTableSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {
            $this->faker = Faker::create();

            \DB::table('brands')->delete();
            \DB::table('brand_translations')->delete();

            $active_langs = Cache::rememberForever('active_langs', function () {
                return Language::active()->get();
            });
//  brand 1 -------------------------------------------------------------------------------------------------
            $brand = Brand::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BrandTranslation::create([
                    'brand_id' => $brand->id,
                    'locale' => $lang->code,
                    'meta_description' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/brand-logo/1.webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'icon',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());

            $imageUrl = asset('frontend/assets/images/some_images/shop6_207_top_768079.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'main',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());
//  brand 2 -------------------------------------------------------------------------------------------------
            $brand = Brand::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BrandTranslation::create([
                    'brand_id' => $brand->id,
                    'locale' => $lang->code,
                    'meta_description' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/brand-logo/2.webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'icon',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());

            $imageUrl = asset('frontend/assets/images/some_images/shop6_212_top_540283.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'main',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());
//  brand 3 -------------------------------------------------------------------------------------------------
            $brand = Brand::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BrandTranslation::create([
                    'brand_id' => $brand->id,
                    'locale' => $lang->code,
                    'meta_description' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/brand-logo/3.webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'icon',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());

            $imageUrl = asset('frontend/assets/images/some_images/shop6_217_top_713718.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'main',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());
//  brand 4 -------------------------------------------------------------------------------------------------
            $brand = Brand::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BrandTranslation::create([
                    'brand_id' => $brand->id,
                    'locale' => $lang->code,
                    'meta_description' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/brand-logo/4.webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'icon',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());

            $imageUrl = asset('frontend/assets/images/some_images/shop6_217_top_713718.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'main',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());
//  brand 5 -------------------------------------------------------------------------------------------------
            $brand = Brand::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BrandTranslation::create([
                    'brand_id' => $brand->id,
                    'locale' => $lang->code,
                    'meta_description' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/brand-logo/5.webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'icon',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());

            $imageUrl = asset('frontend/assets/images/some_images/shop6_207_top_768079.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/brand_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'brand',
                'manipulationable_id' => $brand->id,
                'status' => 'main',
                'document' => 'brand_image/' . $imageName,
                'collection_name' => 'brand_image',
            ]);
            Storage::put($path, $response->getBody());



        });

    }
}
