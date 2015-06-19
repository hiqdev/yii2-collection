<?php

/*
 * Collection Library for Yii2
 *
 * @link      https://github.com/hiqdev/yii2-collection
 * @package   yii2-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (https://hiqdev.com/)
 */

namespace hiqdev\collection;

/**
 * ItemWithNameInterface is the interface that should be implemented by item classes who support storing of
 * the own name in the collection, to which it belongs.
 *
 * Should have the [[name]] property, or a pair of [[getName()]] and [[setName()]] methods.

 * The interface does not declare any property or method. Classes implementing this interface should
 * declare the property or the setters itself.
 *
 * Used by [[ManagerTrait]]
 *
 * @see ManagerTrait
 */
interface ItemWithNameInterface
{
}
