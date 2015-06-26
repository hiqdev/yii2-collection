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
 * Base Trait.
 */
trait BaseTrait
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

/// Item methods

    /**
     * Straight put an item.
     *
     * @param string $name  item name.
     * @param array  $value item value.
     */
    public function putItem($name, $value = null)
    {
        if (is_null($name) || is_int($name)) {
            $this->_items[] = $value;
        } else {
            $this->_items[$name] = $value;
        }
    }

    /**
     * Get raw item.
     *
     * @param string $name item name.
     *
     * @return mixed item value.
     */
    public function rawItem($name, $default = null)
    {
        return isset($this->_items[$name]) ? $this->_items[$name] : $default;
    }

    /**
     * Sets an item. Silently resets if already exists and mov.
     *
     * Where can be:
     * - '' - anywhere, default and fastest method
     * - 'first' - puts it exactly first
     * - 'last' - puts it exactly last
     * - array of before and/or after conditions like: ['before' => 'd','after' => ['a','b']]
     *
     * @param string       $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, see description.
     */
    public function setItem($name, $value = null, $where = '')
    {
        /// if ($where === 'last' || $this->hasItem($name)) {
        if ($where === '') {
            $this->putItem($name, $value);
        } else {
            /// rough method: unset and then set, think of better
            $this->unsetItem($name);
            if ($where === 'last') {
                $this->putItem($name, $value);
            } elseif ($where === 'first') {
                $this->_items = array_merge([$name => $value], $this->_items);
            } else {
                $this->_items = $this->insertInside([$name => $value], $where);
            }
        }
    }

    /**
     * Adds an item. Doesn't touch if already exists.
     *
     * @param string       $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, @see setItem
     *
     * @return $this for chaining
     */
    public function addItem($name, $value = null, $where = '')
    {
        if (!$this->hasItem($name)) {
            $this->setItem($name, $value, $where);
        }

        return $this;
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
     *
     * @param $name
     */
    public function unsetItem($name)
    {
        unset($this->_items[$name]);
    }

/// Items methods

    /**
     * Straight put items.
     *
     * @param array $items list of items
     *
     * @see setItem
     */
    public function putItems(array $items)
    {
        foreach ($items as $k => $v) {
            $this->putItem($k, $v);
        }
    }

    /**
     * Set them all!
     *
     * @param array $items list of items
     * @param mixed $where
     *
     * @see setItem()
     */
    public function setItems($items, $where = '')
    {
        if (!$items) {
            return;
        }
        if ($where === '') {
            $this->putItems($items);
        } else {
            foreach ($items as $k => $v) {
                $this->unsetItem($k);
            }
            if ($where === 'last') {
                $this->putItems($items);
            } elseif ($where === 'first') {
                $this->_items = array_merge($items, $this->_items);
            } else {
                $this->_items = $this->insertInside($items, $where);
            }
        }
    }

    /**
     * Adds array of items to specified place.
     * Does not touch those items that already exists.
     *
     * @param array        $items array of items.
     * @param string|array $where where to add. See [[setItem()]]
     *
     * @return $this for chaining
     *
     * @see setItem()
     */
    public function addItems(array $items, $where = '')
    {
        foreach ($items as $k => $v) {
            if (!is_int($k) && $this->hasItem($k)) {
                $this->unsetItem($k);
            }
        }
        if ($items) {
            $this->setItems($items, $where);
        }

        return $this;
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
     * Sets an item. Silently resets if already exists.
     *
     * @param int|string   $name
     * @param mixed        $value the element value
     * @param string|array $where where to put, see [[setItem()]]
     *
     * @see setItem()
     */
    public function set($name, $value, $where = '')
    {
        if ($name && $this->canSetProperty($name)) {
            parent::__set($name, $value);
        } else {
            $this->setItem($name, $value, $where);
        }
    }

    /**
     * Adds an item. Does not touch if already exists.
     *
     * @param int|string   $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, see [[setItem()]]
     *
     * @return $this for chaining
     *
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
     *
     * @param string $name item name.
     *
     * @return bool whether item exist.
     */
    public function has($name)
    {
        return ($name && $this->hasProperty($name)) || $this->hasItem($name);
    }

    /**
     * Delete an item.
     *
     * @param $name
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

    /**
     * Sets multiple items.
     *
     * @param array $values
     */
    public function mset(array $values)
    {
        foreach ($values as $k => $v) {
            $this->set($k, $v);
        }
    }

    /**
     * Internal function to prepare new list of items with given items inserted inside.
     *
     * @param array        $items array of items.
     * @param string|array $where where to insert, see [[add()]]
     *
     * @return array new items list
     *
     * @see add()
     */
    protected function insertInside($items, $where)
    {
        $before = $this->prepareWhere($where['before']);
        $after  = $this->prepareWhere($where['after']);
        $new    = [];
        $found  = false;
        /// TODO think of realizing it better
        foreach ($this->_items as $k => $v) {
            if (!$found && $k === $before) {
                foreach ($items as $i => $c) {
                    $new[$i] = $c;
                }
                $found = true;
            }
            $new[$k] = $v;
            if (!$found && $k === $after) {
                foreach ($items as $i => $c) {
                    $new[$i] = $c;
                }
                $found = true;
            }
        }
        if (!$found) {
            foreach ($items as $i => $c) {
                $new[$i] = $c;
            }
        }

        return $new;
    }

    /**
     * Internal function to prepare where list for insertInside.
     *
     * @param array|string $list array to convert
     *
     * @return array
     */
    protected function prepareWhere($list)
    {
        if (!is_array($list)) {
            $list = [$list];
        }
        foreach ($list as $v) {
            if ($this->has($v)) {
                return $v;
            }
        }

        return;
    }

/// smart methods

    /**
     * Sets one after another.
     *
     * @param array  $items
     * @param string $after
     */
    public function smartSet(array $items, $after = '')
    {
        foreach ($items as $k => $v) {
            $this->setItem($k, $v, $after);
            $after = ['after' => $k];
        }
    }

    /**
     * Adds one after another.
     *
     * @param array  $items
     * @param string $after
     */
    public function smartAdd(array $items, $after = '')
    {
        foreach ($items as $k => $v) {
            $this->add($k, $v, $after);
            $after = ['after' => $k];
        }
    }

/// magic methods

    /**
     * This method is overridden to support accessing items like properties.
     *
     * @param string $name item or property name
     *
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
     *
     * @param string $name  item or property name
     * @param string $value value to be set
     *
     * @return mixed item of found or the named property value
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
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
        return ($name && parent::__isset($name)) || $this->issetItem($name);
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
        if ($name && $this->canSetProperty($name)) {
            parent::__unset($name);
        } else {
            $this->unsetItem($name);
        }
    }

/// ArrayAccess and IteratorAggregate methods

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
        return $this->getItem($offset);
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
        $this->setItem($offset, $value);
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
        return $this->hasItem($offset);
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
        $this->unsetItem($offset);
    }

    /**
     * Method for IteratorAggregate interface.
     * Enables foreach'ing the object.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->_items);
    }
}
