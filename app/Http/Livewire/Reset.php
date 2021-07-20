<?php

namespace App\Http\Livewire;

use App\Models\Smsc;
use App\Models\User;
use App\Models\UserSmsCode;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Reset extends Component
{
    public $phoneCheck,$code,$smsConfirm,$newPassword;
    public $showPassword = false;
    public function render()
    {
        return view('livewire.reset');
    }

    public function smsConfirm()
    {
        $this->smsConfirm = !$this->smsConfirm;
    }
    public function showNewPassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function sendPhone()
    {
        $this->validate([
            'phoneCheck' => 'required|min:12|max:12',
        ]);
        $code = random_int(1111, 9999);
        $phone = str_replace(array('(', ')', ' ', '-', '+'), '', $this->phoneCheck);
        $phone = substr_replace($phone, '+7', 0, 1);

        //проверка на наличие номера
        $duplicatePhone = User::where('phone', $phone)->first();


        $this->smsConfirm();
        $this->alert('success', 'Businessbuy.kz', [
            'position' => 'top',
            'timer' => 4000,
            'toast' => true,
            'text' => 'Смс отправлен!',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Закрыть',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);

        //проверка на спам нажатий отправки смс
        $lastSms = UserSmsCode::where('phone', $phone)->whereBetween('created_at', [date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . "-1 minutes")), date('Y-m-d H:i:s')])->first();

        if ($lastSms) {
            return $this->alert('success', 'Arlink.kz', [
                'position' => 'top',
                'timer' => 5000,
                'toast' => true,
                'text' => 'Пароль уже отправлен. Попробуйте чуть позже!',
                'confirmButtonText' => 'Ok',
                'cancelButtonText' => 'Закрыть',
                'showCancelButton' => true,
                'showConfirmButton' => false,
            ]);

        }

        //создание смс и ее отправка
        $userSmsCode = UserSmsCode::create(
            ['phone' => $phone, 'code' => Hash::make($code)]
        );


        $sms = Smsc::send_sms($phone, "код: " . $code, 0);

    }

    public function smsCode()
    {
        $validatedDate = $this->validate([
            'code' => 'required',
        ]);

        $phone = str_replace(array('(', ')', ' ', '-', '+'), '', $this->phoneCheck);
        $phone = substr_replace($phone, '+7', 0, 1);

        $UserSmsCode = UserSmsCode::where('phone', $phone)->orderBy('created_at', 'desc')->first();

        if ($UserSmsCode) {
            if (!Hash::check($this->code, $UserSmsCode->code)) {
                $this->code = null;
                return $this->alert('error', 'Businessbuy.kz', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'Пароль не был отправлен. Пароль не правильный.',
                    'confirmButtonText' => 'Ok',
                    'cancelButtonText' => 'Закрыть',
                    'showCancelButton' => true,
                    'showConfirmButton' => false,
                ]);

            } else {
                $this->showNewPassword();
                return $this->alert('error', 'Businessbuy.kz', [
                    'position' => 'top',
                    'timer' => 5000,
                    'toast' => true,
                    'text' => 'Пароль не был отправлен. Пароль не правильный.',
                    'confirmButtonText' => 'Ok',
                    'cancelButtonText' => 'Закрыть',
                    'showCancelButton' => true,
                    'showConfirmButton' => false,
                ]);
            }
        }


    }
    public function newPassword()
    {
        $this->validate([
            'newPassword' => 'required|string|min:4',

        ]);
        User::where('phone', $this->phoneCheck)
            ->update(['password' => Hash::make($this->newPassword)]);
        $this->redirect('/login');
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
