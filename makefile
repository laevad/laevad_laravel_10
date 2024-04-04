# build
build:
	docker-compose build --force-rm

stop:
	docker-compose stop

down:
	docker-compose down

rm:
	docker-compose rm -f

start:
	docker-compose up -d

restart:
	docker-compose restart

# composer update
composer-update:
	docker-compose exec app composer update

# composer update -W
composer-update-w:
	docker-compose exec app composer update -W

# composer install --ignore-platform-reqs
composer-install-ignore-platform-reqs:
	docker-compose exec app composer install --ignore-platform-reqs

# composer install
composer-install:
	docker-compose exec app composer install

# composer require enesisrl/laravel-eloquent-uuid
composer-require-eloquent-uuid:
	docker-compose exec app composer require enesisrl/laravel-eloquent-uuid

# generate key
key-generate:
	docker-compose exec app php artisan key:generate

# generate jwt key
jwt-generate:
	docker-compose exec app php artisan jwt:secret

# database
db-migrate:
	docker-compose exec app php artisan migrate

db-seed:
	docker-compose exec app php artisan db:seed

db-fresh:
	docker-compose exec app php artisan migrate:fresh --seed

# clear route
route-clear:
	docker-compose exec app php artisan route:clear

# bash
bash:
	docker-compose exec app bash

