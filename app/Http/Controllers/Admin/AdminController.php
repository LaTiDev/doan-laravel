<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\SignUpRequest;
use App\Http\Requests\Admin\User\LogonRequest;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function logon() {
        return view('admin.user.logon');
    }

    public function signUp() {
        return view('admin.user.signUp');
    }

    public function postLogon(LogonRequest $req) {
        $oldPro = $req->old();
        
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role' => 1])) {
            return redirect()->route('admin.index');
        }
            return redirect()->back()->with('error','Sai email hoặc mật khẩu');
    }

    public function singOut() {
        Auth::logout();
        return redirect()->route('logon');
    }

    public function postSignUp(SignUpRequest $req) {

        $req->merge(['password'=>Hash::make($req->password)]);
        $oldPro = $req->old();

        try {
            User::create($req->all());
            // return redirect()->route('logon');
        } catch (\Throwable $th) {
        }
        return redirect()->back()->with('error','Vui lòng xác minh email');
    }

}
