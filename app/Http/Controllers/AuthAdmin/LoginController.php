<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    public function login()
    {
        $credential = [
            'email' => 'takiyagenji@gmail.com',
            'password' => '123123123'
        ];

        dd(Auth);
    }



}
