<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $phone,$password,$password_confirmation;
    public function render()
    {
        return view('livewire.register');
    }
    public function registerStore()
    {
        $this->validate([
            'phone' => 'required|unique:users',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'min:4'
        ]);

        $this->password = Hash::make($this->password);

        $user = User::create(['phone' => $this->phone, 'password' => $this->password]);
        auth()->login($user);

        $this->redirect('/cabinet');


    }
}
