chmod -R 777 storage/ storage/*

cp .env.example .env

docker-compose up -d

docker-compose exec app php artisan key:generate

docker-compose exec app php artisan migrate:fresh
