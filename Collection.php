<?php
/**
 * @link    http://hiqdev.com/yii2-collection
 * @license http://hiqdev.com/yii2-collection/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\collection;

/**
 * Basic Collection Component
 */
class Collection extends \yii\base\Component
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
     * @param array $items list of items
     * @return $this for chaining
     */
    public function setItems (array $items)
    {
        foreach ($items as $k => $v) $this->_items[$k] = $v;
        return $this;
    }

    /**
     * Get them all!
     * @return array list of items
     */
    public function getItems ()
    {
        $items = [];
        foreach ($this->_items as $name => $item) {
            $items[$name] = $this->get($name);
        }

        return $items;
    }

    /**
     * Sets an item.
     * @return $this for chaining
     */
    public function set ($name, $config = [])
    {
        $this->_items[$name] = $config;
        return $this;
    }

    /**
     * @param string $name item name.
     * @return object item instance.
     * @throws InvalidParamException on non existing item request.
     */
    public function get ($name)
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
     * Checks if item exists in the hub.
     * @param string $name item name.
     * @return boolean whether item exist.
     */
    public function has ($name)
    {
        return array_key_exists($name, $this->_items);
    }

    /**
     * Creates item instance from its array configuration.
     * @param string $name item name.
     * @param array $config item instance configuration.
     * @return item instance.
     */
    protected function create ($name, array $config = [])
    {
        return Yii::createObject(array_merge([
            'name'          => $name,
            'class'         => $this->itemClass,
            'collection'    => $this,
        ], $config));
    }

    /**
     * Getter magic method.
     * This method is overridden to support accessing components like reading properties.
     * @param string $name component or property name
     * @return mixed item of found or the named property value
     */
    public function __get ($name)
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
     * @param string $name the property name or the event name
     * @return boolean whether the property value is null
     */
    public function __isset ($name)
    {
        return isset($this->_items[$name]) || parent::__isset($name);
    }

    /**
     * Delete an item.
     * @return $this for chaining
     */
    public function delete ($name)
    {
        unset($this->_items[$name]);
        return $this;
    }

    /**
     * Adds an item. Silently resets if already exists.
     * @param string|array $where can be 'first', 'last' or array like ['before' => 'd','after'=>['a','b']]
     * @return $this for chaining
     */
    public function add ($name, $config = [], $where = 'last')
    {
        if ($where === 'last' || $this->has($name)) return $this->set($name,$config);
        if ($where === 'first') {
            $this->_items = array_merge([$name => $config],$this->_items);
        } else {
            $this->_items = $this->maddInside([$name => $config],$where);
        };
        return $this;
    }

    public function madd (array $items, $where = 'last')
    {
        if ($where === 'last') return $this->setItems($items);
        foreach ($items as $k=>$v) $this->delete($k);
        if ($where === 'first') {
            $this->_items = array_merge([$name => $config],$this->_items);
        } else {
            $this->_items = $this->maddInside($items,$where);
        };
        return $this;
    }

    protected static function maddInside ($items, $where)
    {
        $before = static::prepareWhereList($where['before']);
        $after  = static::prepareWhereList($where['after']);
        $new    = [];
        $found  = false;
        foreach ($this->_items as $k => $v) {
            if (!$found && $before[$k]) {
                foreach ($items as $i=>$c) $new[$i] = $c;
                $found = true;
            };
            $new[$k] = $v;
            if (!$found && $after[$k]) {
                foreach ($items as $i=>$c) $new[$i] = $c;
                $found = true;
            };
        };
        return $new;
    }

    protected static function prepareWhereList ($list)
    {
        if (is_array($list)) {
            foreach ($list as $v) $res[$v] = 1;
        } else {
            $res[$list] = 1;
        };
        return $res;
    }
}
