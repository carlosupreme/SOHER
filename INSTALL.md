# Pasos para instalar

1. git clone
2. composer install
3. npm i
4. cp .env-example .env
   -set database info
   -set queue_driver=database
   -set mailer variables
5. php artisan key:generate
6. php artisan storage:link
7. mkdir public/storage/images
8. php artisan migrate --seed
