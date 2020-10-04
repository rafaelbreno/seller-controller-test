chmod -R 777 storage/ storage/*

cp .env.example .env

docker-compose up -d

docker-compose exec app php artisan key:generate

docker-compose exec app php artisan migrate:fresh

docker-compose exec app php artisan db:seed

docker-compose exec app php artisan view:clear

docker-compose exec app php artisan route:clear

docker-compose exec app php artisan cache:clear

docker-compose exec app .docker/bin/cron.sh
