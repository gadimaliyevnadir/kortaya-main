<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Language;
use App\Models\Setting;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LanguageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('languages')->delete();
// Language 1 ----------------------------------------------------------------------------------------------------------
        $language = Language::create([
            'id' => 1,
            'name' => 'Azerbaijan',
            'code' => 'az',
            'default' => 1,
            'status' => 1,
            'created_at' => '2022-04-12 20:10:16',
            'updated_at' => '2022-04-12 20:10:16',
        ]);
        $imageUrl = asset('frontend/assets/images/test/azerbaijan.png');
        $client = new Client();
        $response = $client->get($imageUrl);

        $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
        $path = 'public/documents/language/' . $imageName;
        Document::create([
            'manipulationable_type' => 'language',
            'manipulationable_id' => $language->id,
            'document' => 'language/' . $imageName,
            'collection_name' => 'language',
        ]);
        Storage::put($path, $response->getBody());
 // Language 2 ----------------------------------------------------------------------------------------------------------
        $language = Language::create([
            'id' => 2,
            'name' => 'Русский',
            'code' => 'ru',
            'default' => 0,
            'status' => 1,
            'created_at' => '2022-04-12 20:10:16',
            'updated_at' => '2022-04-12 20:39:01',
        ]);
        $imageUrl = asset('frontend/assets/images/test/rus.png');
        $client = new Client();
        $response = $client->get($imageUrl);

        $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
        $path = 'public/documents/language/' . $imageName;
        Document::create([
            'manipulationable_type' => 'language',
            'manipulationable_id' => $language->id,
            'document' => 'language/' . $imageName,
            'collection_name' => 'language',
        ]);
        Storage::put($path, $response->getBody());
// Language 3 ----------------------------------------------------------------------------------------------------------
        $language = Language::create([
            'id' => 3,
            'name' => 'English',
            'code' => 'en',
            'default' => 0,
            'status' => 1,
            'created_at' => '2022-04-12 20:38:46',
            'updated_at' => '2022-04-12 20:39:06',
        ]);
        $imageUrl = asset('frontend/assets/images/test/usa.png');
        $client = new Client();
        $response = $client->get($imageUrl);

        $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
        $path = 'public/documents/language/' . $imageName;
        Document::create([
            'manipulationable_type' => 'language',
            'manipulationable_id' => $language->id,
            'document' => 'language/' . $imageName,
            'collection_name' => 'language',
        ]);
        Storage::put($path, $response->getBody());
//----------------------------------------------------------------------------------------
    }
}
