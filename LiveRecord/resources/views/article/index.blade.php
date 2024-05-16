@extends('layouts.app')

@section('content')

<div class="text-center row justify-content-center py-3 mx-auto w-100">
  <div class="col-12 px-2 py-3">
    <div class="pb-5">
      <button type=“button” class="btn btn-success" onclick="location.href='{{ route('article.create') }}'">新規作成</button>
    </div>
    @foreach($articles as $article)
      <div class="card mx-auto mb-3 bg-light" style="width: 30rem;">
        <div class="card-body">
          <div class="text-left pb-1 text-info">{{ $article->data()["user_name"] }}</div>
          <h5 class="card-title">{{ $article->data()["artistLiveName"] }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $article->data()["liveSchedule"] }}</h6>
          <p class="card-text">{!! nl2br(htmlspecialchars($article->data()["setlist"])) !!}</p>
          <div class="mx-auto d-flex justify-content-between" style="width: 100px;">
            @if(Auth::id() == $article->data()["user_id"])
            {!! Form::open(['route' => ['article.edit', $article->id()], 'class' => 'w-50']) !!}
              <input type="submit" value="編集" class="btn btn-link font-weight-bold">
            {!! Form::close() !!}
            {!! Form::open(['route' => ['article.destroy', $article->id()], 'method' => 'delete', 'class' => 'w-50']) !!}
              <input type="submit" value="削除" class="btn btn-link font-weight-bold">
            {!! Form::close() !!}
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection