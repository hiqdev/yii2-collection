hiqdev/yii2-collection
----------------------

## [0.1.1] - 2017-05-10

- Added `rawItems()` in ManagerTrait
    - [8c1af43] 2017-05-10 added `ManagerTrait::rawItems()` [@hiqsol]
- Fixed minor issues
    - [b29677b] 2017-05-10 csfixed [@hiqsol]
    - [082c552] 2017-05-10 fixed tests for phpunit 6 [@hiqsol]
    - [adcd92a] 2017-05-10 renamed `hidev.yml` <- .hidev/config.yml [@hiqsol]
    - [d4ab846] 2017-05-08 allowed item class to not exist in ManagerTrait [@hiqsol]

## [0.1.0] - 2016-12-30

- Changed `getItem()`: + default value
    - [cfffdf8] 2016-12-30 redone bumping to chkipper [@hiqsol]
    - [4f2dc3c] 2016-12-30 csfixed [@hiqsol]
    - [a29c3f2] 2016-12-30 changed `getItem()`: + default value [@hiqsol]
    - [f60b13d] 2016-07-17 csfixed [@hiqsol]
    - [065109e] 2016-07-17 used asset-packagist.org [@hiqsol]
    - [04ecdb5] 2016-07-17 rehideved [@hiqsol]
    - [cae22fe] 2016-07-17 removed Makefile [@hiqsol]
    - [2c436b9] 2016-07-16 csfixed [@hiqsol]

## [0.0.4] - 2015-12-01

- Added Travis CI
    - [038644c] 2015-11-24 added Travis CI [@hiqsol]
    - [34a43e3] 2015-11-24 php-cs-fixed [@hiqsol]

## [0.0.3] - 2015-11-24

- Changed: redone with `php-collection`
    - [7a55e73] 2015-11-23 ObjectTrait - Fixed setting triggers and behaviors with `on ` and `as ` items [@SilverFire]
    - [9af7d3a] 2015-11-23 Tests - changed namespace [@SilverFire]
    - [ccfceb7] 2015-11-21 fixed back codeception tests [@hiqsol]
    - [d88c236] 2015-11-20 redone with `php-collection` [@hiqsol]
    - [111555d] 2015-11-20 redoing tests to phpunit [@hiqsol]
    - [cc46c70] 2015-11-20 fixed namespace [@hiqsol]
    - [4ea2125] 2015-11-20 fixed namespace [@hiqsol]
    - [d834c00] 2015-11-20 moved to src [@hiqsol]
    - [906c4c5] 2015-11-20 Fixed setting triggers and behaviors with `on ` and `as ` items [@SilverFire]
    - [24c1433] 2015-11-20 redone with `php-collection` [@hiqsol]
    - [44a6c30] 2015-11-20 redoing tests to phpunit [@hiqsol]
    - [975c37d] 2015-11-20 fixed namespace [@hiqsol]
    - [7ea0de7] 2015-11-20 fixed namespace [@hiqsol]
    - [8c44704] 2015-11-20 moved to src [@hiqsol]
    - [1d5aba0] 2015-11-05 BaseTrait::keys() - fixed returning type in PHPDoc [@SilverFire]
    - [1e39467] 2015-08-07 `BaseTrait` - added `count()` method, FIXED `addItems()` method (???) [@SilverFire]
    - [a3e1ef7] 2015-06-26 php-cs-fixed [@hiqsol]
    - [0644c1d] 2015-06-26 fixed requirements [@hiqsol]

## [0.0.2] - 2015-06-19

- Fixed minor issues
    - [dd1bfd9] 2015-06-19 rephp-cs-fixed [@hiqsol]
    - [01c3a1d] 2015-06-19 hideved [@hiqsol]
    - [2b1d237] 2015-06-19 * BaseTrait::rawItem + default value [@hiqsol]
    - [05be8f5] 2015-05-17 - require yii2 [@hiqsol]
    - [bfba8ba] 2015-05-14 improved putItem and used everywhere renamed getRaw -> rawItem improved insertInside, renamed convertWhere2List -> prepareWhere [@hiqsol]

## [0.0.1] - 2015-05-12

