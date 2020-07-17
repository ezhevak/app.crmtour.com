# CRM Tour
CRM система для туристических компаний


# Структура папок проекта crmtour.com <br/>
app - первая версия системы больше не поддерживается. Находится по адресу и работает https://app.crmtour.com <br/>
www - новая версия ситемы. Будет находится по адресу https://crmtour.com<br/>


# Установка crmtour.com 
1. Используя phpMyAdmin импортируем структуру базы данных 
- /app/mysql/01.tables.sql
- /app/mysql/02.functions.sql
- /app/mysql/03.procedures.sql
- /app/mysql/04.vuews.sql

2. В файл /app/connection.php прописываем параметры подключения
3. в файле .htaccess заменяем https://example.com/$1  на реальную ссылку вашего сайта

Готово