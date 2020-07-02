destroy:
	docker-compose down
	docker rmi php:7.4-mysql-xdebug -f
	docker-compose build --no-cache

build:
	docker build -t php:7.4-mysql-xdebug .

tests:
	docker-compose run --rm phpunit vendor/bin/phpunit

phpstan:
	docker-compose run --rm phpunit vendor/bin/phpstan analyse --level=8 src test