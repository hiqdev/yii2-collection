hiqdev/yii2-collection commits history
--------------------------------------

## 0.0.3 Under development

    - 1e39467 2015-08-07 `BaseTrait` - added `count()` method, FIXED `addItems()` method (???) (d.naumenko.a@gmail.com)
    - a3e1ef7 2015-06-26 php-cs-fixed (sol@hiqdev.com)
    - 0644c1d 2015-06-26 fixed requirements (sol@hiqdev.com)

## 0.0.2 June 19, 2015

- php-cs-fixed
    - dd1bfd9 2015-06-19 rephp-cs-fixed (sol@hiqdev.com)
- hideved
    - 01c3a1d 2015-06-19 hideved (sol@hiqdev.com)
- small fixes
    - 2b1d237 2015-06-19 * BaseTrait::rawItem + default value (sol@hiqdev.com)
    - 05be8f5 2015-05-17 - require yii2 (sol@hiqdev.com)
    - bfba8ba 2015-05-14 improved putItem and used everywhere renamed getRaw -> rawItem improved insertInside, renamed convertWhere2List -> prepareWhere (sol@hiqdev.com)

## 0.0.1 May 12, 2015

- lot of playing with Travis, php-cs-fixer, codeception
    - 2c95c95 2015-05-12 fixed getItemConfig, reflectioning proper class (sol@hiqdev.com)
    - 91a363c 2015-05-08 Travis fixed. Again... (d.naumenko.a@gmail.com)
    - 52e19b7 2015-05-08 Travis fixed (d.naumenko.a@gmail.com)
    - 61d39bc 2015-05-08 Playing with travis-ci (d.naumenko.a@gmail.com)
    - be45b95 2015-05-08 Playing with travis-ci config (d.naumenko.a@gmail.com)
    - cb1d5aa 2015-05-08 Playing with travis-ci config (d.naumenko.a@gmail.com)
    - b58d930 2015-05-08 Added ItemWithName and ItemWithCollection interfaces (d.naumenko.a@gmail.com)
    - 42e1184 2015-05-07 * ManagerTrait::getItemConfig: + tellName/Parent (sol@hiqdev.com)
    - a627c4a 2015-05-07 * getIterator moved to BaseTrait (sol@hiqdev.com)
    - 7ca869e 2015-05-07 php-cs-fixed (sol@hiqdev.com)
    - c37d34d 2015-05-07 + BaseTrait, ManagerTrait (sol@hiqdev.com)
    - 0cd6bad 2015-05-06 + ManagerTrait (sol@hiqdev.com)
    - c6dea94 2015-05-06 * setItems: do nothing when empty items (sol@hiqdev.com)
    - 2096ac2 2015-05-05 php-cs-fixed (sol@hiqdev.com)
    - 5e920f1 2015-05-05 fixed get/set('') (sol@hiqdev.com)
    - ba603ca 2015-05-05 * CollectionTrait ArrayAccess items to work with items only (sol@hiqdev.com)
    - 636e475 2015-05-04 * smartSet to use setItem <- set (sol@hiqdev.com)
    - f497af8 2015-05-04 * creating item * getRaw to return really raw (sol@hiqdev.com)
    - 1073da2 2015-05-03 php-cs-fixed (sol@hiqdev.com)
    - d95804f 2015-05-03 php-cs-fixed (sol@hiqdev.com)
