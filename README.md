Памятка для виртуального хостинга под cpanel
1. Для репозитория установить секретные значения
```
GIT_TOKEN //- токен гитхаба
PROJECT_PATH //- путь к проекту на сервере, например ```/home/rrrr```
SERVER_IP
SERVER_PASSWORD
SERVER_USERNAME 
```
2. в разделе выше public_html инициализировать git ```git init```
3. забрать репозиторий, заменив на свой токен, ```git pull https://${{ secrets.GIT_TOKEN }}:x-oauth-basic@github.com/UgoUgluk/laravel.git master```
4. подтянуть все пакеты ```composer install```
5. создать .env и на примере .env.example(сам файл не трогать) внести данные о БД и APP_URL(и т.д.)
6. сгенерировать ключ ```php artisan key:generate```
7. установить админку orchid ```php artisan orchid:install```
8. создать администратора, например ```php artisan orchid:admin admin admin@admin.com password```
