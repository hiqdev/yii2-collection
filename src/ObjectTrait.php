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

use hiqdev\php\collection\BaseTrait;
use yii\base\ArrayableTrait;

/**
 * ObjectTrait.
 * Intended to be used for yii\base\Object descendants.
 * Uses canSet/GetPropperty and magic functions to provide compatible getter/setter mechanisms.
 */
trait ObjectTrait
{
    use ArrayableTrait;
    use BaseTrait {
        BaseTrait::fields insteadof ArrayableTrait;
    }

    /**
     * Returns property of item by name.
     * @param mixed $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->__get($name);
    }

    /**
     * Sets an item. Silently resets if already exists.
     * @param int|string   $name
     * @param mixed        $value the element value
     * @param string|array $where where to put, see [[setItem()]]
     * @see setItem()
     */
    public function set($name, $value, $where = '')
    {
        if (($name && $this->canSetProperty($name)) || strpos($name, 'on ') === 0 || strpos($name, 'as ') === 0) {
            parent::__set($name, $value);
        } else {
            $this->setItem($name, $value, $where);
        }
    }

    /**
     * Adds an item. Does not touch if already exists.
     * @param int|string   $name  item name
     * @param array        $value item value
     * @param string|array $where where to put, see [[setItem()]]
     * @return $this for chaining
     * @see setItem()
     */
    public function add($name, $value = null, $where = '')
    {
        if (!$this->has($name)) {
            $this->set($name, $value, $where);
        }

        return $this;
    }

    /**
     * Check collection has the item.
     * @param string $name item name
     * @return bool whether item exist
     */
    public function has($name)
    {
        return ($name && $this->hasProperty($name)) || $this->hasItem($name);
    }

    /**
     * Delete an item.
     * @param $name
     */
    public function delete($name)
    {
        $this->__unset($name);
    }

    /**
     * This method is overridden to support accessing items like properties.
     * @param string $name item or property name
     * @return mixed item of found or the named property value
     */
    public function __get($name)
    {
        if ($name && $this->canGetProperty($name)) {
            return parent::__get($name);
        } else {
            return $this->getItem($name);
        }
    }

    /**
     * This method is overridden to support accessing items like properties.
     * @param string $name  item or property name
     * @param string $value value to be set
     * @return mixed item of found or the named property value
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     * @param string $name the property name or the event name
     * @return bool whether the property value is null
     */
    public function __isset($name)
    {
        return ($name && parent::__isset($name)) || $this->issetItem($name);
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     * @param string $name the property name or the event name
     * @return bool whether the property value is null
     */
    public function __unset($name)
    {
        if ($name && $this->canSetProperty($name)) {
            parent::__unset($name);
        } else {
            $this->unsetItem($name);
        }
    }
}
