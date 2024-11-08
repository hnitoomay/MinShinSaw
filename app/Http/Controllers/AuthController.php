<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

     //dashboard access seperate
     public function cole(){
        if(Auth::user()->role == 'administrator'){
            return redirect()->route('home#company');
        }else
        return redirect()->route('user#page');
     }
}
