  @php
    $storage = app('firebase.storage')->getBucket(config('app.gcp_bucket_name'));
    $object = $storage->object(Auth::user()->name);
      $url = $object->signedUrl(
        # This URL is valid for 60 minutes
        new \DateTime('60 min'),
        [
            'version' => 'v4',
        ]
      );
  @endphp

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LiveRecord</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container">
    <header class="d-flex justify-content-between flex-wrap py-3 mb-4 border-bottom">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('article.index') }}" class="nav-link">LiveRecord</a></li>
      </ul>
      <div>
        <img src={{ $url }} width="50" height="50" class="img-thumbnail" alt="ユーザーアイコン">
      </div>
      <div class="btn-group float-right">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('article.profile') }}">プロフィール</a>
          <a class="dropdown-item" href="#">お気に入り</a>
          <a class="dropdown-item" href="{{ route('setting.configuration') }}">設定</a>
          <div class="dropdown-divider"></div>
          <form action="{{ route('logout') }}" method="post" class="dropdown-item">
            @csrf
            <input type="submit" value="ログアウト" class="btn btn-link">
          </form>
        </div>
      </div>
    </header>
  </div>
  @yield('content')
</body>
</html>