- basics done
    - c6ce463 2015-05-03 * Object, Component: + IteratorAggregate interface (sol@hiqdev.com)
    - e735de5 2015-05-03 redone set functions with where argument, + getIterator() for IteratorAggregate (sol@hiqdev.com)
    - 3d654c7 2015-05-03 + more tests (sol@hiqdev.com)
    - 4f73089 2015-05-03 + enable coverage (sol@hiqdev.com)
    - 0708f9b 2015-05-03 * createItem to work with non arrays (sol@hiqdev.com)
    - 07accc9 2015-05-02 default itemClass to get_called_class (sol@hiqdev.com)
    - 896667e 2015-05-02 * addItem to check with hasItem and set with setItem (sol@hiqdev.com)
    - 9ae7daa 2015-04-30 minor fix (sol@hiqdev.com)
    - 4159ace 2015-04-30 REDONE a bit (sol@hiqdev.com)
    - 71aa2fa 2015-04-29 minor [skip ci] (sol@hiqdev.com)
    - fb6ef6a 2015-04-29 try3 (sol@hiqdev.com)
    - 80d9c94 2015-04-29 still strying (sol@hiqdev.com)
    - e0bc391 2015-04-29 + CBIN (sol@hiqdev.com)
    - 943f83d 2015-04-29 trying (sol@hiqdev.com)
    - 15af62c 2015-04-29 fixed Makefile spaces -> tab (sol@hiqdev.com)
    - 33ed9ff 2015-04-29 trying (sol@hiqdev.com)
    - d2e14ad 2015-04-29 + setpath (sol@hiqdev.com)
    - 46d1147 2015-04-29 trying global php-cs-fixer and codeception [skip ci] (sol@hiqdev.com)
    - e37d4f1 2015-04-29 added .scrutinizer.yml (sol@hiqdev.com)
    - 6afa261 2015-04-29 php-cs-fixed (sol@hiqdev.com)
    - ca96353 2015-04-29 + more tests (sol@hiqdev.com)
    - 6badfaf 2015-04-28 BIG changes: + Model, splitted functional to Manager, added tests (sol@hiqdev.com)
    - 3cf92bc 2015-04-26 allow hhvm build to fail (sol@hiqdev.com)
    - 286fbd3 2015-04-26 * Makefile: enabled full checks: fix tests (sol@hiqdev.com)
    - 7b5e01e 2015-04-26 php-cs-fixed (sol@hiqdev.com)
    - d4e0478 2015-04-26 php-cs-fixing [skip ci] (sol@hiqdev.com)
    - ae2848a 2015-04-26 * composer.json: + extra (sol@hiqdev.com)
    - b1feb72 2015-04-26 doc [skip ci] (sol@hiqdev.com)
    - 8c8ee19 2015-04-25 php-cs-fixed (sol@hiqdev.com)
    - bf7e588 2015-04-25 no need setPhpdoc any more (sol@hiqdev.com)
    - 0c0df1e 2015-04-25 disabled fix for the moment (sol@hiqdev.com)
    - 5fdba26 2015-04-24 php-cs-fixed (sol@hiqdev.com)
    - 325e54c 2015-04-24 still trying (sol@hiqdev.com)
    - d79dc85 2015-04-24 trying phpdoc (sol@hiqdev.com)
    - b146cf2 2015-04-24 php-cs-fixed and fixed addItems (sol@hiqdev.com)
    - ae29feb 2015-04-24 improved .php_cs: + skip UnitTests.php (sol@hiqdev.com)
    - 023ab9c 2015-04-24 php-cs-fixed (sol@hiqdev.com)
    - 2d93480 2015-04-24 php-cs-fixed (sol@hiqdev.com)
    - d81b741 2015-04-24 php-cs-fixed (sol@hiqdev.com)
    - 9e3ca7c 2015-04-24 trying (sol@hiqdev.com)
    - 9835033 2015-04-24 trying (sol@hiqdev.com)
    - 3085249 2015-04-24 + contrib fixers (sol@hiqdev.com)
    - aed16a3 2015-04-24 improved .php_cs (sol@hiqdev.com)
    - fbf3b47 2015-04-24 Integrating php-cs-fixer (sol@hiqdev.com)
    - 2a817b6 2015-04-24 + require codeception for travis (sol@hiqdev.com)
    - a070885 2015-04-24 + make clean (sol@hiqdev.com)
    - e1c1ddc 2015-04-24 trafis do it ! (sol@hiqdev.com)
    - d9a8bd6 2015-04-24 + testing, making travis (sol@hiqdev.com)
    - 346cad8 2015-04-24 NOT FINISHED making tests (sol@hiqdev.com)
    - 627d23e 2015-04-23 + tests/CollectionTest.php (sol@hiqdev.com)
    - c7a62e3 2015-04-23 try (sol@hiqdev.com)
    - e725a84 2015-04-22 NOT TESTED (sol@hiqdev.com)
    - fa16f83 2015-04-22 doc (sol@hiqdev.com)
- inited
    - 4ca7b69 2015-04-22 inited (sol@hiqdev.com)

## Development started April 22, 2015

