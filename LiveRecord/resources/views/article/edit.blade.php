@extends ('layouts.app')

@section('content')

<div class="row justify-content-center py-3 mx-auto w-100">
  <div class="col-12 px-2 py-3">
    {!! Form::open(['route' => ['article.updata', $article->id()], 'method' => 'put']) !!}
      <div class="card mx-auto mb-3" style="width: 30rem;">
        <div class="card-body bg-light font-weight-bold">
          <div class="form-group">
            <label for="formGroupExampleInput">アーティスト名 / ライブ名</label>
            <input type="text" class="form-control bg-light" id="artistLiveName" name="artistLiveName" value={{ $article->data()["artistLiveName"] }}>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">ライブ日程</label>
            <input type="text" class="form-control bg-light" id="liveSchedule" name="liveSchedule" value={{ $article->data()["liveSchedule"] }}>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">セットリスト</label>
            <textarea class="form-control bg-light" id="setlist" name="setlist" rows="15">{{ $article->data()["setlist"] }}</textarea>
          </div>
        </div>
      </div>
      <div class="row mx-auto justify-content-center">
        {!! Form::submit('更新', ['class' => 'btn btn-danger btn-lg']) !!}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection