<!-- 
  title: ページタイトル
  button: 送信ボタンに表示する文字
  path: リンク先のパス
  link: リンクの名前
  error_message: エラーメッセージを記述するフィールド
-->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
</head>
<body>

@section('error_message')
@show

<h1>@yield('title')</h1>
<form action="" method="POST">
    @csrf
    <dl>
      <dt>ユーザー名</dt>
      <dd><input type="text" name="name" value="{{ old('name') }}" required maxlength="20" autofocus></dd>
      <dt>パスワード</dt>
      <dd><input type="password" name="password" value="{{ old('password') }}" required minlength="8" autofocus></dd>
    </dl>
    <input type="submit" value="@yield('button')">
    <a href="@yield('path')">@yield('link')</a>
  </form>

</body>
</html>