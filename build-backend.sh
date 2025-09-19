docker-compose run --rm app composer install
# docker-compose run --rm app php artisan migrate --force
# docker-compose run --rm app php artisan db:seed --force
docker-compose run --rm app php artisan optimize
docker-compose restart app
