<?php

/*
 * HiQDev Collection for Yii 2.
 *
 * @link      http://hiqdev.com/yii2-collection
 * @license   http://hiqdev.com/yii2-collection/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\collection;

use Yii;

/**
 * Collection Trait.
 */
trait CollectionTrait
{
    /**
     * @var string default class to create item objects
     */
    public $itemClass;

    /**
     * @var array list of items with their configuration in format: 'name' => [...]
     */
    protected $_items = [];

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
     * Get them all!
     *
     * @return array list of items
     */
    public function getItems()
    {
        $items = [];
        foreach ($this->_items as $name => $item) {
            $items[$name] = $this->get($name);
        }

        return $items;
    }

    /**
     * Set an item.
     *
     * @return $this for chaining
     */
    public function set($name, $config = [])
    {
        $this->_items[$name] = $config;

        return $this;
    }

    /**
     * @param string $name item name.
     *
     * @throws InvalidParamException on non existing item request.
     *
     * @return object item instance.
     */
    public function get($name)
    {
        if (!$this->has($name)) {
            throw new InvalidParamException("Unknown item '{$name}'.");
        };
        if (!is_object($this->_items[$name])) {
            $this->_items[$name] = $this->create($name, $this->_items[$name]);
        };

        return $this->_items[$name];
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
        return array_key_exists($name, $this->_items);
    }

    /**
     * Creates item instance from array configuration.
     *
     * @param string $name   item name.
     * @param array  $config item instance configuration.
     *
     * @return item instance.
     */
    protected function create($name, array $config = [])
    {
        return Yii::createObject(array_merge([
            'class' => $this->itemClass ?: static::className(),
            //'name'          => $name,
            //'collection'    => $this,
        ], $config));
    }

    /**
     * Getter magic method.
     * This method is overridden to support accessing components like reading properties.
     *
     * @param string $name component or property name
     *
     * @return mixed item of found or the named property value
     */
    public function __get($name)
    {
        if ($this->has($name)) {
            return $this->get($name);
        } else {
            return parent::__get($name);
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
        return isset($this->_items[$name]) || parent::__isset($name);
    }

    /**
     * Delete an item.
     *
     * @return $this for chaining
     */
    public function delete($name)
    {
        unset($this->_items[$name]);

        return $this;
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
     * Adds an item. Silently resets if already exists.
     *
     * @param string       $name   item name.
     * @param array        $config item instance configuration.
     * @param string|array $where  where to put, can be: 'first', 'last' or array like ['before' => 'd','after' => ['a','b']]
     *
     * @return $this for chaining
     */
    public function add($name, $config = [], $where = 'last')
    {
        if ($where === 'last' || $this->has($name)) {
            return $this->set($name, $config);
        }
        if ($where === 'first') {
            $this->_items = array_merge([$name => $config], $this->_items);
        } else {
            $this->_items = $this->insertInside([$name => $config], $where);
        }

        return $this;
    }

    /**
     * Add array of items to specified place.
     * Silently resets if already exists.
     *
     * @param array        $items item instance configuration.
     * @param string|array $where where to add @see add()
     *
     * @return $this for chaining
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

        return $this;
    }

    /**
     * Internal function to prepare new list of items with given items inserted inside.
     *
     * @param array        $items item instance configuration.
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
}
