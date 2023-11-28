<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginTest extends Component
{
    public $username, $password;

    public function render()
    {
        return view('livewire.login-test')->extends('layouts.user')->section('content');
    }

    public function menglogin(){
        $data = $this->validate([
        'username' => 'required',
        'password' => 'required'
    ],
    [
        '*.required' => 'Harap mengisi kolom',
    ]
    );

        if($this->username == 'admin' && $this->password == 'admin123'){
            redirect('/berhasil');
        }else{
            session()->flash('message', 'username atau password salah');
        }
    }
}
