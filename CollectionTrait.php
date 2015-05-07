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

use ArrayIterator;
use Yii;

/**
 * Collection Trait.
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
     * Get them alldt! as array of items!
     *
     * @return array list of items
     */
    public function getItems()
    {
        return $this->_items;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->_items);
    }
}
