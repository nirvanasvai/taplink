<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $phone,$password;
    public function render()
    {
        return view('livewire.login');
    }
    public function login()
    {
        $this->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(array('phone' => $this->phone, 'password' => $this->password))){
            session()->flash('message', "You are Login successful.");
            $this->redirect('/cabinet');
        }else{
            session()->flash('error', 'email and password are wrong.');
        }
    }
}
