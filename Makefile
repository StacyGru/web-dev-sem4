LOCALHOST_PROJECT_DIR := $(shell pwd)
PROJECT_NAME := project

.DEFAULT_GOAL := help
# This will output the help for each task
# thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help:## This is help.
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: help


echo-project-dir:## Show current working directory.
	@echo $(LOCALHOST_PROJECT_DIR)
	@echo $(PROJECT_NAME)

.PHONY: echo-project-dir


## Docker compose shortcuts
up-dev: COMPOSE_FILE=./docker-compose.yml
up-dev: ## Up current containers for dev
	docker-compose -f $(COMPOSE_FILE) up -d

.PHONY: up-dev 


php-exec-cmd: CMD?=-r 'phpinfo();'
php-exec-cmd: ## Run any php command in our container
	docker exec $(PROJECT_NAME)-php php $(CMD)

.PHONY: php-exec


up:
	docker-compose up

.PHONY: up


stop:
	docker-compose stop

.PHONY: stop


i:
	composer install

.PHONY: i