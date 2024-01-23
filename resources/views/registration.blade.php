@extends('layouts.form')
@section('title', '会員登録')
@section('button', '登録')
@section('path', 'login')
@section('link', 'ログイン画面へ戻る')

@section('error_message')
  @if(session('error') == 'failed')
    <p>・ユーザー名{{ old('name') }}はすでに存在します</p>
  @endif
  
  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
@endsection()





