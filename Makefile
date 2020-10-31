init: create-volume build run

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

create-volume:
	docker volume create pg-marketplace