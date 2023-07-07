# CRM Tour
CRM система для туристических компаний

# Структура папок проекта crmtour.com <br/>
Первая версия системы больше не поддерживается. Находится по адресу и работает https://app.crmtour.com <br/>
Новая версия будет находится по адресу https://crmtour.com<br/>


# Установка crmtour.com 
1. Используя phpMyAdmin импортируем структуру базы данных 
- /app/mysql/01.tables.sql
- /app/mysql/02.functions.sql
- /app/mysql/03.procedures.sql
- /app/mysql/04.vuews.sql

2. Важно! Версия PHP 5.6!
3. Поздравляем с успешной установкой. Переходите на страницу регистрации компании. После регистрации используйте введённые данные и начинайте работу в системе.
4. Переходим на сайт <a href="https://www.google.com/recaptcha/admin/create">reCAPTCHA</a> и создаём новую reCAPTCHA v3. recaptchaSite и recaptchaSecret сохраняем в файл connection.php

# Дополнительные плагины
- https://github.com/ThingEngineer/PHP-MySQLi-Database-Class - для работы с бд