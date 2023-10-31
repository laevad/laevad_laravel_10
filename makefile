# This Makefile contains commands for building, running, and managing a Laravel project using Docker Compose.
# The available commands are:
# - build: builds the Docker images for the project
# - rebuild: stops and removes the containers, then builds and starts them again
# - stop: stops the containers
# - down: stops and removes the containers
# - rm: removes the containers
# - start: starts the containers
# - restart: restarts the containers
# - composer-update: runs "composer update" inside the app container
# - composer-install: runs "composer install" inside the app container
# - key-generate: runs "php artisan key:generate" inside the app container
# - jwt-generate: runs "php artisan jwt:secret" inside the app container
# - db-migrate: runs "php artisan migrate" inside the app container
# - db-seed: runs "php artisan db:seed" inside the app container
# - db-fresh: runs "php artisan migrate:fresh --seed" inside the app container
# - bash: opens a bash shell inside the app container
# - create-project: creates a new Laravel project inside the app container
# - ps: shows the status of the Docker containers
# - psa: shows the status and information of all Docker containers
# build
build:
	docker-compose build --no-cache --force-rm

# all in one down build and run
rebuild:
	docker-compose down
	docker-compose build --no-cache --force-rm
	docker-compose up -d

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

# check if the src folder is empty and exist then create a new laravel project and setup .env file
create-project:
	@if [ -z "$(ls -A src)" ]; then \
		docker-compose exec app composer create-project --prefer-dist laravel/laravel .; \
		cp src/.env.example src/.env; \
		docker-compose exec app php artisan key:generate; \
		docker-compose exec app php artisan jwt:secret; \
	else \
		echo "src folder is not empty"; \
	fi

# check the docker container status
ps:
	docker-compose ps

# check all the docker container status and info
psa:
	docker-compose ps -a