include .env

# BUILD command
.PHONY: build
build:
	cp .env.example .env
	php artisan key:generate
	docker stop $$(docker ps -aq)
	docker compose build
	docker network create proxynet
	docker compose up -d
	docker exec -it ${PROJECT_NAME}_app sh -c "chmod -R 777 /var/www/"
	docker exec -it ${APP_NAME}_app sh -c "composer install"
	exit
	@echo "\033[0;32mBuild done\033[0m"

# RUN command
.PHONY: run
run:
	docker compose up -d
	@echo "\033[0;32mDone\033[0m"

# RUN command
.PHONY: stop
stop:
	docker-compose down
	@echo "\033[0;32mDone\033[0m"

# ECS command
.PHONY: ecs
ecs:
	docker exec -it ${APP_NAME}_app sh -c "vendor/bin/ecs --fix"
	docker exec -it ${PROJECT_NAME}_app sh -c "chmod -R 777 /var/www/"
# ECS command
.PHONY: db
db:
	docker exec -it ${PROJECT_NAME}_app sh -c "php artisan migrate"
	docker exec -it ${PROJECT_NAME}_app sh -c "php artisan db:seed"
