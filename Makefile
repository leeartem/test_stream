run:
	docker-compose up --build -d && docker-compose run --rm composer i && docker-compose run --rm artisan migrate --seed
stop:
	docker-compose stop 
optimize:
	docker-compose run --rm artisan optimize
migrate:
	docker-compose run --rm artisan migrate

reset:
	docker-compose run --rm artisan migrate:fresh --seed