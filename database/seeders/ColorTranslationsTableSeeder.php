<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('color_translations')->delete();
        
        \DB::table('color_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'color_id' => 45,
                'name' => 'Qara',
                'slug' => 'qara',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'color_id' => 45,
                'name' => 'Black',
                'slug' => 'black',
                'locale' => 'en',
            ),
            2 => 
            array (
                'id' => 3,
                'color_id' => 45,
                'name' => 'Черный',
                'slug' => 'chernyj',
                'locale' => 'ru',
            ),
            3 => 
            array (
                'id' => 4,
                'color_id' => 46,
                'name' => 'Ağ',
                'slug' => 'ag',
                'locale' => 'az',
            ),
            4 => 
            array (
                'id' => 5,
                'color_id' => 46,
                'name' => 'White',
                'slug' => 'white',
                'locale' => 'en',
            ),
            5 => 
            array (
                'id' => 6,
                'color_id' => 46,
                'name' => 'Белый',
                'slug' => 'belyj',
                'locale' => 'ru',
            ),
            6 => 
            array (
                'id' => 7,
                'color_id' => 47,
                'name' => 'Göy',
                'slug' => 'goy',
                'locale' => 'az',
            ),
            7 => 
            array (
                'id' => 8,
                'color_id' => 47,
                'name' => 'Blue',
                'slug' => 'blue',
                'locale' => 'en',
            ),
            8 => 
            array (
                'id' => 9,
                'color_id' => 47,
                'name' => 'Синий',
                'slug' => 'sinij',
                'locale' => 'ru',
            ),
            9 => 
            array (
                'id' => 10,
                'color_id' => 48,
                'name' => 'Qırmızı',
                'slug' => 'qirmizi',
                'locale' => 'az',
            ),
            10 => 
            array (
                'id' => 11,
                'color_id' => 48,
                'name' => 'Red',
                'slug' => 'red',
                'locale' => 'en',
            ),
            11 => 
            array (
                'id' => 12,
                'color_id' => 48,
                'name' => 'Красный',
                'slug' => 'krasnyj',
                'locale' => 'ru',
            ),
            12 => 
            array (
                'id' => 13,
                'color_id' => 49,
                'name' => 'Qızılı',
                'slug' => 'qizili',
                'locale' => 'az',
            ),
            13 => 
            array (
                'id' => 14,
                'color_id' => 49,
                'name' => 'Gold',
                'slug' => 'gold',
                'locale' => 'en',
            ),
            14 => 
            array (
                'id' => 15,
                'color_id' => 49,
                'name' => 'Золотой',
                'slug' => 'zolotoy',
                'locale' => 'ru',
            ),
            15 => 
            array (
                'id' => 16,
                'color_id' => 50,
                'name' => 'Çəhrayı',
                'slug' => 'cehrayi',
                'locale' => 'az',
            ),
            16 => 
            array (
                'id' => 17,
                'color_id' => 50,
                'name' => 'Pink',
                'slug' => 'pink',
                'locale' => 'en',
            ),
            17 => 
            array (
                'id' => 18,
                'color_id' => 50,
                'name' => 'Розовый',
                'slug' => 'rozovyj',
                'locale' => 'ru',
            ),
            18 => 
            array (
                'id' => 19,
                'color_id' => 51,
                'name' => 'Boz',
                'slug' => 'boz',
                'locale' => 'az',
            ),
            19 => 
            array (
                'id' => 20,
                'color_id' => 51,
                'name' => 'Grey',
                'slug' => 'grey',
                'locale' => 'en',
            ),
            20 => 
            array (
                'id' => 21,
                'color_id' => 51,
                'name' => 'Серый',
                'slug' => 'seryj',
                'locale' => 'ru',
            ),
            21 => 
            array (
                'id' => 22,
                'color_id' => 53,
                'name' => 'Açıq mavi',
                'slug' => 'aciq-mavi',
                'locale' => 'az',
            ),
            22 => 
            array (
                'id' => 24,
                'color_id' => 53,
                'name' => 'Light Blue',
                'slug' => 'light-blue',
                'locale' => 'en',
            ),
            23 => 
            array (
                'id' => 25,
                'color_id' => 53,
                'name' => 'Светло-синий',
                'slug' => 'svetlo-ciny',
                'locale' => 'ru',
            ),
            24 => 
            array (
                'id' => 26,
                'color_id' => 54,
                'name' => 'Midnight Black',
                'slug' => 'midnight-black',
                'locale' => 'az',
            ),
            25 => 
            array (
                'id' => 28,
                'color_id' => 54,
                'name' => 'Midnight Black',
                'slug' => 'midnight-black-en',
                'locale' => 'en',
            ),
            26 => 
            array (
                'id' => 29,
                'color_id' => 54,
                'name' => 'Полночь черный',
                'slug' => 'polnoch-chernyj',
                'locale' => 'ru',
            ),
            27 => 
            array (
                'id' => 30,
                'color_id' => 55,
                'name' => 'Aurora синий',
                'slug' => 'aurora-sinij',
                'locale' => 'az',
            ),
            28 => 
            array (
                'id' => 31,
                'color_id' => 55,
                'name' => 'Aurora Blue',
                'slug' => 'aurora-blue',
                'locale' => 'en',
            ),
            29 => 
            array (
                'id' => 32,
                'color_id' => 55,
                'name' => 'Аврора Блю',
                'slug' => 'avrora-blyu',
                'locale' => 'ru',
            ),
            30 => 
            array (
                'id' => 33,
                'color_id' => 56,
                'name' => 'Tünd boz',
                'slug' => 'tund-boz',
                'locale' => 'az',
            ),
            31 => 
            array (
                'id' => 34,
                'color_id' => 56,
                'name' => 'Dark grey',
                'slug' => 'dark-grey',
                'locale' => 'en',
            ),
            32 => 
            array (
                'id' => 35,
                'color_id' => 56,
                'name' => 'Темно-серый',
                'slug' => 'temno-seryj',
                'locale' => 'ru',
            ),
            33 => 
            array (
                'id' => 36,
                'color_id' => 57,
                'name' => 'Rose Gold',
                'slug' => 'rose-gold',
                'locale' => 'az',
            ),
            34 => 
            array (
                'id' => 38,
                'color_id' => 57,
                'name' => 'Rose Gold',
                'slug' => 'rose-gold-en',
                'locale' => 'en',
            ),
            35 => 
            array (
                'id' => 39,
                'color_id' => 57,
                'name' => 'Розовое золото',
                'slug' => 'rozovoe-zoloto',
                'locale' => 'ru',
            ),
            36 => 
            array (
                'id' => 40,
                'color_id' => 59,
                'name' => 'Space Gray',
                'slug' => 'space-gray',
                'locale' => 'az',
            ),
            37 => 
            array (
                'id' => 41,
                'color_id' => 59,
                'name' => 'Space Grey',
                'slug' => 'space-grey',
                'locale' => 'en',
            ),
            38 => 
            array (
                'id' => 42,
                'color_id' => 59,
                'name' => 'Космический серый',
                'slug' => 'kosmicheskij-seryj',
                'locale' => 'ru',
            ),
            39 => 
            array (
                'id' => 43,
                'color_id' => 60,
                'name' => 'Gümüşü',
                'slug' => 'gumusu',
                'locale' => 'az',
            ),
            40 => 
            array (
                'id' => 44,
                'color_id' => 60,
                'name' => 'Silver',
                'slug' => 'silver',
                'locale' => 'en',
            ),
            41 => 
            array (
                'id' => 45,
                'color_id' => 60,
                'name' => 'Серебряный',
                'slug' => 'serebryanyj',
                'locale' => 'ru',
            ),
            42 => 
            array (
                'id' => 46,
                'color_id' => 61,
                'name' => 'Sarı',
                'slug' => 'sari',
                'locale' => 'az',
            ),
            43 => 
            array (
                'id' => 48,
                'color_id' => 61,
                'name' => 'Yellow',
                'slug' => 'yellow',
                'locale' => 'en',
            ),
            44 => 
            array (
                'id' => 49,
                'color_id' => 61,
                'name' => 'Желтый',
                'slug' => 'zheltyj',
                'locale' => 'ru',
            ),
            45 => 
            array (
                'id' => 50,
                'color_id' => 63,
                'name' => 'Coral',
                'slug' => 'coral',
                'locale' => 'az',
            ),
            46 => 
            array (
                'id' => 52,
                'color_id' => 63,
                'name' => 'Coral',
                'slug' => 'coral-en',
                'locale' => 'en',
            ),
            47 => 
            array (
                'id' => 53,
                'color_id' => 63,
                'name' => 'Коралловый',
                'slug' => 'korallovyj',
                'locale' => 'ru',
            ),
            48 => 
            array (
                'id' => 54,
                'color_id' => 64,
                'name' => 'Maple gold',
                'slug' => 'maple-gold',
                'locale' => 'az',
            ),
            49 => 
            array (
                'id' => 56,
                'color_id' => 64,
                'name' => 'Maple gold',
                'slug' => 'maple-gold-en',
                'locale' => 'en',
            ),
            50 => 
            array (
                'id' => 57,
                'color_id' => 64,
                'name' => 'Клен золотой',
                'slug' => 'klen-zolotoj',
                'locale' => 'ru',
            ),
            51 => 
            array (
                'id' => 58,
                'color_id' => 65,
                'name' => 'Midnight black_',
                'slug' => 'midnight-black-1',
                'locale' => 'az',
            ),
            52 => 
            array (
                'id' => 60,
                'color_id' => 65,
                'name' => 'Midnight black_',
                'slug' => 'Midnight black_en2',
                'locale' => 'en',
            ),
            53 => 
            array (
                'id' => 61,
                'color_id' => 65,
                'name' => 'Полночь черный_',
                'slug' => 'polnoch-chernyj-ru2',
                'locale' => 'ru',
            ),
            54 => 
            array (
                'id' => 62,
                'color_id' => 67,
                'name' => 'Orchid grey',
                'slug' => 'orchid-grey',
                'locale' => 'az',
            ),
            55 => 
            array (
                'id' => 64,
                'color_id' => 67,
                'name' => 'Orchid Gray',
                'slug' => 'orchid-gray-en',
                'locale' => 'en',
            ),
            56 => 
            array (
                'id' => 65,
                'color_id' => 67,
                'name' => 'Orchid Gray',
                'slug' => 'orchid-gray-ru',
                'locale' => 'ru',
            ),
            57 => 
            array (
                'id' => 66,
                'color_id' => 68,
                'name' => 'Ocean Blue Galaxy',
                'slug' => 'ocean-blue-galaxy',
                'locale' => 'az',
            ),
            58 => 
            array (
                'id' => 67,
                'color_id' => 68,
                'name' => 'Ocean Blue Galaxy',
                'slug' => 'ocean-blue-rngalaxy-en',
                'locale' => 'en',
            ),
            59 => 
            array (
                'id' => 68,
                'color_id' => 68,
                'name' => 'Океан Голубая Галактика',
                'slug' => 'okean-golubaya-galaktika',
                'locale' => 'ru',
            ),
            60 => 
            array (
                'id' => 69,
                'color_id' => 69,
                'name' => 'Lavender Purple ',
                'slug' => 'lavender-purple',
                'locale' => 'az',
            ),
            61 => 
            array (
                'id' => 70,
                'color_id' => 69,
                'name' => 'Lavender Purple ',
                'slug' => 'lavender-purple-en',
                'locale' => 'en',
            ),
            62 => 
            array (
                'id' => 71,
                'color_id' => 69,
                'name' => 'Фиолетовый лаванда',
                'slug' => 'fioletovyj-lavanda',
                'locale' => 'ru',
            ),
            63 => 
            array (
                'id' => 72,
                'color_id' => 70,
                'name' => 'Prizma Ağ',
                'slug' => 'prizma-ag',
                'locale' => 'az',
            ),
            64 => 
            array (
                'id' => 74,
                'color_id' => 70,
                'name' => 'Prism White',
                'slug' => 'prism-white',
                'locale' => 'en',
            ),
            65 => 
            array (
                'id' => 75,
                'color_id' => 70,
                'name' => 'Белая призма',
                'slug' => 'belaya-prizma',
                'locale' => 'ru',
            ),
            66 => 
            array (
                'id' => 76,
                'color_id' => 71,
                'name' => 'Prizma Qara',
                'slug' => 'prizma-qara',
                'locale' => 'az',
            ),
            67 => 
            array (
                'id' => 77,
                'color_id' => 71,
                'name' => 'Prism Black',
                'slug' => 'prism-black',
                'locale' => 'en',
            ),
            68 => 
            array (
                'id' => 78,
                'color_id' => 71,
                'name' => 'Черный призма',
                'slug' => 'corniy-prizma',
                'locale' => 'ru',
            ),
            69 => 
            array (
                'id' => 79,
                'color_id' => 72,
                'name' => 'Prizma Mavi',
                'slug' => 'prizma-mavi',
                'locale' => 'az',
            ),
            70 => 
            array (
                'id' => 80,
                'color_id' => 72,
                'name' => 'Prism Blue',
                'slug' => 'prism-blue',
                'locale' => 'en',
            ),
            71 => 
            array (
                'id' => 81,
                'color_id' => 72,
                'name' => 'Голубая призма',
                'slug' => 'qolubaya-prizma',
                'locale' => 'ru',
            ),
            72 => 
            array (
                'id' => 82,
                'color_id' => 73,
                'name' => 'Flamingo Çəhrayı',
                'slug' => 'flamingo-cehrayi',
                'locale' => 'az',
            ),
            73 => 
            array (
                'id' => 83,
                'color_id' => 73,
                'name' => 'Flamingo Pink',
                'slug' => 'flamingo-pink',
                'locale' => 'en',
            ),
            74 => 
            array (
                'id' => 84,
                'color_id' => 73,
                'name' => 'Розовый фламинго',
                'slug' => 'flamingo-rozivy',
                'locale' => 'ru',
            ),
            75 => 
            array (
                'id' => 85,
                'color_id' => 74,
                'name' => 'Prizma Yaşıl',
                'slug' => 'prizma-yasil',
                'locale' => 'az',
            ),
            76 => 
            array (
                'id' => 86,
                'color_id' => 74,
                'name' => 'Prism Green',
                'slug' => 'prism-green',
                'locale' => 'en',
            ),
            77 => 
            array (
                'id' => 87,
                'color_id' => 74,
                'name' => 'Зеленая призма',
                'slug' => 'zelony-prizma',
                'locale' => 'ru',
            ),
            78 => 
            array (
                'id' => 88,
                'color_id' => 75,
                'name' => 'Kanar sarısı',
                'slug' => 'canar-sarisi',
                'locale' => 'az',
            ),
            79 => 
            array (
                'id' => 89,
                'color_id' => 75,
                'name' => 'Canary Yellow',
                'slug' => 'canary-yellow',
                'locale' => 'en',
            ),
            80 => 
            array (
                'id' => 90,
                'color_id' => 75,
                'name' => 'Канарейка желтая',
                'slug' => 'kanarejka-zheltaya',
                'locale' => 'ru',
            ),
            81 => 
            array (
                'id' => 91,
                'color_id' => 76,
                'name' => 'Keramika Ağ',
                'slug' => 'keramika-ag',
                'locale' => 'az',
            ),
            82 => 
            array (
                'id' => 92,
                'color_id' => 76,
                'name' => 'Ceramic White',
                'slug' => 'ceramic-white',
                'locale' => 'en',
            ),
            83 => 
            array (
                'id' => 93,
                'color_id' => 76,
                'name' => 'Керамический белый',
                'slug' => 'keramicheskij-belyj',
                'locale' => 'ru',
            ),
            84 => 
            array (
                'id' => 94,
                'color_id' => 77,
                'name' => 'Orkide Boz',
                'slug' => 'orkide-boz',
                'locale' => 'az',
            ),
            85 => 
            array (
                'id' => 95,
                'color_id' => 77,
                'name' => 'Orchid Gray',
                'slug' => 'orchid-gray',
                'locale' => 'en',
            ),
            86 => 
            array (
                'id' => 96,
                'color_id' => 77,
                'name' => 'Серая орхидея',
                'slug' => 'seriy-orxide',
                'locale' => 'ru',
            ),
            87 => 
            array (
                'id' => 97,
                'color_id' => 78,
                'name' => 'Arktik Gümüş',
                'slug' => 'artik-gumus',
                'locale' => 'az',
            ),
            88 => 
            array (
                'id' => 98,
                'color_id' => 78,
                'name' => 'Arctic Silver',
                'slug' => 'arctic-silver',
                'locale' => 'en',
            ),
            89 => 
            array (
                'id' => 99,
                'color_id' => 78,
                'name' => 'Арктическое серебро',
                'slug' => 'arkticheskoe-serebro',
                'locale' => 'ru',
            ),
            90 => 
            array (
                'id' => 100,
                'color_id' => 80,
                'name' => 'Bənövşəyi',
                'slug' => 'benevsoyi',
                'locale' => 'az',
            ),
            91 => 
            array (
                'id' => 101,
                'color_id' => 80,
                'name' => 'Purple',
                'slug' => 'purple',
                'locale' => 'en',
            ),
            92 => 
            array (
                'id' => 102,
                'color_id' => 80,
                'name' => 'Фиолетовый',
                'slug' => 'fioletovyj',
                'locale' => 'ru',
            ),
            93 => 
            array (
                'id' => 103,
                'color_id' => 81,
                'name' => 'Yasəmən Bənövşəyi',
                'slug' => 'yasemen-benovseyi',
                'locale' => 'az',
            ),
            94 => 
            array (
                'id' => 104,
                'color_id' => 81,
                'name' => 'Lilac Purple',
                'slug' => 'lilac-purple',
                'locale' => 'en',
            ),
            95 => 
            array (
                'id' => 106,
                'color_id' => 81,
                'name' => 'Сиреневый фиолетовый',
                'slug' => 'sirenevyj-fioletovyj',
                'locale' => 'ru',
            ),
            96 => 
            array (
                'id' => 107,
                'color_id' => 82,
                'name' => 'Titan Boz',
                'slug' => 'titan-boz',
                'locale' => 'az',
            ),
            97 => 
            array (
                'id' => 108,
                'color_id' => 82,
                'name' => 'Titanium Gray',
                'slug' => 'titanium-gray',
                'locale' => 'en',
            ),
            98 => 
            array (
                'id' => 109,
                'color_id' => 82,
                'name' => 'Титановый серый',
                'slug' => 'titanovyj-seryj',
                'locale' => 'ru',
            ),
            99 => 
            array (
                'id' => 110,
                'color_id' => 83,
                'name' => 'Gecəyarısı Yaşıl',
                'slug' => 'geceyarisi-yasil',
                'locale' => 'az',
            ),
            100 => 
            array (
                'id' => 111,
                'color_id' => 83,
                'name' => 'Midnight Green',
                'slug' => 'midnight-green',
                'locale' => 'en',
            ),
            101 => 
            array (
                'id' => 112,
                'color_id' => 83,
                'name' => 'Полуночный зеленый',
                'slug' => 'polunochnyy-zelenyy',
                'locale' => 'ru',
            ),
            102 => 
            array (
                'id' => 113,
                'color_id' => 84,
                'name' => 'Qara_',
                'slug' => 'qara-1',
                'locale' => 'az',
            ),
            103 => 
            array (
                'id' => 114,
                'color_id' => 84,
                'name' => 'Black',
                'slug' => 'black-1',
                'locale' => 'en',
            ),
            104 => 
            array (
                'id' => 115,
                'color_id' => 84,
                'name' => 'Черный',
                'slug' => 'chernyj-1',
                'locale' => 'ru',
            ),
            105 => 
            array (
                'id' => 116,
                'color_id' => 85,
                'name' => 'Ağ_',
                'slug' => 'ag-1',
                'locale' => 'az',
            ),
            106 => 
            array (
                'id' => 117,
                'color_id' => 85,
                'name' => 'White',
                'slug' => 'white-1',
                'locale' => 'en',
            ),
            107 => 
            array (
                'id' => 118,
                'color_id' => 85,
                'name' => 'Белый',
                'slug' => 'belyj-1',
                'locale' => 'ru',
            ),
            108 => 
            array (
                'id' => 119,
                'color_id' => 86,
                'name' => 'Yaşıl',
                'slug' => 'yasil',
                'locale' => 'az',
            ),
            109 => 
            array (
                'id' => 120,
                'color_id' => 86,
                'name' => 'Green',
                'slug' => 'green',
                'locale' => 'en',
            ),
            110 => 
            array (
                'id' => 121,
                'color_id' => 86,
                'name' => 'Зеленый',
                'slug' => 'zelenyj',
                'locale' => 'ru',
            ),
            111 => 
            array (
                'id' => 122,
                'color_id' => 87,
                'name' => 'Qızılı_',
                'slug' => 'qizili-1',
                'locale' => 'az',
            ),
            112 => 
            array (
                'id' => 123,
                'color_id' => 87,
                'name' => 'Gold',
                'slug' => 'gold-1',
                'locale' => 'en',
            ),
            113 => 
            array (
                'id' => 124,
                'color_id' => 87,
                'name' => 'Золото',
                'slug' => 'zoloto',
                'locale' => 'ru',
            ),
            114 => 
            array (
                'id' => 125,
                'color_id' => 89,
                'name' => 'Cosmos black',
                'slug' => 'cosmos-black-az',
                'locale' => 'az',
            ),
            115 => 
            array (
                'id' => 127,
                'color_id' => 89,
                'name' => 'Cosmos black',
                'slug' => 'Cosmos black-en',
                'locale' => 'en',
            ),
            116 => 
            array (
                'id' => 128,
                'color_id' => 89,
                'name' => 'Космос черный',
                'slug' => 'kosmos-chernyj',
                'locale' => 'ru',
            ),
            117 => 
            array (
                'id' => 129,
                'color_id' => 90,
                'name' => 'Göy',
                'slug' => 'blue-1',
                'locale' => 'az',
            ),
            118 => 
            array (
                'id' => 130,
                'color_id' => 90,
                'name' => 'Blue',
                'slug' => 'blue-3',
                'locale' => 'en',
            ),
            119 => 
            array (
                'id' => 131,
                'color_id' => 90,
                'name' => 'Blue',
                'slug' => 'blue-2',
                'locale' => 'ru',
            ),
            120 => 
            array (
                'id' => 132,
                'color_id' => 91,
                'name' => 'Pink',
                'slug' => 'pink-1',
                'locale' => 'az',
            ),
            121 => 
            array (
                'id' => 133,
                'color_id' => 91,
                'name' => 'Pink',
                'slug' => 'pink-3',
                'locale' => 'en',
            ),
            122 => 
            array (
                'id' => 134,
                'color_id' => 91,
                'name' => 'Pink',
                'slug' => 'pink-2',
                'locale' => 'ru',
            ),
            123 => 
            array (
                'id' => 135,
                'color_id' => 93,
                'name' => 'Mavi',
                'slug' => 'mavi',
                'locale' => 'az',
            ),
            124 => 
            array (
                'id' => 136,
                'color_id' => 93,
                'name' => 'Blue',
                'slug' => 'blue-4',
                'locale' => 'en',
            ),
            125 => 
            array (
                'id' => 137,
                'color_id' => 93,
                'name' => 'Синий',
                'slug' => 'sinij-1',
                'locale' => 'ru',
            ),
            126 => 
            array (
                'id' => 138,
                'color_id' => 94,
                'name' => 'Sarı',
                'slug' => 'sari-1',
                'locale' => 'az',
            ),
            127 => 
            array (
                'id' => 139,
                'color_id' => 94,
                'name' => 'Yellow',
                'slug' => 'yellow-1',
                'locale' => 'en',
            ),
            128 => 
            array (
                'id' => 140,
                'color_id' => 94,
                'name' => 'Желтый',
                'slug' => 'zheltyj-1',
                'locale' => 'ru',
            ),
            129 => 
            array (
                'id' => 141,
                'color_id' => 95,
                'name' => 'Şəffaf',
                'slug' => 'seffaf',
                'locale' => 'az',
            ),
            130 => 
            array (
                'id' => 142,
                'color_id' => 95,
                'name' => 'Transparent',
                'slug' => 'transparent',
                'locale' => 'en',
            ),
            131 => 
            array (
                'id' => 143,
                'color_id' => 95,
                'name' => 'Прозрачный',
                'slug' => 'prozrachnyj',
                'locale' => 'ru',
            ),
            132 => 
            array (
                'id' => 144,
                'color_id' => 96,
                'name' => 'Bənovşəyi',
                'slug' => 'benovseyi',
                'locale' => 'az',
            ),
            133 => 
            array (
                'id' => 145,
                'color_id' => 96,
                'name' => 'Purple',
                'slug' => 'purple-1',
                'locale' => 'en',
            ),
            134 => 
            array (
                'id' => 146,
                'color_id' => 96,
                'name' => 'Пурпурный',
                'slug' => 'purpurnyj',
                'locale' => 'ru',
            ),
            135 => 
            array (
                'id' => 147,
                'color_id' => 97,
                'name' => 'Mozaika ',
                'slug' => 'mozayka',
                'locale' => 'az',
            ),
            136 => 
            array (
                'id' => 148,
                'color_id' => 97,
                'name' => 'Mosaic',
                'slug' => 'mosaic',
                'locale' => 'en',
            ),
            137 => 
            array (
                'id' => 149,
                'color_id' => 97,
                'name' => 'Мозаика',
                'slug' => 'mozaika',
                'locale' => 'ru',
            ),
            138 => 
            array (
                'id' => 150,
                'color_id' => 98,
                'name' => 'Gümüşü_',
                'slug' => 'gumusu-1',
                'locale' => 'az',
            ),
            139 => 
            array (
                'id' => 151,
                'color_id' => 98,
                'name' => 'Silver',
                'slug' => 'silver-1',
                'locale' => 'en',
            ),
            140 => 
            array (
                'id' => 152,
                'color_id' => 98,
                'name' => 'Серебряный',
                'slug' => 'serebryanyj-1',
                'locale' => 'ru',
            ),
            141 => 
            array (
                'id' => 153,
                'color_id' => 99,
                'name' => 'Narıncı',
                'slug' => 'narinci',
                'locale' => 'az',
            ),
            142 => 
            array (
                'id' => 154,
                'color_id' => 99,
                'name' => 'Orange',
                'slug' => 'orange',
                'locale' => 'en',
            ),
            143 => 
            array (
                'id' => 155,
                'color_id' => 99,
                'name' => 'Оранжевый',
                'slug' => 'oranzhevyj',
                'locale' => 'ru',
            ),
            144 => 
            array (
                'id' => 156,
                'color_id' => 100,
                'name' => 'Qəhvəyi',
                'slug' => 'qehveyi',
                'locale' => 'az',
            ),
            145 => 
            array (
                'id' => 157,
                'color_id' => 100,
                'name' => 'Brown',
                'slug' => 'brown',
                'locale' => 'en',
            ),
            146 => 
            array (
                'id' => 158,
                'color_id' => 100,
                'name' => 'Коричневый',
                'slug' => 'korichnevyj',
                'locale' => 'ru',
            ),
            147 => 
            array (
                'id' => 159,
                'color_id' => 101,
                'name' => 'Krem',
                'slug' => 'krem',
                'locale' => 'az',
            ),
            148 => 
            array (
                'id' => 160,
                'color_id' => 101,
                'name' => 'Cream',
                'slug' => 'cream',
                'locale' => 'en',
            ),
            149 => 
            array (
                'id' => 161,
                'color_id' => 101,
                'name' => 'Пломбир',
                'slug' => 'plombir',
                'locale' => 'ru',
            ),
            150 => 
            array (
                'id' => 162,
                'color_id' => 102,
                'name' => 'Firuzəyi',
                'slug' => 'firuzeyi',
                'locale' => 'az',
            ),
            151 => 
            array (
                'id' => 163,
                'color_id' => 102,
                'name' => 'Turquoise',
                'slug' => 'turquoise',
                'locale' => 'en',
            ),
            152 => 
            array (
                'id' => 164,
                'color_id' => 102,
                'name' => 'Бирюзовый',
                'slug' => 'biryuzovyy',
                'locale' => 'ru',
            ),
            153 => 
            array (
                'id' => 165,
                'color_id' => 103,
                'name' => 'Metal',
                'slug' => 'metal',
                'locale' => 'az',
            ),
            154 => 
            array (
                'id' => 166,
                'color_id' => 103,
                'name' => 'Metallic',
                'slug' => 'metallic',
                'locale' => 'en',
            ),
            155 => 
            array (
                'id' => 167,
                'color_id' => 103,
                'name' => 'Металлик',
                'slug' => 'metallik',
                'locale' => 'ru',
            ),
            156 => 
            array (
                'id' => 168,
                'color_id' => 104,
                'name' => 'Bronz',
                'slug' => 'bronz',
                'locale' => 'az',
            ),
            157 => 
            array (
                'id' => 169,
                'color_id' => 104,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            158 => 
            array (
                'id' => 170,
                'color_id' => 104,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            159 => 
            array (
                'id' => 171,
                'color_id' => 106,
                'name' => 'Qara/boz',
                'slug' => 'qara-boz',
                'locale' => 'az',
            ),
            160 => 
            array (
                'id' => 172,
                'color_id' => 106,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            161 => 
            array (
                'id' => 173,
                'color_id' => 106,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            162 => 
            array (
                'id' => 174,
                'color_id' => 107,
                'name' => 'Ağ Şüşə',
                'slug' => 'ag-suse',
                'locale' => 'az',
            ),
            163 => 
            array (
                'id' => 175,
                'color_id' => 107,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            164 => 
            array (
                'id' => 176,
                'color_id' => 107,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            165 => 
            array (
                'id' => 177,
                'color_id' => 108,
                'name' => 'Göy/Qara',
                'slug' => 'goy-qara',
                'locale' => 'az',
            ),
            166 => 
            array (
                'id' => 178,
                'color_id' => 108,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            167 => 
            array (
                'id' => 179,
                'color_id' => 108,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            168 => 
            array (
                'id' => 180,
                'color_id' => 109,
                'name' => 'Ağ/göy',
                'slug' => 'ag-goy',
                'locale' => 'az',
            ),
            169 => 
            array (
                'id' => 181,
                'color_id' => 109,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            170 => 
            array (
                'id' => 182,
                'color_id' => 109,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            171 => 
            array (
                'id' => 183,
                'color_id' => 110,
                'name' => 'Şampan',
                'slug' => 'sampan',
                'locale' => 'az',
            ),
            172 => 
            array (
                'id' => 184,
                'color_id' => 110,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            173 => 
            array (
                'id' => 185,
                'color_id' => 110,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            174 => 
            array (
                'id' => 186,
                'color_id' => 111,
                'name' => 'Ağ/qara',
                'slug' => 'ag-qara',
                'locale' => 'az',
            ),
            175 => 
            array (
                'id' => 187,
                'color_id' => 111,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            176 => 
            array (
                'id' => 188,
                'color_id' => 111,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            177 => 
            array (
                'id' => 189,
                'color_id' => 112,
                'name' => 'Qara/metallik',
                'slug' => 'qara-metallik',
                'locale' => 'az',
            ),
            178 => 
            array (
                'id' => 190,
                'color_id' => 112,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            179 => 
            array (
                'id' => 191,
                'color_id' => 112,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            180 => 
            array (
                'id' => 192,
                'color_id' => 113,
                'name' => ' Qara/bənövşəyi',
                'slug' => 'qara-benovseyi',
                'locale' => 'az',
            ),
            181 => 
            array (
                'id' => 193,
                'color_id' => 113,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            182 => 
            array (
                'id' => 194,
                'color_id' => 113,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            183 => 
            array (
                'id' => 195,
                'color_id' => 114,
                'name' => ' Qara/narıncı',
                'slug' => 'qara-narinci',
                'locale' => 'az',
            ),
            184 => 
            array (
                'id' => 196,
                'color_id' => 114,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            185 => 
            array (
                'id' => 197,
                'color_id' => 114,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            186 => 
            array (
                'id' => 198,
                'color_id' => 115,
                'name' => 'Qara/yaşıl',
                'slug' => 'qara-yasil',
                'locale' => 'az',
            ),
            187 => 
            array (
                'id' => 199,
                'color_id' => 115,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            188 => 
            array (
                'id' => 200,
                'color_id' => 115,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            189 => 
            array (
                'id' => 201,
                'color_id' => 116,
                'name' => 'Ağ/yaşıl',
                'slug' => 'ag-yasil',
                'locale' => 'az',
            ),
            190 => 
            array (
                'id' => 202,
                'color_id' => 116,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            191 => 
            array (
                'id' => 203,
                'color_id' => 116,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            192 => 
            array (
                'id' => 204,
                'color_id' => 117,
                'name' => 'Bej',
                'slug' => 'bej',
                'locale' => 'az',
            ),
            193 => 
            array (
                'id' => 205,
                'color_id' => 117,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            194 => 
            array (
                'id' => 206,
                'color_id' => 117,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            195 => 
            array (
                'id' => 207,
                'color_id' => 118,
                'name' => 'Nebula',
                'slug' => 'nebula',
                'locale' => 'az',
            ),
            196 => 
            array (
                'id' => 208,
                'color_id' => 118,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            197 => 
            array (
                'id' => 209,
                'color_id' => 118,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            198 => 
            array (
                'id' => 210,
                'color_id' => 119,
                'name' => 'Sierra Blue',
                'slug' => 'sierra-blue',
                'locale' => 'az',
            ),
            199 => 
            array (
                'id' => 211,
                'color_id' => 119,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            200 => 
            array (
                'id' => 212,
                'color_id' => 119,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            201 => 
            array (
                'id' => 213,
                'color_id' => 120,
                'name' => 'Graphite',
                'slug' => 'graphite',
                'locale' => 'az',
            ),
            202 => 
            array (
                'id' => 214,
                'color_id' => 120,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            203 => 
            array (
                'id' => 215,
                'color_id' => 120,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
        ));
        
        
    }
}