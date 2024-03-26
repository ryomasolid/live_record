## SetUp
開発環境はdockerで構成されている
以下のコマンドでdockerが立ち上がる
```
docker-compose up
```

※初回のみ
docker内部に入りLaravelをインストールする
```
docker-compose exec php sh
composer install
php artisan migrate
php artisan db:seed
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

http://localhost:80