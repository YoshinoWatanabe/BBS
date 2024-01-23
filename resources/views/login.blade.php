@extends('layouts.form')
@section('title', 'ログイン')
@section('button', 'ログイン')
@section('path', 'registration')
@section('link', '会員登録')

@section('error_message')
  @if(session('error') == 'failed')
    <p>・ログインできませんでした</p>
  @endif
@endsection

