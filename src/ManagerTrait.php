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

use Yii;

/**
 * Manager Trait.
 * Like basic collection but instantiates items when getting.
 */
trait ManagerTrait
{
    use ObjectTrait;

    /**
     * @var string default class to create item objects
     */
    protected $_itemClass;

    public function setItemClass($class)
    {
        $this->_itemClass = $class;
    }

    public function getItemClass()
    {
        return $this->_itemClass ?: get_called_class();
    }

    public function getItemConfig($name = null, array $config = [])
    {
        if (!isset($config['class'])) {
            $config['class'] = $this->getItemClass($name, $config) ?: get_called_class();
        }
        if (class_exists($config['class'])) {
            $class = new \ReflectionClass($config['class']);
            if ($class->implementsInterface('hiqdev\yii2\collection\ItemWithNameInterface')) {
                $config['name'] = $name;
            }
            if ($class->implementsInterface('hiqdev\yii2\collection\ItemWithCollectionInterface')) {
                $config['collection'] = $this;
            }
        }

        return $config;
    }

    /**
     * Creates item instance from array configuration.
     * @param string $name   item name
     * @param array  $config item instance configuration
     * @return object instance
     */
    protected function createItem($name, array $config = [])
    {
        return Yii::createObject($this->getItemConfig($name, $config));
    }

    /**
     * Returns item by name. Instantiates it before.
     * @param string $name item name
     * @param mixed $default default value
     * @return object item instance
     */
    public function getItem($name, $default = null)
    {
        if (empty($this->_items[$name])) {
            $this->_items[$name] = $default;
        }
        $item = &$this->_items[$name];
        if (is_array($item) || is_null($item)) {
            $item = $this->createItem($name, $item ?: []);
        }

        return $item;
    }

    public function hasObject($name)
    {
        return is_object($this->_items[$name]);
    }

    /**
     * Get them all as array of items!
     * Instantiates all the items.
     * @return array list of items
     * @see get
     */
    public function getItems()
    {
        foreach ($this->_items as $name => $item) {
            $this->getItem($name);
        }

        return $this->_items;
    }

    /**
     * Get raw items - uninstantiated.
     * @return array
     */
    public function rawItems()
    {
        return $this->_items;
    }
}
