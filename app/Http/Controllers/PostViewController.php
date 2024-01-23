<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostViewController extends Controller
{
    public function get($user_id = 0) {
        if(User::whereId($user_id)->exists()) {
            // DBから指定したidのユーザーの投稿を取得
            $posts = User::join('posts', 'users.id', '=', 'posts.created_by')
                ->selectRaw('users.id AS user_id, users.name, posts.id AS post_id, posts.text, posts.created_at')
                ->where('users.id', '=', $user_id)
                ->latest('posts.created_at')->paginate(20);

            return view('postview', [
                'posts' => $posts,
                'previous_url' => url()->previous()
            ]);
        } else {
            return redirect('/');
        }

    }
}
