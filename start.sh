# Setting up storage access level
chmod -R 777 storage/ storage/*

# Copying env file
cp .env.example .env

# Running docker at background
docker-compose up -d

# Generating env key
docker-compose exec app php artisan key:generate

# Running tests
docker-compose exec app php artisan test

# Fresh migrating
docker-compose exec app php artisan migrate:fresh

# Seeding database
docker-compose exec app php artisan db:seed

# Cleaning view cache
docker-compose exec app php artisan view:clear

# Cleaning route cache
docker-compose exec app php artisan route:clear

# Cleaning app cache
docker-compose exec app php artisan cache:clear

# Running cron job (1 min)
docker-compose exec app .docker/bin/cron.sh
