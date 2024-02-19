<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(){
        $data = [
            'username' => request('username'),
            'fullname' => request('fullname'),
            'email' => request('email'),
            'alamat' => request('alamat'),
            'password' => Hash::make(request('password')) 
        ];

        if (User::create($data)) {
            session()->flash('Behasil', 'Register Success');
            return redirect('/signin');
        } else {
            session()->flash('Gagal', 'Register Unsuccess');
            return redirect('/signup');
        }
    }

    public function signin(){
        $user = User::where('username', request('username'))->first();

        if (!$user) {
            session()->flash('Gagal', 'Username and Password Invalid');
            return back();
        }

        $data = [
            'username' => request('username'),
            'password' => request('password')
        ];

        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        }else{
            session()->flash('Gagal', 'Username and Password Invalid');
            return back();
        }
    }

    public function signout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/signin');
    }
}
