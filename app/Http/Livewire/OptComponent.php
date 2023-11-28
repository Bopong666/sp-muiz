<?php

namespace App\Http\Livewire;

use App\Models\Opt;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class OptComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $kode, $jenis, $nama_opt, $solusi, $foto, $old_foto;
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
        $this->reset(['kode', 'jenis', 'nama_opt', 'solusi', 'foto' , 'idTerpilih', 'idHapus', 'options', 'old_foto']);
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
                    'foto' => 'sometimes|image',
                ],
                [
                    '*.required' => 'Harap di isi',
                    'kode.unique' => 'Kode sudah ada',
                    '*.image' => 'Hanya bisa gambar',
                ]
            );
            if($this->foto){
            $fot = Opt::select('foto')->first($this->idTerpilih);
            $fileName = $data['foto']->hashName();
            if(file_exists($this->old_foto)){

                unlink($this->old_foto);
            }
            $data['foto']->store('foto',  'public');
            $data['foto'] = 'foto/'.$data['foto']->hashName();
        }
        } else {
            $data = $this->validate(
                [
                    'kode' => 'required|unique:opt,kode',
                    'jenis' => 'required',
                    'nama_opt' => 'required|string',
                    'solusi' => 'required',
                    'foto' => 'required|image',

                ],
                [
                    '*.required' => 'Harap di isi',
                    'kode.unique' => 'Kode sudah ada',
                    '*.image' => 'Hanya bisa gambar',
                ]
            );
            $fileName = $data['foto']->hashName();
            $data['foto']->store('foto',  'public');
            $data['foto'] = 'foto/'.$data['foto']->hashName();
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
        $this->old_foto = $data->foto;
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
        $data = Opt::find($id);
        unlink($data->foto);
        $data->delete();
        session()->flash('message', 'Data berhasil dihapus');

        $this->dispatchBrowserEvent('modal-delete');
    }
}
