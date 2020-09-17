up:
	docker-compose up --build -d

down:
	docker-compose down

composer-install:
	docker run --rm -v $(PWD):/app composer install

composer-update:
	docker run --rm -v $(PWD):/app composer update

composer-require:
	docker run --rm -v $(PWD):/app composer require ${PACKAGE}

composer-dump-autoload:
	docker run --rm -v $(PWD):/app composer dump-autoload

db-migrate:
	docker exec -it event_organizer php artisan migrate

db-seed:
	docker exec -it event_organizer php artisan db:seed

run-tests:
	docker exec -it event_organizer php artisan test

add-participants:
	docker exec -it event_organizer php artisan db:seed --class=EventParticipantSeeder
