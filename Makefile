build:
	@docker-compose build

up:
	@docker-compose up -d

stop:
	@docker-compose stop

ps:
	@docker-compose ps

run:
	@docker-compose run --rm app php public/index.php

composer-install:
	@docker-compose run --rm  -v `pwd`/vendor:/usr/app/vendor:Z app composer install

check:
	@docker-compose run --rm app ./vendor/bin/psalm --show-info=true
	@docker-compose run --rm app ./vendor/bin/phpcs --standard=PSR1,PSR2,PSR12 public src

lint:
	@docker-compose run --rm app ./vendor/bin/phpcbf --standard=PSR1,PSR2,PSR12 public src

test:
	@docker-compose run --rm app ./vendor/bin/phpunit --colors="always" tests