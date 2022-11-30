<?php

namespace Database\Seeders;

use App\Models\opt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BasisPengetahuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $rule = [
        [
            'opt_id' => 1,
            'gejala_id' => 10,
        ],
        [
            'opt_id' => 1,
            'gejala_id' => 12,
        ],
        [
            'opt_id' => 1,
            'gejala_id' => 13,
        ],
        [
            'opt_id' => 1,
            'gejala_id' => 14,
        ],
        [
            'opt_id' => 2,
            'gejala_id' => 11,
        ],
        [
            'opt_id' => 2,
            'gejala_id' => 15,
        ],
        [
            'opt_id' => 2,
            'gejala_id' => 16,
        ],
        [
            'opt_id' => 2,
            'gejala_id' => 17,
        ],
        [
            'opt_id' => 2,
            'gejala_id' => 18,
        ],
        [
            'opt_id' => 3,
            'gejala_id' => 19,
        ],
        [
            'opt_id' => 3,
            'gejala_id' => 20,
        ],
        [
            'opt_id' => 4,
            'gejala_id' => 3,
        ],
        [
            'opt_id' => 4,
            'gejala_id' => 5,
        ],
        [
            'opt_id' => 5,
            'gejala_id' => 5,
        ],
        [
            'opt_id' => 5,
            'gejala_id' => 7,
        ],
        [
            'opt_id' => 5,
            'gejala_id' => 9,
        ],
        [
            'opt_id' => 5,
            'gejala_id' => 11,
        ],
        [
            'opt_id' => 5,
            'gejala_id' => 17,
        ],
        [
            'opt_id' => 6,
            'gejala_id' => 1,
        ],
        [
            'opt_id' => 6,
            'gejala_id' => 2,
        ],
        [
            'opt_id' => 6,
            'gejala_id' => 5,
        ],
        [
            'opt_id' => 6,
            'gejala_id' => 7,
        ],
        [
            'opt_id' => 6,
            'gejala_id' => 8,
        ],
        [
            'opt_id' => 6,
            'gejala_id' => 11,
        ],
        [
            'opt_id' => 6,
            'gejala_id' => 17,
        ],
        [
            'opt_id' => 7,
            'gejala_id' => 6,
        ],
        [
            'opt_id' => 7,
            'gejala_id' => 9,
        ],
    ];
    public function run()
    {
        foreach ($this->rule as $item) {
            DB::table('basis_pengetahuan')->insert($item);
        }
    }
}