- Added basics
    - [2c95c95] 2015-05-12 fixed getItemConfig, reflectioning proper class [@hiqsol]
    - [91a363c] 2015-05-08 Travis fixed. Again... [@SilverFire]
    - [52e19b7] 2015-05-08 Travis fixed [@SilverFire]
    - [61d39bc] 2015-05-08 Playing with travis-ci [@SilverFire]
    - [be45b95] 2015-05-08 Playing with travis-ci config [@SilverFire]
    - [cb1d5aa] 2015-05-08 Playing with travis-ci config [@SilverFire]
    - [b58d930] 2015-05-08 Added ItemWithName and ItemWithCollection interfaces [@SilverFire]
    - [42e1184] 2015-05-07 * ManagerTrait::getItemConfig: + tellName/Parent [@hiqsol]
    - [a627c4a] 2015-05-07 * getIterator moved to BaseTrait [@hiqsol]
    - [7ca869e] 2015-05-07 php-cs-fixed [@hiqsol]
    - [c37d34d] 2015-05-07 + BaseTrait, ManagerTrait [@hiqsol]
    - [0cd6bad] 2015-05-06 + ManagerTrait [@hiqsol]
    - [c6dea94] 2015-05-06 * setItems: do nothing when empty items [@hiqsol]
    - [2096ac2] 2015-05-05 php-cs-fixed [@hiqsol]
    - [5e920f1] 2015-05-05 fixed get/set('') [@hiqsol]
    - [ba603ca] 2015-05-05 * CollectionTrait ArrayAccess items to work with items only [@hiqsol]
    - [636e475] 2015-05-04 * smartSet to use setItem <- set [@hiqsol]
    - [f497af8] 2015-05-04 * creating item * getRaw to return really raw [@hiqsol]
    - [1073da2] 2015-05-03 php-cs-fixed [@hiqsol]
    - [d95804f] 2015-05-03 php-cs-fixed [@hiqsol]
    - [c6ce463] 2015-05-03 * Object, Component: + IteratorAggregate interface [@hiqsol]
    - [e735de5] 2015-05-03 redone set functions with where argument, + getIterator() for IteratorAggregate [@hiqsol]
    - [3d654c7] 2015-05-03 + more tests [@hiqsol]
    - [4f73089] 2015-05-03 + enable coverage [@hiqsol]
    - [0708f9b] 2015-05-03 * createItem to work with non arrays [@hiqsol]
    - [07accc9] 2015-05-02 default itemClass to `get_called_class` [@hiqsol]
    - [896667e] 2015-05-02 * addItem to check with hasItem and set with setItem [@hiqsol]
    - [9ae7daa] 2015-04-30 minor fix [@hiqsol]
    - [4159ace] 2015-04-30 REDONE a bit [@hiqsol]
    - [71aa2fa] 2015-04-29 minor [skip ci] [@hiqsol]
    - [fb6ef6a] 2015-04-29 try3 [@hiqsol]
    - [80d9c94] 2015-04-29 still strying [@hiqsol]
    - [e0bc391] 2015-04-29 + CBIN [@hiqsol]
    - [943f83d] 2015-04-29 trying [@hiqsol]
    - [15af62c] 2015-04-29 fixed Makefile spaces -> tab [@hiqsol]
    - [33ed9ff] 2015-04-29 trying [@hiqsol]
    - [d2e14ad] 2015-04-29 + setpath [@hiqsol]
    - [46d1147] 2015-04-29 trying global php-cs-fixer and codeception [skip ci] [@hiqsol]
    - [e37d4f1] 2015-04-29 added .scrutinizer.yml [@hiqsol]
    - [6afa261] 2015-04-29 php-cs-fixed [@hiqsol]
    - [ca96353] 2015-04-29 + more tests [@hiqsol]
    - [6badfaf] 2015-04-28 BIG changes: + Model, splitted functional to Manager, added tests [@hiqsol]
    - [3cf92bc] 2015-04-26 allow hhvm build to fail [@hiqsol]
    - [286fbd3] 2015-04-26 * Makefile: enabled full checks: fix tests [@hiqsol]
    - [7b5e01e] 2015-04-26 php-cs-fixed [@hiqsol]
    - [d4e0478] 2015-04-26 php-cs-fixing [skip ci] [@hiqsol]
    - [ae2848a] 2015-04-26 * composer.json: + extra [@hiqsol]
    - [b1feb72] 2015-04-26 doc [skip ci] [@hiqsol]
    - [8c8ee19] 2015-04-25 php-cs-fixed [@hiqsol]
    - [bf7e588] 2015-04-25 no need setPhpdoc any more [@hiqsol]
    - [0c0df1e] 2015-04-25 disabled fix for the moment [@hiqsol]
    - [5fdba26] 2015-04-24 php-cs-fixed [@hiqsol]
    - [325e54c] 2015-04-24 still trying [@hiqsol]
    - [d79dc85] 2015-04-24 trying phpdoc [@hiqsol]
    - [b146cf2] 2015-04-24 php-cs-fixed and fixed addItems [@hiqsol]
    - [ae29feb] 2015-04-24 improved `.php_cs`: + skip UnitTests.php [@hiqsol]
    - [023ab9c] 2015-04-24 php-cs-fixed [@hiqsol]
    - [2d93480] 2015-04-24 php-cs-fixed [@hiqsol]
    - [d81b741] 2015-04-24 php-cs-fixed [@hiqsol]
    - [9e3ca7c] 2015-04-24 trying [@hiqsol]
    - [9835033] 2015-04-24 trying [@hiqsol]
    - [3085249] 2015-04-24 + contrib fixers [@hiqsol]
    - [aed16a3] 2015-04-24 improved `.php_cs` [@hiqsol]
    - [fbf3b47] 2015-04-24 Integrating php-cs-fixer [@hiqsol]
    - [2a817b6] 2015-04-24 + require codeception for travis [@hiqsol]
    - [a070885] 2015-04-24 + make clean [@hiqsol]
    - [e1c1ddc] 2015-04-24 trafis do it ! [@hiqsol]
    - [d9a8bd6] 2015-04-24 + testing, making travis [@hiqsol]
    - [346cad8] 2015-04-24 NOT FINISHED making tests [@hiqsol]
    - [627d23e] 2015-04-23 + tests/CollectionTest.php [@hiqsol]
    - [c7a62e3] 2015-04-23 try [@hiqsol]
    - [e725a84] 2015-04-22 NOT TESTED [@hiqsol]
    - [fa16f83] 2015-04-22 doc [@hiqsol]
    - [4ca7b69] 2015-04-22 inited [@hiqsol]

