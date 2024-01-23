<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿の削除</title>
</head>
<body>

  <h1>以下の投稿を削除します</h1>
  <hr>
  <p>{{ $post->name }}</p>
  <p>{{ $post->text }}</p>
  <p>{{ $post->created_at }}</p>
  <hr>

  <form action="{{ route('delete', $post->post_id) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="OK">
    <input type="hidden" name="previous_url" value="{{ $previous_url }}">
  </form>

  <a href="{{ $previous_url }}">戻る</a>

</body>
</html>