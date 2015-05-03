<?php

/*
 * HiQDev Collection for Yii 2.
 *
 * @link      http://hiqdev.com/yii2-collection
 * @package   yii2-collection
 * @license   BSD 3-clause
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\collection;

use ArrayAccess;
use IteratorAggregate;
use yii\base\Arrayable;

/**
 * Component with collection.
 */
class Component extends \yii\base\Component implements ArrayAccess, IteratorAggregate, Arrayable
{
    use CollectionTrait;
}