## [Development started] - 2015-04-22

[@tafid]: https://github.com/tafid
[andreyklochok@gmail.com]: https://github.com/tafid
[@BladeRoot]: https://github.com/BladeRoot
[bladeroot@gmail.com]: https://github.com/BladeRoot
[@hiqsol]: https://github.com/hiqsol
[sol@hiqdev.com]: https://github.com/hiqsol
[@SilverFire]: https://github.com/SilverFire
[d.naumenko.a@gmail.com]: https://github.com/SilverFire
[038644c]: https://github.com/hiqdev/yii2-collection/commit/038644c
[34a43e3]: https://github.com/hiqdev/yii2-collection/commit/34a43e3
[7a55e73]: https://github.com/hiqdev/yii2-collection/commit/7a55e73
[9af7d3a]: https://github.com/hiqdev/yii2-collection/commit/9af7d3a
[ccfceb7]: https://github.com/hiqdev/yii2-collection/commit/ccfceb7
[d88c236]: https://github.com/hiqdev/yii2-collection/commit/d88c236
[111555d]: https://github.com/hiqdev/yii2-collection/commit/111555d
[cc46c70]: https://github.com/hiqdev/yii2-collection/commit/cc46c70
[4ea2125]: https://github.com/hiqdev/yii2-collection/commit/4ea2125
[d834c00]: https://github.com/hiqdev/yii2-collection/commit/d834c00
[906c4c5]: https://github.com/hiqdev/yii2-collection/commit/906c4c5
[24c1433]: https://github.com/hiqdev/yii2-collection/commit/24c1433
[44a6c30]: https://github.com/hiqdev/yii2-collection/commit/44a6c30
[975c37d]: https://github.com/hiqdev/yii2-collection/commit/975c37d
[7ea0de7]: https://github.com/hiqdev/yii2-collection/commit/7ea0de7
[8c44704]: https://github.com/hiqdev/yii2-collection/commit/8c44704
[1d5aba0]: https://github.com/hiqdev/yii2-collection/commit/1d5aba0
[1e39467]: https://github.com/hiqdev/yii2-collection/commit/1e39467
[a3e1ef7]: https://github.com/hiqdev/yii2-collection/commit/a3e1ef7
[0644c1d]: https://github.com/hiqdev/yii2-collection/commit/0644c1d
[dd1bfd9]: https://github.com/hiqdev/yii2-collection/commit/dd1bfd9
[01c3a1d]: https://github.com/hiqdev/yii2-collection/commit/01c3a1d
[2b1d237]: https://github.com/hiqdev/yii2-collection/commit/2b1d237
[05be8f5]: https://github.com/hiqdev/yii2-collection/commit/05be8f5
[bfba8ba]: https://github.com/hiqdev/yii2-collection/commit/bfba8ba
[2c95c95]: https://github.com/hiqdev/yii2-collection/commit/2c95c95
[91a363c]: https://github.com/hiqdev/yii2-collection/commit/91a363c
[52e19b7]: https://github.com/hiqdev/yii2-collection/commit/52e19b7
[61d39bc]: https://github.com/hiqdev/yii2-collection/commit/61d39bc
[be45b95]: https://github.com/hiqdev/yii2-collection/commit/be45b95
[cb1d5aa]: https://github.com/hiqdev/yii2-collection/commit/cb1d5aa
[b58d930]: https://github.com/hiqdev/yii2-collection/commit/b58d930
[42e1184]: https://github.com/hiqdev/yii2-collection/commit/42e1184
[a627c4a]: https://github.com/hiqdev/yii2-collection/commit/a627c4a
[7ca869e]: https://github.com/hiqdev/yii2-collection/commit/7ca869e
[c37d34d]: https://github.com/hiqdev/yii2-collection/commit/c37d34d
[0cd6bad]: https://github.com/hiqdev/yii2-collection/commit/0cd6bad
[c6dea94]: https://github.com/hiqdev/yii2-collection/commit/c6dea94
[2096ac2]: https://github.com/hiqdev/yii2-collection/commit/2096ac2
[5e920f1]: https://github.com/hiqdev/yii2-collection/commit/5e920f1
[ba603ca]: https://github.com/hiqdev/yii2-collection/commit/ba603ca
[636e475]: https://github.com/hiqdev/yii2-collection/commit/636e475
[f497af8]: https://github.com/hiqdev/yii2-collection/commit/f497af8
[1073da2]: https://github.com/hiqdev/yii2-collection/commit/1073da2
[d95804f]: https://github.com/hiqdev/yii2-collection/commit/d95804f
[c6ce463]: https://github.com/hiqdev/yii2-collection/commit/c6ce463
[e735de5]: https://github.com/hiqdev/yii2-collection/commit/e735de5
[3d654c7]: https://github.com/hiqdev/yii2-collection/commit/3d654c7
[4f73089]: https://github.com/hiqdev/yii2-collection/commit/4f73089
[0708f9b]: https://github.com/hiqdev/yii2-collection/commit/0708f9b
[07accc9]: https://github.com/hiqdev/yii2-collection/commit/07accc9
[896667e]: https://github.com/hiqdev/yii2-collection/commit/896667e
[9ae7daa]: https://github.com/hiqdev/yii2-collection/commit/9ae7daa
[4159ace]: https://github.com/hiqdev/yii2-collection/commit/4159ace
[71aa2fa]: https://github.com/hiqdev/yii2-collection/commit/71aa2fa
[fb6ef6a]: https://github.com/hiqdev/yii2-collection/commit/fb6ef6a
[80d9c94]: https://github.com/hiqdev/yii2-collection/commit/80d9c94
[e0bc391]: https://github.com/hiqdev/yii2-collection/commit/e0bc391
[943f83d]: https://github.com/hiqdev/yii2-collection/commit/943f83d
[15af62c]: https://github.com/hiqdev/yii2-collection/commit/15af62c
[33ed9ff]: https://github.com/hiqdev/yii2-collection/commit/33ed9ff
[d2e14ad]: https://github.com/hiqdev/yii2-collection/commit/d2e14ad
[46d1147]: https://github.com/hiqdev/yii2-collection/commit/46d1147
[e37d4f1]: https://github.com/hiqdev/yii2-collection/commit/e37d4f1
[6afa261]: https://github.com/hiqdev/yii2-collection/commit/6afa261
[ca96353]: https://github.com/hiqdev/yii2-collection/commit/ca96353
[6badfaf]: https://github.com/hiqdev/yii2-collection/commit/6badfaf
[3cf92bc]: https://github.com/hiqdev/yii2-collection/commit/3cf92bc
[286fbd3]: https://github.com/hiqdev/yii2-collection/commit/286fbd3
[7b5e01e]: https://github.com/hiqdev/yii2-collection/commit/7b5e01e
[d4e0478]: https://github.com/hiqdev/yii2-collection/commit/d4e0478
[ae2848a]: https://github.com/hiqdev/yii2-collection/commit/ae2848a
[b1feb72]: https://github.com/hiqdev/yii2-collection/commit/b1feb72
[8c8ee19]: https://github.com/hiqdev/yii2-collection/commit/8c8ee19
[bf7e588]: https://github.com/hiqdev/yii2-collection/commit/bf7e588
[0c0df1e]: https://github.com/hiqdev/yii2-collection/commit/0c0df1e
[5fdba26]: https://github.com/hiqdev/yii2-collection/commit/5fdba26
[325e54c]: https://github.com/hiqdev/yii2-collection/commit/325e54c
[d79dc85]: https://github.com/hiqdev/yii2-collection/commit/d79dc85
[b146cf2]: https://github.com/hiqdev/yii2-collection/commit/b146cf2
[ae29feb]: https://github.com/hiqdev/yii2-collection/commit/ae29feb
[023ab9c]: https://github.com/hiqdev/yii2-collection/commit/023ab9c
[2d93480]: https://github.com/hiqdev/yii2-collection/commit/2d93480
[d81b741]: https://github.com/hiqdev/yii2-collection/commit/d81b741
[9e3ca7c]: https://github.com/hiqdev/yii2-collection/commit/9e3ca7c
[9835033]: https://github.com/hiqdev/yii2-collection/commit/9835033
[3085249]: https://github.com/hiqdev/yii2-collection/commit/3085249
[aed16a3]: https://github.com/hiqdev/yii2-collection/commit/aed16a3
[fbf3b47]: https://github.com/hiqdev/yii2-collection/commit/fbf3b47
[2a817b6]: https://github.com/hiqdev/yii2-collection/commit/2a817b6
[a070885]: https://github.com/hiqdev/yii2-collection/commit/a070885
[e1c1ddc]: https://github.com/hiqdev/yii2-collection/commit/e1c1ddc
[d9a8bd6]: https://github.com/hiqdev/yii2-collection/commit/d9a8bd6
[346cad8]: https://github.com/hiqdev/yii2-collection/commit/346cad8
[627d23e]: https://github.com/hiqdev/yii2-collection/commit/627d23e
[c7a62e3]: https://github.com/hiqdev/yii2-collection/commit/c7a62e3
[e725a84]: https://github.com/hiqdev/yii2-collection/commit/e725a84
[fa16f83]: https://github.com/hiqdev/yii2-collection/commit/fa16f83
[4ca7b69]: https://github.com/hiqdev/yii2-collection/commit/4ca7b69
[4f2dc3c]: https://github.com/hiqdev/yii2-collection/commit/4f2dc3c
[a29c3f2]: https://github.com/hiqdev/yii2-collection/commit/a29c3f2
[f60b13d]: https://github.com/hiqdev/yii2-collection/commit/f60b13d
[065109e]: https://github.com/hiqdev/yii2-collection/commit/065109e
[04ecdb5]: https://github.com/hiqdev/yii2-collection/commit/04ecdb5
[cae22fe]: https://github.com/hiqdev/yii2-collection/commit/cae22fe
[2c436b9]: https://github.com/hiqdev/yii2-collection/commit/2c436b9
[Under development]: https://github.com/hiqdev/yii2-collection/compare/0.1.0...HEAD
[0.0.4]: https://github.com/hiqdev/yii2-collection/compare/0.0.3...0.0.4
[0.0.3]: https://github.com/hiqdev/yii2-collection/compare/0.0.2...0.0.3
[0.0.2]: https://github.com/hiqdev/yii2-collection/compare/0.0.1...0.0.2
[0.0.1]: https://github.com/hiqdev/yii2-collection/releases/tag/0.0.1
[cfffdf8]: https://github.com/hiqdev/yii2-collection/commit/cfffdf8
[0.1.0]: https://github.com/hiqdev/yii2-collection/compare/0.0.4...0.1.0
[b29677b]: https://github.com/hiqdev/yii2-collection/commit/b29677b
[082c552]: https://github.com/hiqdev/yii2-collection/commit/082c552
[adcd92a]: https://github.com/hiqdev/yii2-collection/commit/adcd92a
[8c1af43]: https://github.com/hiqdev/yii2-collection/commit/8c1af43
[d4ab846]: https://github.com/hiqdev/yii2-collection/commit/d4ab846
[0.1.1]: https://github.com/hiqdev/yii2-collection/compare/0.1.0...0.1.1
