<?php

namespace App\Http\Livewire;

use App\Models\Smsc;
use App\Models\User;
use App\Models\UserSmsCode;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $phone,$code,$token;

    public function render()
    {
        return view('livewire.reset-password');
    }

}
