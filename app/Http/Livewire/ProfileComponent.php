<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileComponent extends Component
{
    public $username, $password, $password_confirmation, $current_password;
    public $gantiForm = false;

    public function mount()
    {
        $this->username = Auth::user()->username;
    }

    public function render()
    {
        return view('livewire.profile-component')->extends('layouts.app')->section('content');
    }

    public function gantiFormIni()
    {
        $this->gantiForm = !$this->gantiForm;
    }

    public function store()
    {
        $data = $this->validate(
            [
                'username' => 'required|string|max:30|unique:users,username,' . Auth::user()->id,
                'current_password' => 'required|current_password:web',
                'password' => 'confirmed',
            ],
            [
                'username.unique' => 'Username sudah terdaftar',
                'username.required' => 'Harap di isi',
                'current_password.current_password' => 'Password salah',
                'password.confirmed' => 'Password tidak sama',
            ],
        );

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        User::find(Auth::user()->id)->update($data);
        $this->reset(['password', 'current_password', 'password_confirmation']);
        return redirect(request()->header('Referer'))->with('message', 'User updated successfully.');
    }

    public function edit()
    {
        $this->gantiForm = !$this->gantiForm;
    }
}
