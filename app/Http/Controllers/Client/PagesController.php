<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public $registerForm;

    public function index()
    {
        $registerForm = $this->registerForm;
        return view('client.index',[
            'registerForm'=>$registerForm
        ]);
    }
}
