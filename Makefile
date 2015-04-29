### @link      http://hiqdev.com/yii2-collection
### @package   yii2-collection
### @license   BSD 3-clause
### @copyright Copyright (c) 2015 HiQDev

help:
	@echo Usage:
	@echo - make tests - To install and run tests
	@echo - make checks - To run checks

install:
	composer self-update && composer --version
	composer global require "fxp/composer-asset-plugin:1.*" "codeception/codeception:2.*" "fabpot/php-cs-fixer:1.*"
	composer update --prefer-dist --no-interaction

setpath:
	export CBIN="${HOME}/.composer/vendor/bin"

buildtests: setpath
	${CBIN}/codecept build --no-interaction

runtests: setpath
	${CBIN}/codecept run --no-interaction

tests: install buildtests runtests

checks: fix tests

fix: setpath
	env
	${CBIN}/php-cs-fixer fix . --no-interaction

clean:
	rm -rf vendor composer.lock tests/unit/UnitTester.php
