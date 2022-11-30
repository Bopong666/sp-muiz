<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $gejala = [
        [
            'kode_gejala' => 'G01',
            'nama_gejala' => 'Penghitamanan terhadap buah yang mengakibatkan  kering atau keriput',
            'bobot_gejala' => 0.8,
        ],
        [
            'kode_gejala' => 'G02',
            'nama_gejala' => 'Bercak berwarna coklat pada daun',
            'bobot_gejala' => 0.2,
        ],
        [
            'kode_gejala' => 'G03',
            'nama_gejala' => 'Bercak hitam pada sisi daun',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G04',
            'nama_gejala' => 'Tanaman mati mendadak seperti tersiram air panas',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G05',
            'nama_gejala' => 'Terdapat bercak merah  atau merah kecoklatan atau jingga pada buah',
            'bobot_gejala' => 0.8,
        ],
        [
            'kode_gejala' => 'G06',
            'nama_gejala' => 'Bercak pada daun berwarna hitam',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G07',
            'nama_gejala' => 'Daun berubah warna hijau menjadi kuning',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G08',
            'nama_gejala' => 'Buah berwarna kehitaman',
            'bobot_gejala' => 0.6,
        ],
        [
            'kode_gejala' => 'G09',
            'nama_gejala' => 'Ruas daun membesar',
            'bobot_gejala' => 0.2,
        ],
        [
            'kode_gejala' => 'G10',
            'nama_gejala' => 'Buah kering',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G11',
            'nama_gejala' => 'Kerusakan berada di buah',
            'bobot_gejala' => 0.6,
        ],
        [
            'kode_gejala' => 'G12',
            'nama_gejala' => 'Permukaan kulit buah berselaput kering dan tampak kotor',
            'bobot_gejala' => 0.2,
        ],
        [
            'kode_gejala' => 'G13',
            'nama_gejala' => 'Terdapat lilin berwarna putih di permukaan buah',
            'bobot_gejala' => 0.8,
        ],
        [
            'kode_gejala' => 'G14',
            'nama_gejala' => 'Buah agak berkerut',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G15',
            'nama_gejala' => 'Timbul titik kecil di permukaan buah',
            'bobot_gejala' => 0.2,
        ],
        [
            'kode_gejala' => 'G16',
            'nama_gejala' => 'Terdapat bercak lebar dan basah di permukaan buah',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G17',
            'nama_gejala' => 'Buah membusuk',
            'bobot_gejala' => 0.6,
        ],
        [
            'kode_gejala' => 'G18',
            'nama_gejala' => 'Jika buah dibelah, akan dijumpai beberapa ulat atau larva berwarna putih keruh',
            'bobot_gejala' => 0.8,
        ],
        [
            'kode_gejala' => 'G19',
            'nama_gejala' => 'Luka akibat gigitan berwarna coklat pada permukaan kulit buah',
            'bobot_gejala' => 0.4,
        ],
        [
            'kode_gejala' => 'G20',
            'nama_gejala' => 'Terdapat bekas gigitan bergerigi, kasar dan sobek',
            'bobot_gejala' => 0.6,
        ],
    ];
    public function run()
    {
        foreach ($this->gejala as $item) {
            Gejala::create($item);
        }
    }
}
