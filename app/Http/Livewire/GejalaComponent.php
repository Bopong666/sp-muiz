<?php

namespace App\Http\Livewire;

use App\Models\Gejala;
use Livewire\Component;
use Livewire\WithPagination;

class GejalaComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $kode_gejala, $nama_gejala, $bobot_gejala;

    public $idTerpilih, $idHapus;
    public $options = 'Tambah';
    public $search = "";

    public function render()
    {
        return view('livewire.gejala-component', ['lists' => Gejala::where(function ($query) {
            $query->orWhere('kode_gejala', 'LIKE', '%' . $this->search . '%')
                ->orWhere('nama_gejala', 'LIKE', '%' . $this->search . '%');
        })->orderBy('kode_gejala')->paginate(10)])->extends('layouts.app')->section('content');
    }

    public function resetInput()
    {
        $this->reset(['kode_gejala', 'nama_gejala', 'bobot_gejala', 'idTerpilih', 'idHapus', 'options']);
    }

    public function store()
    {

        if ($this->idTerpilih) {
            $data = $this->validate(
                [
                    'kode_gejala' => 'required|unique:gejala,kode_gejala,' . $this->idTerpilih,
                    'nama_gejala' => 'required|string',
                    'bobot_gejala' => 'required|numeric',
                ],
                [
                    '*.required' => 'Harap di isi',
                    'kode_gejala.unique' => 'Kode sudah ada',
                    'bobot_gejala.numeric' => 'Haruslah angka',
                ]
            );
        } else {
            $data = $this->validate(
                [
                    'kode_gejala' => 'required|unique:gejala,kode_gejala',
                    'nama_gejala' => 'required|string',
                    'bobot_gejala' => 'required|numeric',
                ],
                [
                    '*.required' => 'Harap di isi',
                    'kode_gejala.unique' => 'Kode sudah ada',
                    'bobot_gejala.numeric' => 'Haruslah angka',
                ]
            );
        }

        Gejala::updateOrCreate(['id' => $this->idTerpilih], $data);
        session()->flash('message', $this->idTerpilih ? 'Data berhasil diubah' : 'Data berhasil ditambah');

        $this->resetInput();
        $this->dispatchBrowserEvent('modal-store');
    }

    public function edit($id)
    {
        $this->resetInput();
        $this->idTerpilih = $id;
        $data = Gejala::find($id);
        $this->kode_gejala = $data->kode_gejala;
        $this->nama_gejala = $data->nama_gejala;
        $this->bobot_gejala = $data->bobot_gejala;
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
        Gejala::destroy($id);

        session()->flash('message', 'Data berhasil dihapus');

        $this->dispatchBrowserEvent('modal-delete');
    }
}
