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

# composer install
composer-install:
	docker-compose exec app composer install

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

# bash
bash:
	docker-compose exec app bash