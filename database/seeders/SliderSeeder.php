<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Language;
use App\Models\Slider;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('sliders')->delete();
        $langs = Language::get();
//        slider 1    -------------------------------------------------------------------------------------
        $slider = Slider::create([
            'id' => 1,
            'order' => 1,
            'link' => '',
            'status' => 1,
            'created_at' => '2022-04-15 12:08:18',
            'updated_at' => '2022-04-15 12:08:18',
        ]);
        $imageUrl = asset('frontend/assets/images/slider/slide-1.jpg');
        $client = new Client();
        $response = $client->get($imageUrl);

        $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
        $path = 'public/documents/slider_image/' . $imageName;
        Document::create([
            'manipulationable_type' => 'slider',
            'manipulationable_id' => $slider->id,
            'document' => 'slider_image/' . $imageName,
            'collection_name' => 'slider_image',
        ]);
        Storage::put($path, $response->getBody());

        foreach ($langs as $lang) {
            $slider->translations()->create([
                'locale' => $lang->code,
                'name' => 'Women New <br/>
                                Collection',
                'text' => 'Up to 70% off selected Product',
            ]);
        }

        //        slider 2    -------------------------------------------------------------------------------------
        $slider = Slider::create([
            'id' => 2,
            'order' => 2,
            'link' => '',
            'status' => 1,
            'created_at' => '2022-04-15 12:08:18',
            'updated_at' => '2022-04-15 12:08:18',
        ]);
        $imageUrl = asset('frontend/assets/images/slider/slide-1-2.jpg');
        $client = new Client();
        $response = $client->get($imageUrl);

        $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
        $path = 'public/documents/slider_image/' . $imageName;
        Document::create([
            'manipulationable_type' => 'slider',
            'manipulationable_id' => $slider->id,
            'document' => 'slider_image/' . $imageName,
            'collection_name' => 'slider_image',
        ]);
        Storage::put($path, $response->getBody());

        foreach ($langs as $lang) {
            $slider->translations()->create([
                'locale' => $lang->code,
                'name' => 'Trend Fashion<br/>
                                Collection',
                'text' => 'Up to 40% off selected Product',
            ]);
        }
    }
}
