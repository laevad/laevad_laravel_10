# build
build:
	docker-compose build --no-cache --force-rm

stop:
	docker-compose stop

start:
	docker-compose up -d

restart:
	docker-compose restart

# composer update
composer-update:
	docker-compose exec app composer update

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