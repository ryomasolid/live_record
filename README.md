## SetUp
開発環境はdockerで構成されている
以下のコマンドでdockerが立ち上がる
```
docker-compose up
```

docker内部に入りLaravelをインストールする
```
docker-compose exec php sh
composer install
```

http://localhost:82