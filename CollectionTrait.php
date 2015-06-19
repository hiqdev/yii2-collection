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

use Yii;

/**
 * Collection Trait.
 * Array inside of object.
 */
trait CollectionTrait
{
    use BaseTrait;

    /**
     * Returns item by name.
     *
     * @param string $name item name.
     *
     * @return mixed item value.
     */
    public function getItem($name)
    {
        return $this->_items[$name];
    }

    /**
     * Get them all as array of items!
     *
     * @return array list of items
     */
    public function getItems()
    {
        return $this->_items;
    }
}
