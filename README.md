# CRM Tour
CRM система для туристических компаний


# Структура папок проекта crmtour.com <br/>
Первая версия системы больше не поддерживается. Находится по адресу и работает https://app.crmtour.com <br/>
Будет находится по адресу https://crmtour.com<br/>


# Установка crmtour.com 
1. Используя phpMyAdmin импортируем структуру базы данных 
- /app/mysql/01.tables.sql
- /app/mysql/02.functions.sql
- /app/mysql/03.procedures.sql
- /app/mysql/04.vuews.sql

2. /app/connection.php.example переименовываем в файл /app/connection.php прописываем параметры подключения
3. в файле .htaccess заменяем https://example.com/$1  на реальную ссылку вашего сайта
4. Важно! Версия PHP 5.6!
5. Поздравляем с успешной установкой. Переходите на страницу регистрации компании. После регистрации используйте введённые данные и начинайте работу в системе.
6. Переходим на сайт <a href="https://www.google.com/recaptcha/admin/create">reCAPTCHA</a> и создаём новую reCAPTCHA v3. recaptchaSecret сохраняем в файл connection.php