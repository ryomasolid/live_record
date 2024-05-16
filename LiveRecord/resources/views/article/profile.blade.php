@extends('layouts.app')

@section('content')

<div class="text-center row justify-content-center py-3 mx-auto w-100">
  <form action="{{route('setting.icon')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="pt-2">
      <input id="image" type="file" name="image" >
    </div>
    <div class="pt-2 py-3">
      <input class="btn btn-info p-2" type="submit" value="送信">
    </div>

  <div class="py-5 border-top">
    マイセットリスト
    @foreach($articles as $article)
    <div class="card mx-auto mb-3 bg-light" style="width: 30rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $article->artistLiveName }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $article->liveSchedule }}</h6>
        <p class="card-text">{!! nl2br(htmlspecialchars($article->setlist)) !!}</p>
        <div class="mx-auto d-flex justify-content-between" style="width: 100px;">
          {!! Form::open(['route' => ['article.edit', $article->id], 'class' => 'w-50']) !!}
            <input type="submit" value="編集" class="btn btn-link font-weight-bold">
          {!! Form::close() !!}
          {!! Form::open(['route' => ['article.destroy', $article->id], 'method' => 'delete', 'class' => 'w-50']) !!}
            <input type="submit" value="削除" class="btn btn-link font-weight-bold">
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection