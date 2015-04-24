# @link    http://hiqdev.com/yii2-collection
# @license http://hiqdev.com/yii2-collection/license
# @copyright Copyright (c) 2015 HiQDev

help:
	@echo Usage:
	@echo - make test - To install and run tests
	@echo - make checks - To run checks

install:
	composer self-update && composer --version
	composer global require "fxp/composer-asset-plugin:1.0.0"
	export PATH="${HOME}/.composer/vendor/bin:${PATH}"
	composer install --prefer-dist --no-interaction

buildtest:
	codecept build --no-interaction

runtest:
	codecept run --no-interaction

test: install buildtest runtest
