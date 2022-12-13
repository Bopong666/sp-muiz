<?php

namespace App\Http\Livewire;

use App\Models\Opt;
use App\Models\Gejala;
use App\Models\Riwayat;
use Livewire\Component;
use App\Models\Penyakit;
use App\Models\Pengetahuan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class KonsultasiComponent extends Component
{
    public $nama, $alamat;
    public $gejalas;
    public $rules = [];
    public $m = [];
    public $hasilRanking;
    public $opt;
    public $selesaiPerhitungan = false;
    public $sementara;
    public $k;

    public $gejala_id = [];

    public function mount()
    {
        $this->gejalas = Gejala::has('opt')->get();
    }
    public function render()
    {
        return view('livewire.konsultasi-component')->extends('layouts.user')->section('content');
    }

    public function perhitungan()
    {


        $dataPasien = $this->validate(
            [
                'nama' => 'required|string|max:40',
                'alamat' => 'required|string',
            ],
            [
                '*.required' => 'Harap isi kolom ini',
            ]
        );

        $dataGejala = $this->validate([
            'gejala_id' => 'required|array|min:1',
        ], [
            'gejala_id.min' => 'Minimal 1 gejala',
            'gejala_id.required' => 'Harap pilih gejala minimal 1'
        ]);
        // $this->gejala_id = [2, 3, 4];

        foreach ($this->gejala_id as $key => $item) {
            if (isset($item) && $item == false) {
                unset($this->gejala_id[$key]);
            }
        }
        $i = 0;
        foreach (array_reverse($this->gejala_id) as $item) {
            $dataGejala = Gejala::with('opt')->find($item);
            $this->rules[$i]['kode_gejala'] = $dataGejala->kode_gejala;
            $this->rules[$i]['kode'] = [];
            foreach ($dataGejala->opt as $key => $opt) {
                $this->rules[$i]['kode'][] = $opt->kode;
            }
            $this->rules[$i]['belief'] = $dataGejala->bobot_gejala;
            $this->rules[$i]['plausibility'] = 1 - $dataGejala->bobot_gejala;
            $i++;
        }
        $jumlahM = 0;
        foreach ($this->rules as $key => $item) {
            if ($jumlahM == 0) {
                $this->m[$jumlahM][0]['kd'] = $item['kode'];
                $this->m[$jumlahM][0]['nilai'] = $item['belief'];

                $this->m[$jumlahM][1]['kd'] = '&Theta;';
                $this->m[$jumlahM][1]['nilai'] = 1 - $item['belief'];
            } elseif ($jumlahM % 2 == 0) {
                $this->m[$jumlahM] = [];
                $this->m[$jumlahM + 1][0]['kd'] = $item['kode'];
                $this->m[$jumlahM + 1][0]['nilai'] = $item['belief'];

                $this->m[$jumlahM + 1][1]['kd'] = '&Theta;';
                $this->m[$jumlahM + 1][1]['nilai'] = 1 - $item['belief'];
                $jumlahM++;
            } else {
                $this->m[$jumlahM][0]['kd'] = $item['kode'];
                $this->m[$jumlahM][0]['nilai'] = $item['belief'];

                $this->m[$jumlahM][1]['kd'] = '&Theta;';
                $this->m[$jumlahM][1]['nilai'] = 1 - $item['belief'];
            }
            $jumlahM++;
        }
        $jumlahM = 0;
        foreach ($this->m as $genap => $item) {
            if ($genap % 2 == 0) {
                $jumlahPutaran = 0;
                foreach ($this->m[$genap] as $keyrow => $index) {
                    foreach ($this->m[$genap + 1] as $keycolumn => $kedua) {
                        if ($index['kd'] == '&Theta;' && $kedua['kd'] == '&Theta;') {
                            $this->sementara[$genap][$jumlahPutaran]['kd'] = '&Theta;';
                        } elseif ($index['kd'] == '&Theta;') {
                            $this->sementara[$genap][$jumlahPutaran]['kd'] = $kedua['kd'];
                        } elseif ($kedua['kd'] == '&Theta;') {
                            $this->sementara[$genap][$jumlahPutaran]['kd'] = $index['kd'];
                        } else {
                            $this->sementara[$genap][$jumlahPutaran]['kd'] = array_values(array_intersect($index['kd'], $kedua['kd']));
                        }
                        $this->sementara[$genap][$jumlahPutaran]['nilai'] = $index['nilai'] * $kedua['nilai'];
                        $jumlahPutaran++;
                    }
                }
                // dd($this->m, $this->sementara[$genap]);


                // MENGHITUNG K
                $this->k[$genap] = 0;
                foreach ($this->sementara[$genap] as $key => $item) {
                    if ($item['kd'] == []) {
                        $this->k[$genap] += $item['nilai'];
                        unset($this->sementara[$genap][$key]);
                    }
                }

                $this->sementara[$genap] = array_values($this->sementara[$genap]);

                // MENCARI KODE PENYAKIT YG SAMA
                $unset = [];
                for ($i = 0; $i < count($this->sementara[$genap]); $i++) {

                    for ($j = 0; $j < count($this->sementara[$genap]); $j++) {
                        if ($this->sementara[$genap][$i]['kd'] == $this->sementara[$genap][$j]['kd'] && $i < $j) {
                            $this->sementara[$genap][$i]['nilai'] += $this->sementara[$genap][$j]['nilai'];
                            $unset[] = $j;
                        }
                    }
                }

                // MENGHAPUS DARI ARRAY
                foreach ($unset as $item) {
                    unset($this->sementara[$genap][$item]);
                }

                // Membuat M baru                
                foreach ($this->sementara[$genap] as $item) {

                    $this->m[$genap + 2][] = [
                        'kd' => $item['kd'],
                        'nilai' => $item['nilai'] / (1 - $this->k[$genap]),
                    ];
                }

                $this->sementara[$genap] = array_values($this->sementara[$genap]);
            }
        }


        $this->hasilRanking = $this->m[array_key_last($this->m)];
        array_multisort(array_column($this->hasilRanking, 'nilai'), SORT_DESC, $this->hasilRanking);
        $this->opt = Opt::where('kode', $this->hasilRanking[0]['kd'])->first();
        Riwayat::create([
            'nama' => $this->nama,
            'kota' => $this->alamat,
            'opt_id' => $this->opt->id,
            'created_at' => now(),
        ]);
        $this->selesaiPerhitungan = true;
        session()->flash('message', 'Diagnosa telah selesai!!');
        $this->dispatchBrowserEvent('modal-store');
        sleep(1);
    }

    public function cetak()
    {

        $pdf = PDF::loadview('cetak_pdf', [
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'opt' => $this->opt->nama_opt,
            'nilai' => round($this->hasilRanking[0]['nilai'], 4),
            'solusi' => $this->opt->solusi,
        ])->setOptions(['defaultFont' => 'sans-serif'])->output();

        return response()->streamDownload(
            fn () => print($pdf),
            "hasil-konsultasi.pdf"
        );
    }
}
