<?php
/**
 * HiQDev Collection for Yii 2
 *
 * @package   yii2-collection
 * @link      http://hiqdev.com/yii2-collection
 * @license   http://hiqdev.com/yii2-collection/license
 * @copyright Copyright (c) 2015 HiQDev
 */

/// ensure we get report on all possible php errors
error_reporting(-1);

define('YII_ENABLE_ERROR_HANDLER', false);
define('YII_DEBUG', true);
$_SERVER['SCRIPT_NAME']     = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
Yii::setAlias('@hiqdev/collection', dirname(__DIR__));
