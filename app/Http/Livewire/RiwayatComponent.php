<?php

namespace App\Http\Livewire;

use App\Models\Riwayat;
use Livewire\Component;

class RiwayatComponent extends Component
{	
	protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.riwayat-component', ['lists' => Riwayat::paginate(10)])->extends('layouts.app')->section('content');
    }
}
