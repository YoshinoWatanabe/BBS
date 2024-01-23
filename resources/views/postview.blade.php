<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿内容詳細</title>
</head>
<body>
  <h1>投稿一覧</h1>
  <a href="{{ $previous_url }}">戻る</a>
  <hr>

  <x-posts-display :posts='$posts'>
  </x-posts-display>

  <a href="{{ $previous_url }}">戻る</a>
</body>
</html>
