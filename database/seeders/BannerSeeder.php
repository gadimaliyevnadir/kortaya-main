<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Document;
use App\Models\Language;
use App\Models\Setting;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BannerSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {
            $langs = Language::get();
// banner first ----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 1]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'Sun Hat  ',
                    'text' => 'Get Offer <b> For Summer',
                ]);
            }
            $url = asset('frontend/assets/images/banner/banner-1.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner first ----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 1]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'Ladies Bag',
                    'text' => 'Buy One  <b> Get One Free',
                ]);
            }
            $url = asset('frontend/assets/images/banner/banner-2.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner first ----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 1]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'Smart Watch',
                    'text' => '20% Off  <b> Smart Watch',
                ]);
            }
            $url = asset('frontend/assets/images/banner/banner-3.jpeg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner second ----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 2,]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'second',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/advhome_2.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner third ----------------------------------------------------------------------------------------------------------
            $banner = Banner::create([
                'banner_type' => 3,
            ]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'Up to <span>50%</span>  Off',
                    'text' => 'Office Dress',
                ]);
            }
            $url = asset('frontend/assets/images/banner/banner-4.avif');
            upload_image($url,'banner_image','banner',$banner->id);

// banner third 3----------------------------------------------------------------------------------------------------------
            $banner = Banner::create([
                'banner_type' => 3,
            ]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'Up to <span>40%</span>  Off',
                    'text' => 'All Products',
                ]);
            }
            $url = asset('frontend/assets/images/banner/banner-5.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner dorduncu 4----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 4,]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'brand banner menu',
                    'text' => '',
                    ]);
            }
            $url = asset('frontend/assets/images/some_images/brand_1.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner dorduncu 4----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 4,]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'brand banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/brand_2.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner dorduncu 4----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 4,]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'brand banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/brand_3.jpg');
            upload_image($url,'banner_image','banner',$banner->id);


// banner solution  5----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 5]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'solution banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/solution_1.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner solution  5----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 5]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'solution banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/solution_2.jpg');
            upload_image($url,'banner_image','banner',$banner->id);



// banner skincare  6----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 6]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'skincare banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/ul/1.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
            $banner = Banner::create(['banner_type' => 6]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'skincare banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/ul/2.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner   7 'makeup','accessory'----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 7]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'makeup accessory banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/makeup_1.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
            $banner = Banner::create(['banner_type' => 7]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'makeup accessory banner menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/makeup_2.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner   8 HAIR & BODY ----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 8]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'HAIR & BODY menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/hair_b.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
            $banner = Banner::create(['banner_type' => 8]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'HAIR & BODY menu',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/test/test.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
            $banner = Banner::create(['banner_type' => 8]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'brand',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/hair_b_2.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
// banner   9 etc ----------------------------------------------------------------------------------------------------------
            $banner = Banner::create(['banner_type' => 9]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'ETC',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/etc.jpg');
            upload_image($url,'banner_image','banner',$banner->id);
            $banner = Banner::create(['banner_type' => 9]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'ETC',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/etc_2.png');
            upload_image($url,'banner_image','banner',$banner->id);
            $banner = Banner::create(['banner_type' => 9]);
            foreach ($langs as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => 'ETC',
                    'text' => '',
                ]);
            }
            $url = asset('frontend/assets/images/some_images/etc_3.jpg');
            upload_image($url,'banner_image','banner',$banner->id);


        });





    }
}
