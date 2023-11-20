<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('category.login');
    }
    public function post_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('category.index');
        } else {
            $request->session()->put('error', 'Thông tin đăng nhập sai');
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('category.login');
    }
}
