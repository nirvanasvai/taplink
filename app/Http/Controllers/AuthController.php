<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function resetPassword()
    {
        return view('auth.passwords.email');
    }

    public function newPassword()
    {
        return view('auth.passwords.confirm');
    }
//
//    public function resetPassword()
//    {
//        return view();

}
