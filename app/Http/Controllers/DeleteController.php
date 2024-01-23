<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DeleteController extends Controller
{
    public function get($post_id = 0) {
        if(Post::whereId($post_id)->exists()) {
            // DBから指定したidの投稿を取得
            $post = Post::join('users', 'posts.created_by', '=', 'users.id')
                ->selectRaw('users.id AS user_id, users.name, posts.id AS post_id, posts.text, posts.created_at')
                ->where('posts.id', '=', $post_id)->first();
            // 不正なアクセスの場合は処理を中止する
            if($post->user_id === session()->get('user_id')) {
                return view('delete', [
                    'post' => $post,
                    'previous_url' => url()->previous()
                ]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete(Request $request, $post_id) {
        // 対象のデータを削除
        $post = Post::findOrFail($post_id);
        $post->delete();
        return redirect($request->previous_url);
    }
}
