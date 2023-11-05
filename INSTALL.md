# Pasos para instalar

1. git clone
2. composer install
3. cp .env-example .env
   * set database info
   * set queue_driver = database
   * set mailer variables
   * set session driver = cookie
4. php artisan key:generate
5. php artisan storage:link
6. mkdir public/storage/images
7. php artisan migrate --seed
