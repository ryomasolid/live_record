@extends('layouts.app')

@section('content')

<div class="text-center row justify-content-center py-3 mx-auto w-100">
  <div class="col-12 px-2 py-3">
    <div class="col-12 px-2 py-3">
      <a href="{{ route('setting.nameChange') }}">ユーザー名変更</a>
    </div>
    <div class="col-12 px-2 py-3">
      パスワード変更
    </div>
    <div class="col-12 px-2 py-3">
      退会
    </div>
  </div>
</div>

@endsection