### @package   yii2-collection
### @link      http://hiqdev.com/yii2-collection
### @license   http://hiqdev.com/yii2-collection/license
### @copyright Copyright (c) 2015 HiQDev

help:
	@echo Usage:
	@echo - make tests - To install and run tests
	@echo - make checks - To run checks

install:
	composer self-update && composer --version
	composer global require "fxp/composer-asset-plugin:1.*" "codeception/codeception:2.*" "fabpot/php-cs-fixer:1.*"
	export PATH="${HOME}/.composer/vendor/bin:${PATH}"
	composer update --prefer-dist --no-interaction

buildtests:
	codecept build --no-interaction

runtests:
	codecept run --no-interaction

tests: install buildtests runtests

checks: fix tests

fix:
	php-cs-fixer fix . --no-interaction

clean:
	rm -rf vendor composer.lock tests/unit/UnitTester.php
