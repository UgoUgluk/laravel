# Lavarel для cpanel

## Замена public на public_html
1. ```public``` переименован в ```public_html```
2. для нормальной работы на локальной машине создан файл ```server.php```, где ```/public``` заменен на  ```/public_html```
3. В ```AppServiceProviver.php``` у метода ```register``` прописан код
```php
$this->app->bind('path.public', function() {
  return realpath(base_path().'/../public_html');
});
```
4. В ```webpack.mix.js``` ```public``` заменен на ```public_html``` и прописан ```mix.setPublicPath("public_html/");```
5. В ```.gitignore``` ```public``` заменен на ```public_html```

## Автоматический deploy
1. Для репозитория установить секретные значения
- GIT_TOKEN - токен гитхаба
- PROJECT_PATH - путь к проекту на сервере, например ```/home/rrrr```
- SERVER_IP
- SERVER_PASSWORD
- SERVER_USERNAME 
2. Прописан конфиг для деплоя после пуша в ветку master, тут ```.github/workflows/ci.yml```

## Памятка для виртуального хостинга под cpanel
1. в разделе выше public_html инициализировать git ```git init```
2. забрать репозиторий, заменив на свой токен, ```git pull https://${{ secrets.GIT_TOKEN }}:x-oauth-basic@github.com/UgoUgluk/laravel.git master```
3. подтянуть все пакеты ```composer install```
4. создать ```.env``` и на примере ```.env.example```(сам файл не трогать) внести данные о БД и APP_URL(и т.д.)
5. сгенерировать ключ ```php artisan key:generate```
6. установить админку orchid ```php artisan orchid:install```
7. создать администратора, например ```php artisan orchid:admin admin admin@admin.com password```
