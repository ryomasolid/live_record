@extends('layouts.login')

@section('content')

<div class="card mx-auto" style="width: 30rem;">
  <form class="p-4" method="POST" action="{{ route('login') }}">
    @csrf
  {{-- {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'p-4']) !!} --}}
    <div class="form-group">
      <label for="exampleDropdownFormEmail2">メールアドレス</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com" name="email">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword2">パスワード</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password" name="password">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="dropdownCheck2">
      <label class="form-check-label" for="dropdownCheck2">
        パスワードを記憶する
      </label>
    </div>
    <button type="submit" class="btn btn-primary">ログイン</button>
    {{-- {!! Form::submit('Sign in', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!} --}}
  </form>
</div>

@endsection