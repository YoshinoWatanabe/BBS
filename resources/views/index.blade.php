<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ひとこと掲示板</title>
</head>
<body>

  <h1>ひとこと掲示板</h1>
  <p>
    {{ session()->get('user_name') }}さん、こんにちは
  </p>
  
  <a href="logout">ログアウトする</a>

  {{-- 投稿フォーム --}}
  <form action="" method="post">
    @csrf
    <textarea name="text" cols="30" rows="10" value="{{ old('text') }}" required maxlength="250"></textarea>
    <input type="submit" value="投稿">
  </form>

  {{-- 投稿時のエラー表示 --}}
  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
  <hr>

  {{-- ポストの表示 --}}
  <x-posts-display :posts='$posts'>
  </x-posts-display>

</body>
</html>