<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewPassword extends Component
{
    public $newPassword;
    public function render()
    {
        return view('livewire.new-password');
    }
    public function newPassword()

    {
        $this->validate([
            'newPassword' => 'required|string|min:4',

        ]);
        User::where('phone', $this->phoneCheck)
            ->update(['password' => Hash::make($this->newPassword)]);
        $this->redirect('/cabinet');
        return $this->alert('success', 'Arlink.kz', [
            'position' => 'top',
            'timer' => 5000,
            'toast' => true,
            'text' => 'Успешно сменили пароль!',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Закрыть',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);

    }
}
