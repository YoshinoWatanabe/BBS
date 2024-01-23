<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function get() {
        if(session()->has('user_id') && session()->has('user_name')) {
            return redirect('/');
        } else {
            return view('login');
        }
    }

    public function post(Request $request) {
        // ログイン可能かチェック
        $user = User::whereName($request->name)->first();

        if(isset($user) && Hash::check($request->password, $user->password)) {
            // ログイン状態にする
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            return redirect('/');
        } else {
            return back()->with('error', 'failed')->withInput();
        }
    }
}
