# Dinarys Test

## Установка
* Склонировать проект в свое локальное веб окружение (у меня это Vagrant + Homestead) у вас может быть любое другое главное чтобы было php >= 5.6 и MySql и composer. Так же понадобиться Node.js

* Переименовать файл .env.example в .env и в этом файле подключить базу данных это делается в следующих строчках
```
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```
* Открыть консоль в корне проекта и выполнить комманды
```
composer install
php artisan key:generate
php artisan migrate
php artisan passport:install
```
* Подключится к базе данных и скопировать из таблицы oauth_clients в row c id = 2 значение колонки secret

* Открыть файл \resources\assets\js\components\authentication\Login.vue
и в 35 строке заменить
```
client_secret: 'сюда вставить значение из бд'
```
* выполнить в корне проекта комманды
```
npm install
npm run dev
```
Теперь проект должен заработать


 



