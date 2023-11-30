<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Http\Requests\Fe\RegisterRequest;
use Auth;
use App\Http\Requests\Fe\LoginRequest;

class UserController extends Controller
{

    //fe

    public function login() {
        return view('fe.user.login');
    }

    public function register() {
        return view('fe.user.register');
    }

    public function postRegister(RegisterRequest $req) {

        $req->merge(['password'=>Hash::make($req->password)]);
        $oldPro = $req->old();

        try {
            User::create($req->all());
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('login');
    }

    public function postLogin(LoginRequest $req) {

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect()->route('index');
        }
            return redirect()->back()->with('error','Sai email hoặc mật khẩu');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
