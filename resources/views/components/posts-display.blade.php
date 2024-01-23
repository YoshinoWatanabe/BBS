<div class="posts">
    @foreach($posts as $post)
        <p><a href="{{ route('postview', ['user_id' => $post->user_id]) }}">{{ $post->name }}</a></p>
        <p>{{ $post->text }}</p>
        <p>{{ $post->created_at }}</p>
        @if($post->user_id === session()->get('user_id'))
            <a href="{{ route('deletecheck', ['post_id' => $post->post_id]) }}">[削除]</a>
        @endif
        <hr>
    @endforeach

    {{ $posts->links() }}
</div>
