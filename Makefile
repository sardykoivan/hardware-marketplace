init: build run migrate

build: composer-install
	cd docker && docker-compose build

run:
	cd docker && docker-compose up -d

rm:
	cd docker && docker-compose down --remove-orphans

logs:
	cd docker && docker-compose logs -f

composer-install:
	cd docker && docker-compose run --rm fpm composer install

migrate:
	docker exec -it marketplace_fpm_1 php bin/console make:migration
	docker exec -it marketplace_fpm_1 php bin/console doctrine:migrations:migrate