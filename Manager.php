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
use yii\base\InvalidParamException;

/**
 * Manager Component.
 * Instantiates all it's items when getting.
 */
class Manager extends Component
{
    /**
     * @var string default class to create item objects
     */
    protected $_itemClass;

    public function setItemClass($class)
    {
        $this->_itemClass = $class;
    }

    public function getItemClass($name = null)
    {
        return $this->_itemClass ?: get_called_class();
    }

    public function getItemConfig($name = null, array $config = [])
    {
        return array_merge([
            'class' => $this->getItemClass($name, $config) ?: get_called_class(),
        ], (array) $config);
    }

    /**
     * Creates item instance from array configuration.
     *
     * @param string $name   item name.
     * @param array  $config item instance configuration.
     *
     * @return item instance.
     */
    protected function createItem($name, array $config = [])
    {
        return Yii::createObject($this->getItemConfig($name, $config));
    }

    /**
     * Returns item by name. Instantiates it before.
     *
     * @param string $name item name.
     *
     * @throws InvalidParamException on non existing item request.
     *
     * @return object item instance.
     */
    public function getItem($name)
    {
        /* XXX if (!$this->hasItem($name)) {
            throw new InvalidParamException("Unknown item '{$name}'.");
        }; */
        $item = &$this->_items[$name];
        if (is_array($item) || is_null($item)) {
            $item = $this->createItem($name, $item ?: []);
        };

        return $item;
    }

    public function getRaw($name)
    {
        return $this->_items[$name];
    }

    public function hasObject($name)
    {
        return is_object($this->_items[$name]);
    }

    /**
     * Get them all as array of items!
     * Instantiates all the items.
     *
     * @return array list of items
     *
     * @see get
     */
    public function getItems()
    {
        foreach ($this->_items as $name => $item) {
            $this->getItem($name);
        }

        return $this->_items;
    }
}
