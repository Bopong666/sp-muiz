<?php

namespace App\Http\Livewire;

use App\Models\Opt;
use Livewire\Component;
use Livewire\WithPagination;

class OptComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $kode, $jenis, $nama_opt, $solusi;
    public $idTerpilih, $idHapus;

    public $options = 'Tambah';

    public $search = "";

    public function render()
    {
        return view('livewire.opt-component', ['lists' => Opt::where(function ($query) {
            $query->orWhere('kode', 'LIKE', '%' . $this->search . '%')
                ->orWhere('nama_opt', 'LIKE', '%' . $this->search . '%');
        })->orderBy('kode')->paginate(10)])->extends('layouts.app')->section('content');
    }

    public function resetInput()
    {
        $this->reset(['kode', 'jenis', 'nama_opt', 'solusi', 'idTerpilih', 'idHapus', 'options']);
    }

    public function store()
    {
        if ($this->idTerpilih) {
            $data = $this->validate(
                [
                    'kode' => 'required|string|unique:opt,kode,' . $this->idTerpilih,
                    'jenis' => 'required',
                    'nama_opt' => 'required|string',
                    'solusi' => 'required',
                ],
                [
                    '*.required' => 'Harap di isi',
                    'kode.unique' => 'Kode sudah ada',
                ]
            );
        } else {
            $data = $this->validate(
                [
                    'kode' => 'required|unique:opt,kode',
                    'jenis' => 'required',
                    'nama_opt' => 'required|string',
                    'solusi' => 'required',
                ],
                [
                    '*.required' => 'Harap di isi',
                    'kode.unique' => 'Kode sudah ada',
                ]
            );
        }
        Opt::updateOrCreate(['id' => $this->idTerpilih], $data);
        session()->flash('message', $this->idTerpilih ? 'Data berhasil diubah' : 'Data berhasil ditambah');

        $this->resetInput();
        $this->dispatchBrowserEvent('modal-store');
    }

    public function edit($id)
    {
        $this->resetInput();

        $this->idTerpilih = $id;
        $data = Opt::find($id);
        $this->kode = $data->kode;
        $this->jenis = $data->jenis;
        $this->nama_opt = $data->nama_opt;
        $this->solusi = $data->solusi;
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
        Opt::destroy($id);

        session()->flash('message', 'Data berhasil dihapus');

        $this->dispatchBrowserEvent('modal-delete');
    }
}
