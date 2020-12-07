.DEFAULT_GOAL=help
GROUPS=all
LOCAL_DOMAIN ?= symfony.5.api.com
EXEC_PHP = symfony php
$(eval LAST_COMMIT = $(shell git log -1 --oneline --pretty=format:"%h - %an, %ar"))

help:
	@printf "\n                              Symfony_5_api"
	@printf "\n                              ------------"
	@printf "\n"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$|^##' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
	@#grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%s\033[0m %s\n", $$1, $$2}'
	@#fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
	@printf "\n"
	@printf "\nLast release: \033[32m%s\033[0m" \
	  $(shell git describe --abbrev=0 --tags)
	@printf "\nLast commit: "
	@printf "\033[32m %s\033[0m" \
	  $(LAST_COMMIT)
	@printf "\n"

##
##                                 Setup
##---------------------------------------------------------------------------
##

up: symfony-up vendor## Start project

down: symfony-down docker-down ## Stop project

symfony-up: ## start the project
	symfony proxy:domain:attach $(LOCAL_DOMAIN)
	symfony proxy:start
	symfony server:ca:install
	symfony serve -d

symfony-down: ## stop the project
	symfony server:stop
	symfony proxy:stop

vendor: ## Install dependencies locally
	symfony composer install


##
##                                Quality
##---------------------------------------------------------------------------
##

test: test-unitaire

tu: test-unitaire

test-unitaire: vendor
	$(EXEC_PHP) ./vendor/bin/pest