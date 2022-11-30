<?php

namespace Database\Seeders;

use App\Models\Opt;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $otp = [
        [
            'kode' => 'P01',
            'jenis' => 'Hama',
            'nama_opt' => 'Kutu Putih',
            'solusi' => 'Pengendalian hama ini cukup sulit karena penyemprotan pestisida tidak efektif akibat adanya lapisan lilin yang menyelimuti tubuh hewan ini. Untuk menghilangkan lapisan lilin ini, harus menyemprotnya dengan larutan deterjen baru setelah itu penyemprotan pestisida kontak dapat dilakukan'
        ],
        [
            'kode' => 'P02',
            'jenis' => 'Hama',
            'nama_opt' => 'Lalat Buah',
            'solusi' => 'Membuang buah yang sudah terserang karena tidak bisa terselamatkan lagi, pembungkusan buah dan pemasangan feromon trap'
        ],
        [
            'kode' => 'P03',
            'jenis' => 'Hama',
            'nama_opt' => 'Belalang',
            'solusi' => 'Penggunaan pestisida kimia dilakukan saat serangan hama ini sudah tinggi'
        ],
        [
            'kode' => 'P04',
            'jenis' => 'Penyakit',
            'nama_opt' => 'Karat Merah',
            'solusi' => 'Mengambil daun yang terkena karat daun selanjutnya bersihkan daun yang gugur lalu bakar, atau dengan bahan mimia dhithane m45, kapur, curakron dan regen untuk disemprotkan ke seluruh permukaan daun, bunga, buah dan batang secara merata'
        ],
        [
            'kode' => 'P05',
            'jenis' => 'Penyakit',
            'nama_opt' => 'Kanker Buah Pestalotia',
            'solusi' => 'Pengendalianya dengan cara mengambil dan membakar buah yang terinfeksi, dan penyemprotan fungisida dimulai sejak buah masih kecil'
        ],
        [
            'kode' => 'P06',
            'jenis' => 'Penyakit',
            'nama_opt' => 'Antraknosa',
            'solusi' => 'Penggunaan fungisida dianjurkan untuk pengendalian penyakit ini'
        ],
        [
            'kode' => 'P07',
            'jenis' => 'Penyakit',
            'nama_opt' => 'Bercak Daun Cerospora',
            'solusi' => 'Memotong dan memusnahkan bagian tanaman yang sakit dan disemprot fungisida alami'
        ],
    ];
    public function run()
    {
        foreach ($this->otp as $item) {
            Opt::create($item);
        }
    }
}
