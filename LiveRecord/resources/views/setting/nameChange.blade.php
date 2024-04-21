@extends('layouts.app')

@section('content')

<div class="text-center row justify-content-center py-3 mx-auto w-100">
  {{-- <div class="alert alert-success" role="alert">
    A simple success alert—check it out!
  </div> --}}
  {!! Form::open(['route' => 'setting.change', 'method' => 'post']) !!}
    <div class="mx-auto mb-3">
      <label for="formGroupExampleInput">ユーザー名を変更します。</label>
      <input type="text" class="form-control bg-light" name="name" value={{Auth::user()->name}}>
    </div>
    <div class="row mx-auto justify-content-center p-20">
      {!! Form::submit('変更', ['class' => 'btn btn-outline-secondary']) !!}
    </div>
  {!! Form::close() !!}
</div>

@endsection