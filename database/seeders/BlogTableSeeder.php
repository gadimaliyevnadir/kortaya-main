<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogTranslation;
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

class BlogTableSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {
            $this->faker = Faker::create();

            \DB::table('blogs')->delete();
            \DB::table('blog_translations')->delete();

            $active_langs = Cache::rememberForever('active_langs', function () {
                return Language::active()->get();
            });
//  blog 1 -------------------------------------------------------------------------------------------------
            $blog = Blog::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BlogTranslation::create([
                    'blog_id' => $blog->id,
                    'locale' => $lang->code,
                    'content' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/blog/blog-post/1.webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/blog_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'blog',
                'manipulationable_id' => $blog->id,
                'document' => 'blog_image/' . $imageName,
                'collection_name' => 'blog_image',
            ]);
            Storage::put($path, $response->getBody());
//  blog 2 -------------------------------------------------------------------------------------------------
            $blog = Blog::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BlogTranslation::create([
                    'blog_id' => $blog->id,
                    'locale' => $lang->code,
                    'content' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/blog/blog-post/2 (2).webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/blog_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'blog',
                'manipulationable_id' => $blog->id,
                'document' => 'blog_image/' . $imageName,
                'collection_name' => 'blog_image',
            ]);
            Storage::put($path, $response->getBody());
//  blog 3 -------------------------------------------------------------------------------------------------
            $blog = Blog::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BlogTranslation::create([
                    'blog_id' => $blog->id,
                    'locale' => $lang->code,
                    'content' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/blog/blog-post/3 (1).webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/blog_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'blog',
                'manipulationable_id' => $blog->id,
                'document' => 'blog_image/' . $imageName,
                'collection_name' => 'blog_image',
            ]);
            Storage::put($path, $response->getBody());
//  blog 4 -------------------------------------------------------------------------------------------------
            $blog = Blog::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                BlogTranslation::create([
                    'blog_id' => $blog->id,
                    'locale' => $lang->code,
                    'content' => $this->faker->sentence(),
                ]);
            }

            $imageUrl = asset('frontend/assets/images/blog/blog-post/4 (1).webp');
            $client = new Client();
            $response = $client->get($imageUrl);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/blog_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'blog',
                'manipulationable_id' => $blog->id,
                'document' => 'blog_image/' . $imageName,
                'collection_name' => 'blog_image',
            ]);
            Storage::put($path, $response->getBody());


        });

    }
}
