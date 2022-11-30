<?php

namespace App\Http\Livewire;

use App\Models\Gejala;
use App\Models\Opt;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class BasisPengetahuanComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $opt_id, $opt_nama;
    public $gejala_id = [];
    public $opts, $gejalas;

    public $idTerpilih, $idHapus;
    public $options = 'Tambah';

    public function mount()
    {
        $this->gejalas = Gejala::all();
    }
    public function render()
    {

        $this->opts = Opt::doesntHave('gejala')->get();
        return view('livewire.basis-pengetahuan-component', ['lists' => Opt::has('gejala')->get()])->extends('layouts.app')->section('content');
    }

    public function resetInput()
    {
        $this->reset(['opt_id', 'gejala_id', 'idTerpilih', 'idHapus', 'options', 'opt_nama']);
    }

    public function store()
    {
        $dataGejala = $this->validate(
            [
                'gejala_id' => 'required|array|min:1',
            ],
            [
                'gejala_id.min' => 'Minimal 1 gejala dipilih',
                'gejala_id.required' => 'Harap di pilih gejala',
            ]
        );
        $dataOpt = $this->validate([
            'opt_id' => 'required',
        ]);

        foreach ($dataGejala['gejala_id'] as $key => $item) {
            if (isset($item) && $item == false) {
                unset($dataGejala['gejala_id'][$key]);
            }
        }

        ksort($dataGejala['gejala_id']);

        $data = Opt::find($dataOpt['opt_id']);

        $data->gejala()->sync($dataGejala['gejala_id']);

        session()->flash('message', $this->idTerpilih ? 'Data berhasil diubah' : 'Data berhasil ditambah');

        $this->resetInput();
        $this->dispatchBrowserEvent('modal-store');
    }

    public function edit($id)
    {
        $this->resetInput();
        $this->idTerpilih = $id;

        $data = Opt::find($this->idTerpilih);
        $this->opt_id = $data->id;
        $this->opt_nama = $data->nama_opt;
        foreach ($data->gejala as $gejala) {
            $this->gejala_id[$gejala->id] = $gejala->id;
        }
        $this->options = 'Edit';
        $this->dispatchBrowserEvent('modal-edit');
    }

    public function hapusKonfirmasi($id)
    {
        $this->idHapus = $id;
        $this->dispatchBrowserEvent('modal-deleteConfirm');
    }

    public function hapus($id)
    {
        DB::table('basis_pengetahuan')->where('opt_id', $id)->delete();
        $this->dispatchBrowserEvent('modal-delete');
    }
}
