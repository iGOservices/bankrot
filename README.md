Шаблон для проекта
------------

Для начала необходимо настроить проект


Установка
------------

### Клонируем, и настраиваем сервер в папку web

Если у вас апатч
в папке /etc/apache2/sites-available/ создаем файл с конфигом

~~~
<VirtualHost *:80>
    ServerName template.lc
    DocumentRoot /var/www/template.lc/public_html/web
    <Directory /var/www/template.lc/public_html/web>
        RewriteEngine on

        # Если запрашиваемая в URL директория или файл существуют обращаемся к $
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        # Если нет - перенаправляем запрос на index.php
        RewriteRule . index.php
    </Directory>
</VirtualHost>
~~~

Делаем симлинк

~~~
ln -s /etc/apache2/sites-available/template.lc.conf /etc/apache2/sites-enabled/
~~~

и перезагружаем сервер

### Устанавливаем пакеты composer

~~~
composer install
~~~

Конфигурация
-------------

### База данных

Настроить файл `config/db.php`:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=template',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

### Миграции

1. Запусть rbac миграции

~~~
php yii migrate --migrationPath=@yii/rbac/migrations
~~~

2. Запусть rbac скрипт

~~~
php yii rbac/init
~~~

3. Запусть миграции проекта

~~~
php yii migrate
~~~

### Прочее

1. Создать админского пользователя

~~~
php yii hello/add-admin
~~~

2. Создать папку для загрузок файлов /upload/