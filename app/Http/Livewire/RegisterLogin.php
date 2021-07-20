<?php

namespace App\Http\Livewire;

use App\Models\Smsc;
use App\Models\User;
use App\Models\UserSmsCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterLogin extends Component
{
    public $users, $phone, $password,$newPassword, $name;
    public $code,$token,$phoneCheck;
    public $registerForm = false;
    public $resetPassword= false;
    public $smsConfirm= false;
    public $confirmPassword= false;

    public function render()
    {
        return view('livewire.register-login');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->phone = '';
        $this->password = '';
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }
    public function resetPassword()
    {
        $this->resetPassword = !$this->resetPassword;
    }
    public function smsConfirm()
    {
        $this->smsConfirm = !$this->smsConfirm;
    }
    public function confirmForm()
    {
        $this->confirmPassword = !$this->confirmPassword;
    }

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}
