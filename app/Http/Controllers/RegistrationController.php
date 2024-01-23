<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function get() {
        return view('registration');
    }

    public function post(Request $request) {
        // バリデーション
        $this->validate($request, User::$validateRules);

        // 登録可能か(ユーザー名が存在しないか)チェック
        if(User::whereName($request->name)->exists()) {
            return back()->with('error', 'failed')->withInput();
        } else {
            $hashed_password = bcrypt($request->password);
            // DBに保存
            $user = new User();
            $user->fill([
                'name' => $request->name,
                'password' => $hashed_password
            ])->save();
            return redirect('completion');
        }
    }
}
