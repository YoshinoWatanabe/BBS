<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function get() {
        // DBから過去の投稿を取得
        $posts = User::join('posts', 'users.id', '=', 'posts.created_by')
            ->selectRaw('users.id AS user_id, users.name, posts.id AS post_id, posts.text, posts.created_at')
            ->latest('posts.created_at')->paginate(20);
        return view('index', ['posts' => $posts]);
    }

    public function post(Request $request) {
        // バリデーション
        $this->validate($request, Post::$validateRules);

        // DBに保存
        $post = new Post();
        $post->fill([
            'text' => $request->text,
            'created_by' => session()->get('user_id')
        ])->save();
        return redirect('/');
    }
}
