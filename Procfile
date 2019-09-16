web: vendor/bin/heroku-php-apache2 public/
web: php artisan queue:work --tries=3
release: php artisan migrate:fresh
