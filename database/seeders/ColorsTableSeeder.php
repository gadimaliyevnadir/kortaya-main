<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'id' => 45,
                'color_code' => '#000000',
                'status' => '1',
                'order' => 1,
                'created_at' => '2022-04-12 20:47:52',
                'updated_at' => '2022-04-12 20:47:52',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 46,
                'color_code' => '#FFFFFF',
                'status' => '1',
                'order' => 2,
                'created_at' => '2022-04-12 20:47:55',
                'updated_at' => '2022-04-12 20:47:55',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 47,
                'color_code' => '#0000e7',
                'status' => '1',
                'order' => 3,
                'created_at' => '2022-04-12 20:47:57',
                'updated_at' => '2022-04-12 20:47:57',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 48,
                'color_code' => '#ef0000',
                'status' => '1',
                'order' => 4,
                'created_at' => '2022-04-12 20:48:41',
                'updated_at' => '2022-04-12 20:48:41',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 49,
                'color_code' => '#ffd700',
                'status' => '1',
                'order' => 5,
                'created_at' => '2022-04-12 20:48:50',
                'updated_at' => '2022-04-12 20:48:50',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 50,
                'color_code' => '#ff90b0',
                'status' => '1',
                'order' => 6,
                'created_at' => '2022-04-12 20:50:59',
                'updated_at' => '2022-04-12 20:50:59',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 51,
                'color_code' => '#e1e1e1',
                'status' => '1',
                'order' => 7,
                'created_at' => '2022-04-12 20:51:09',
                'updated_at' => '2022-04-12 20:51:09',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 53,
                'color_code' => '#89cff0',
                'status' => '0',
                'order' => 8,
                'created_at' => '2022-04-12 20:51:19',
                'updated_at' => '2022-04-12 20:51:19',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 54,
                'color_code' => '#1b1e23',
                'status' => '0',
                'order' => 9,
                'created_at' => '2022-04-12 20:53:37',
                'updated_at' => '2022-04-12 20:53:37',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 55,
                'color_code' => '#18a0a2',
                'status' => '0',
                'order' => 10,
                'created_at' => '2022-04-12 21:00:06',
                'updated_at' => '2022-04-12 21:00:06',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 56,
                'color_code' => '#9b9b9b',
                'status' => '1',
                'order' => 11,
                'created_at' => '2022-04-12 21:01:13',
                'updated_at' => '2022-04-12 21:01:13',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 57,
                'color_code' => '#deab6c',
                'status' => '1',
                'order' => 12,
                'created_at' => '2022-04-12 21:01:16',
                'updated_at' => '2022-04-12 21:01:16',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 59,
                'color_code' => '#a5adb0',
                'status' => '0',
                'order' => 13,
                'created_at' => '2022-04-12 21:03:14',
                'updated_at' => '2022-04-12 21:03:14',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 60,
                'color_code' => '#C0C0C0',
                'status' => '1',
                'order' => 14,
                'created_at' => '2022-04-12 21:03:18',
                'updated_at' => '2022-04-12 21:03:18',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 61,
                'color_code' => '#ffff00',
                'status' => '0',
                'order' => 15,
                'created_at' => '2022-04-12 21:03:20',
                'updated_at' => '2022-04-12 21:03:20',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 63,
                'color_code' => '#EE4443',
                'status' => '0',
                'order' => 16,
                'created_at' => '2022-04-12 21:05:05',
                'updated_at' => '2022-04-12 21:05:05',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 64,
                'color_code' => '#c0ac94',
                'status' => '0',
                'order' => 17,
                'created_at' => '2022-04-12 21:06:40',
                'updated_at' => '2022-04-12 21:06:40',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 65,
                'color_code' => '#1b1e23',
                'status' => '0',
                'order' => 18,
                'created_at' => '2022-04-12 21:08:58',
                'updated_at' => '2022-04-12 21:08:58',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 67,
                'color_code' => '#848096',
                'status' => '0',
                'order' => 19,
                'created_at' => '2022-04-12 21:13:15',
                'updated_at' => '2022-04-12 21:13:15',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 68,
                'color_code' => '#4e658f',
                'status' => '0',
                'order' => 20,
                'created_at' => '2022-04-12 21:21:46',
                'updated_at' => '2022-04-12 21:21:46',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 69,
                'color_code' => '#e9cddf',
                'status' => '0',
                'order' => 21,
                'created_at' => '2022-04-12 21:22:16',
                'updated_at' => '2022-04-12 21:22:16',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 70,
                'color_code' => '#d5eef1',
                'status' => '0',
                'order' => 22,
                'created_at' => '2022-04-12 22:34:48',
                'updated_at' => '2022-04-12 22:34:48',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 71,
                'color_code' => '#040301',
                'status' => '0',
                'order' => 23,
                'created_at' => '2022-04-12 22:42:24',
                'updated_at' => '2022-04-12 22:42:24',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 72,
                'color_code' => '#2359a8',
                'status' => '0',
                'order' => 24,
                'created_at' => '2022-04-12 22:44:58',
                'updated_at' => '2022-04-12 22:44:58',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 73,
                'color_code' => '#FC766A',
                'status' => '0',
                'order' => 25,
                'created_at' => '2022-04-12 22:46:22',
                'updated_at' => '2022-04-12 22:46:22',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 74,
                'color_code' => '#41ac65',
                'status' => '0',
                'order' => 26,
                'created_at' => '2022-04-12 22:48:04',
                'updated_at' => '2022-04-12 22:48:04',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 75,
                'color_code' => '#fcff00',
                'status' => '0',
                'order' => 27,
                'created_at' => '2022-04-12 22:48:44',
                'updated_at' => '2022-04-12 22:48:44',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 76,
                'color_code' => '#f3f3f3',
                'status' => '0',
                'order' => 28,
                'created_at' => '2022-04-12 22:52:26',
                'updated_at' => '2022-04-12 22:52:26',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 77,
                'color_code' => '#817990',
                'status' => '0',
                'order' => 29,
                'created_at' => '2022-04-12 22:52:36',
                'updated_at' => '2022-04-12 22:52:36',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 78,
                'color_code' => '#b5b8bd',
                'status' => '0',
                'order' => 30,
                'created_at' => '2022-04-12 22:52:47',
                'updated_at' => '2022-04-12 22:52:47',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 80,
                'color_code' => '#c200c2',
                'status' => '0',
                'order' => 31,
                'created_at' => '2022-04-12 22:53:17',
                'updated_at' => '2022-04-12 22:53:17',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 81,
                'color_code' => '#9866ff',
                'status' => '0',
                'order' => 32,
                'created_at' => '2022-04-12 22:54:52',
                'updated_at' => '2022-04-12 22:54:52',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 82,
                'color_code' => '#7d7c82',
                'status' => '0',
                'order' => 33,
                'created_at' => '2022-04-12 22:59:08',
                'updated_at' => '2022-04-12 22:59:08',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 83,
                'color_code' => '#306347',
                'status' => '0',
                'order' => 34,
                'created_at' => '2022-04-12 23:01:03',
                'updated_at' => '2022-04-12 23:01:03',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 84,
                'color_code' => '#000000',
                'status' => '0',
                'order' => 35,
                'created_at' => '2022-04-12 23:01:23',
                'updated_at' => '2022-04-12 23:01:23',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 85,
                'color_code' => '#FFFFFF',
                'status' => '0',
                'order' => 36,
                'created_at' => '2022-04-12 23:01:25',
                'updated_at' => '2022-04-12 23:01:25',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 86,
                'color_code' => '#00e064',
                'status' => '1',
                'order' => 37,
                'created_at' => '2022-04-12 23:01:43',
                'updated_at' => '2022-04-12 23:01:43',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 87,
                'color_code' => '#ffd700',
                'status' => '0',
                'order' => 38,
                'created_at' => '2022-04-12 23:02:06',
                'updated_at' => '2022-04-12 23:02:06',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 89,
                'color_code' => '#000000',
                'status' => '0',
                'order' => 39,
                'created_at' => '2022-04-12 23:02:08',
                'updated_at' => '2022-04-12 23:02:08',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 90,
                'color_code' => '#0000e7',
                'status' => '0',
                'order' => 40,
                'created_at' => '2022-04-12 23:05:19',
                'updated_at' => '2022-04-12 23:05:19',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 91,
                'color_code' => '#ff90b0',
                'status' => '0',
                'order' => 41,
                'created_at' => '2022-04-12 23:05:24',
                'updated_at' => '2022-04-12 23:05:24',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 93,
                'color_code' => '#4690ff',
                'status' => '1',
                'order' => 42,
                'created_at' => '2022-04-12 23:05:37',
                'updated_at' => '2022-04-12 23:05:37',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 94,
                'color_code' => '#ffff00',
                'status' => '1',
                'order' => 43,
                'created_at' => '2022-04-12 23:06:06',
                'updated_at' => '2022-04-12 23:06:06',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 95,
                'color_code' => '#FFFFFF',
                'status' => '1',
                'order' => 44,
                'created_at' => '2022-04-12 23:06:18',
                'updated_at' => '2022-04-12 23:06:18',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 96,
                'color_code' => '#c200c2',
                'status' => '1',
                'order' => 45,
                'created_at' => '2022-04-12 23:06:27',
                'updated_at' => '2022-04-12 23:06:27',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 97,
                'color_code' => NULL,
                'status' => '1',
                'order' => 46,
                'created_at' => '2022-04-12 23:07:07',
                'updated_at' => '2022-04-12 23:07:07',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 98,
                'color_code' => '#C0C0C0',
                'status' => '0',
                'order' => 47,
                'created_at' => '2022-04-12 23:07:19',
                'updated_at' => '2022-04-12 23:07:19',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 99,
                'color_code' => '#ffa500',
                'status' => '1',
                'order' => 48,
                'created_at' => '2022-04-12 23:07:32',
                'updated_at' => '2022-04-12 23:07:32',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 100,
                'color_code' => '#a52a2a',
                'status' => '1',
                'order' => 49,
                'created_at' => '2022-04-12 23:07:43',
                'updated_at' => '2022-04-12 23:07:43',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 101,
                'color_code' => '#fffdd1',
                'status' => '1',
                'order' => 50,
                'created_at' => '2022-04-12 23:07:45',
                'updated_at' => '2022-04-12 23:07:45',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 102,
                'color_code' => '#30d5c8',
                'status' => '1',
                'order' => 51,
                'created_at' => '2022-04-12 23:09:16',
                'updated_at' => '2022-04-12 23:09:16',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 103,
                'color_code' => '#aaa9ad',
                'status' => '1',
                'order' => 52,
                'created_at' => '2022-04-12 23:09:18',
                'updated_at' => '2022-04-12 23:09:18',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 104,
                'color_code' => '',
                'status' => '1',
                'order' => 53,
                'created_at' => '2022-04-12 23:09:19',
                'updated_at' => '2022-04-12 23:09:19',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 106,
                'color_code' => '',
                'status' => '1',
                'order' => 54,
                'created_at' => '2022-04-12 23:09:38',
                'updated_at' => '2022-04-12 23:09:38',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 107,
                'color_code' => '',
                'status' => '1',
                'order' => 55,
                'created_at' => '2022-04-12 23:09:40',
                'updated_at' => '2022-04-12 23:09:40',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 108,
                'color_code' => '',
                'status' => '1',
                'order' => 56,
                'created_at' => '2022-04-12 23:09:51',
                'updated_at' => '2022-04-12 23:09:51',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 109,
                'color_code' => '',
                'status' => '1',
                'order' => 57,
                'created_at' => '2022-04-12 23:09:53',
                'updated_at' => '2022-04-12 23:09:53',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 110,
                'color_code' => '',
                'status' => '1',
                'order' => 58,
                'created_at' => '2022-04-12 23:09:54',
                'updated_at' => '2022-04-12 23:09:54',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 111,
                'color_code' => '',
                'status' => '1',
                'order' => 59,
                'created_at' => '2022-04-12 23:10:04',
                'updated_at' => '2022-04-12 23:10:04',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 112,
                'color_code' => '',
                'status' => '1',
                'order' => 60,
                'created_at' => '2022-04-12 23:10:48',
                'updated_at' => '2022-04-12 23:10:48',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 113,
                'color_code' => '',
                'status' => '1',
                'order' => 61,
                'created_at' => '2022-04-12 23:10:51',
                'updated_at' => '2022-04-12 23:10:51',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 114,
                'color_code' => '',
                'status' => '1',
                'order' => 62,
                'created_at' => '2022-04-12 23:10:53',
                'updated_at' => '2022-04-12 23:10:53',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 115,
                'color_code' => '',
                'status' => '1',
                'order' => 63,
                'created_at' => '2022-04-12 23:10:55',
                'updated_at' => '2022-04-12 23:10:55',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 116,
                'color_code' => '',
                'status' => '1',
                'order' => 64,
                'created_at' => '2022-04-12 23:10:56',
                'updated_at' => '2022-04-12 23:10:56',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 117,
                'color_code' => '',
                'status' => '1',
                'order' => 65,
                'created_at' => '2022-04-12 23:10:58',
                'updated_at' => '2022-04-12 23:10:58',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 118,
                'color_code' => '',
                'status' => '1',
                'order' => 66,
                'created_at' => '2022-04-12 23:11:00',
                'updated_at' => '2022-04-12 23:11:00',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 119,
                'color_code' => '1717',
                'status' => '1',
                'order' => 67,
                'created_at' => '2022-04-12 23:11:02',
                'updated_at' => '2022-04-12 23:11:02',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 120,
                'color_code' => '3636',
                'status' => '1',
                'order' => 68,
                'created_at' => '2022-04-12 23:11:03',
                'updated_at' => '2022-04-12 23:11:03',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}