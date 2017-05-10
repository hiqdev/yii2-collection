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
 * ItemWithCollectionInterface is the interface that should be implemented by item classes who support storing of
 * the collection, to which it belongs.
 *
 * Should have the [[collection]] property, or a pair of [[getCollection()]] and [[setCollection()]] methods.
 *
 * The interface does not declare any property or method. Classes implementing this interface should
 * declare the property or the setters itself.
 *
 * Used by [[ManagerTrait]]
 *
 * @see ManagerTrait
 */
interface ItemWithCollectionInterface
{
}
