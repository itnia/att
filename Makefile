# To build for various environments in root directory should be files like docker-compose.[environment].yml. Then
# you can run make env=[environment]
env ?=local
.PHONY: local
start:
	docker-compose  -f docker-compose.$(env).yml -p att_$(env) up  -d --force-recreate --no-deps --build
down:
	docker-compose -f docker-compose.$(env).yml -p att_$(env) down --remove-orphans
.PHONY: kill
kill:
	docker-compose -f docker-compose.$(env).yml -p att_$(env) kill --remove-orphans
.PHONY: shell
shell:
	docker-compose -f docker-compose.$(env).yml -p att_$(env) exec --user=1000 php bash
.PHONY: root
root:
	docker-compose -f docker-compose.$(env).yml -p att_$(env) exec --user=root php bash
.PHONY: mysql
mysql:
	docker-compose -f docker-compose.$(env).yml -p att_$(env) exec db mysql -uroot -p
.PHONY: deploy
deploy:
	git pull
	docker-compose -f docker-compose.$(env).yml -p att_$(env) exec -T php bash -c "./docker/deploy.sh"
.PHONY: environment
environment:
	./docker.sh
.PHONY: test
test:
	docker-compose -f docker-compose.$(env).yml -p att_$(env) exec -T php bash -c "./docker/autotest.sh"
scheduler:
	/usr/local/bin/docker-compose -f docker-compose.$(env).yml -p att_$(env) exec -T php sh -c "php /var/www/html/artisan schedule:run"


