help: ## Prints this help.
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

build: ## Build the app with docker-compose
	@docker-compose build

up:
	@docker-compose up -d

stop:
	@docker-compose stop

ps:
	@docker-compose ps

run: ## Run app in console
	@docker-compose run --rm app php public/index.php

composer-install: ## Add vendor directory in your local host
	@docker-compose run --rm  -v `pwd`/vendor:/usr/app/vendor:Z app composer install

check: ## Check PHP style code standards
	@docker-compose run --rm app ./vendor/bin/psalm --show-info=true
	@docker-compose run --rm app ./vendor/bin/phpcs --standard=PSR1,PSR2,PSR12 public src

lint: ## Apply code style standards automatically
	@docker-compose run --rm app ./vendor/bin/phpcbf --standard=PSR1,PSR2,PSR12 public src

test: ## Run tests
	@docker-compose run --rm app ./vendor/bin/phpunit --colors="always" tests