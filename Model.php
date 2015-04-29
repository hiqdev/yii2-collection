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

/**
 * Collection Object.
 * Simply holds items.
 */
class Model extends \yii\base\Model
{
    use CollectionTrait;

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
            return $this->get($name);
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
            $this->set($name, $value);
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
        return $this->has($name) || parent::__isset($name);
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
            $this->delete($name);
        }
    }
}
