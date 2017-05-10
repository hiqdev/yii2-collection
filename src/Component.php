<?php
/**
 * Collection library for Yii2.
 *
 * @link      https://github.com/hiqdev/yii2-collection
 * @package   yii2-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\yii2\collection;

/**
 * Component with collection.
 */
class Component extends \yii\base\Component implements \ArrayAccess, \IteratorAggregate, \yii\base\Arrayable
{
    use ObjectTrait;
}
