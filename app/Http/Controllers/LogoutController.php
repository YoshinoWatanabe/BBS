<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function get() {
        return view('logout');
    }

    public function post() {
        // ログアウト処理
        session()->flush();
        return redirect('login');
    }
}
