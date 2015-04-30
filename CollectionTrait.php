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

use Yii;

/**
 * Collection Trait.
 */
trait CollectionTrait
{
    use \yii\base\ArrayableTrait;

    /**
     * @var array default items
     */
    protected static $_defaults = [];

    /**
     * @var array items
     */
    protected $_items = [];

    /**
     * Initializes with defaults if appliable.
     */
    public function init()
    {
        parent::init();
        if (!$this->_items && static::$_defaults) {
            $this->_items = static::$_defaults;
        }
    }

/// Item methods

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
     * Set an item.
     *
     * @return $this for chaining
     */
    public function setItem($name, $value = null)
    {
        $this->_items[$name] = $value;
    }

    /**
     * Adds an item. Silently resets if already exists.
     *
     * @param string       $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, can be: 'first', 'last' or array like ['before' => 'd','after' => ['a','b']]
     */
    public function addItem($name, $value = null, $where = 'last')
    {
        if ($where === 'last' || $this->has($name)) {
            return $this->set($name, $value);
        }
        if ($where === 'first') {
            $this->_items = array_merge([$name => $value], $this->_items);
        } else {
            $this->_items = $this->insertInside([$name => $value], $where);
        }
    }

    /**
     * Check collection has the item.
     *
     * @param string $name item name.
     *
     * @return bool whether item exist.
     */
    public function hasItem($name)
    {
        return array_key_exists($name, $this->_items);
    }

    /**
     * Check is item set.
     *
     * @param string $name item name.
     *
     * @return bool whether item is set.
     */
    public function issetItem($name)
    {
        return isset($this->_items[$name]);
    }

    /**
     * Delete an item.
     */
    public function unsetItem($name)
    {
        unset($this->_items[$name]);
    }

/// Items methods

    /**
     * Get them alldt! as array of items!
     *
     * @return array list of items
     */
    public function getItems()
    {
        return $this->_items;
    }

    /**
     * Set them all!
     *
     * @param array $items list of items
     *
     * @return $this for chaining
     */
    public function setItems(array $items)
    {
        foreach ($items as $k => $v) {
            $this->_items[$k] = $v;
        }

        return $this;
    }

    /**
     * Add array of items to specified place.
     * Silently resets if already exists.
     *
     * @param array        $items array of items.
     * @param string|array $where where to add @see add()
     */
    public function addItems(array $items, $where = 'last')
    {
        if ($where === 'last') {
            return $this->setItems($items);
        }
        foreach ($items as $k => $v) {
            $this->delete($k);
        }
        if ($where === 'first') {
            $this->_items = array_merge($items, $this->_items);
        } else {
            $this->_items = $this->insertInside($items, $where);
        }
    }

/// normal methods

    /**
     * Returns property of item by name.
     *
     * @param mixed $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->__get($name);
    }

    /**
     * Sets the element at the specified offset.
     *
     * @param int|string $name
     * @param mixed      $value  the element value
     */
    public function set($name, $value)
    {
        $this->__set($name, $value);
    }

    /**
     * Adds an item. Silently resets if already exists.
     *
     * @param string       $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, can be: 'first', 'last' or array like ['before' => 'd','after' => ['a','b']]
     *
     * @return $this for chaining
     */
    public function add($name, $value = null, $where = 'last')
    {
        if ($this->has($name)) {
            $this->set($name, $value);
        } else {
            $this->addItem($name, $value, $where);
        }
    }
    /**
     * Check collection has the item.
     *
     * @param string $name item name.
     *
     * @return bool whether item exist.
     */
    public function has($name)
    {
        return $this->hasProperty($name) || $this->hasItem($name);
    }

    public function hasProperty($name, $checkVars = true, $checkBehaviors = true)
    {
        return $name ? parent::hasProperty($name, $checkVars, $checkBehaviors) : false;
    }

    /**
     * Delete an item.
     */
    public function delete($name)
    {
        $this->__unset($name);
    }

    /**
     * Get keys.
     *
     * @return $this for chaining
     */
    public function keys()
    {
        return array_keys($this->_items);
    }

    /**
     * The default implementation of this method returns [[attributes()]] indexed by the same attribute names.
     *
     * @return array the list of field names or field definitions.
     *
     * @see toArray()
     */
    public function fields()
    {
        $fields = $this->keys();

        return array_combine($fields, $fields);
    }

    public function mset(array $values)
    {
        foreach ($values as $k => $v) {
            $this->__set($k, $v);
        }
    }

    /**
     * Internal function to prepare new list of items with given items inserted inside.
     *
     * @param array        $items array of items.
     * @param string|array $where where to insert @see add()
     *
     * @return array new items list
     */
    protected static function insertInside($items, $where)
    {
        $before = static::convertWhere2List($where['before']);
        $after  = static::convertWhere2List($where['after']);
        $new    = [];
        $found  = false;
        foreach ($this->_items as $k => $v) {
            if (!$found && $before[$k]) {
                foreach ($items as $i => $c) {
                    $new[$i] = $c;
                }
                $found = true;
            };
            $new[$k] = $v;
            if (!$found && $after[$k]) {
                foreach ($items as $i => $c) {
                    $new[$i] = $c;
                }
                $found = true;
            };
        };

        return $new;
    }

    /**
     * Internal function to prepare where list for insertInside.
     *
     * @param array $list array to convert
     *
     * @return array
     */
    protected static function convertWhere2List($list)
    {
        if (is_array($list)) {
            foreach ($list as $v) {
                $res[$v] = 1;
            }
        } else {
            $res[$list] = 1;
        }

        return $res;
    }

/// magic methods

    /**
     * This method is overridden to support accessing items like properties.
     *
     * @param string $name component or property name
     *
     * @return mixed item of found or the named property value
     */
    public function __get($name)
    {
        if ($this->hasProperty($name)) {
            return parent::__get($name);
        } else {
            return $this->getItem($name);
        }
    }

    /**
     * This method is overridden to support accessing items like properties.
     *
     * @param string $name  item or property name
     * @param string $value value to be set
     *
     * @return mixed item of found or the named property value
     */
    public function __set($name, $value)
    {
        if ($this->hasProperty($name)) {
            parent::__set($name, $value);
        } else {
            $this->setItem($name, $value);
        }
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     *
     * @param string $name the property name or the event name
     *
     * @return bool whether the property value is null
     */
    public function __isset($name)
    {
        return parent::__isset($name) || $this->issetItem($name);
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     *
     * @param string $name the property name or the event name
     *
     * @return bool whether the property value is null
     */
    public function __unset($name)
    {
        if ($this->hasProperty($name)) {
            parent::__unset($name);
        } else {
            $this->unsetItem($name);
        }
    }

/// ArrayAccess methods

    /**
     * Returns the element at the specified offset.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `$value = $collection[$offset];`.
     *
     * @param mixed $offset the offset to retrieve element.
     *
     * @return mixed the element at the offset, null if no element is found at the offset
     */
    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    /**
     * Sets the element at the specified offset.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `$collection[$offset] = $value;`.
     *
     * @param int   $offset the offset to set element
     * @param mixed $value  the element value
     */
    public function offsetSet($offset, $value)
    {
        $this->__set($offset, $value);
    }

    /**
     * Returns whether there is an element at the specified offset.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `isset($collection[$offset])`.
     *
     * @param mixed $offset the offset to check on
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * Sets the element value at the specified offset to null.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `unset($collection[$offset])`.
     *
     * @param mixed $offset the offset to unset element
     */
    public function offsetUnset($offset)
    {
        $this->__unset($offset);
    }
}
