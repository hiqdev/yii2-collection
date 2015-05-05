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
     * Sets property or item.
     *
     * @param string $name  item or property name
     * @param string $value value to be set
     *
     * @return mixed item of found or the named property value
     */
    public function __set($name, $value)
    {
        if ($name && $this->canSetProperty($name)) {
            parent::__set($name, $value);
        } else {
            $this->setItem($name, $value);
        }
    }

    /**
     * Unsets property or item.
     *
     * @param string $name the property name or the event name
     */
    public function __unset($name)
    {
        if ($name && $this->canSetProperty($name)) {
            parent::__unset($name);
        } else {
            $this->unsetItem($name);
        }
    }

    /**
     * This method is overridden to support accessing items like properties.
     *
     * @param string $name component or property name
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
     * Checks if property or item is set (not null).
     *
     * @param string $name the property name or the event name
     *
     * @return bool whether the property value is set (not null)
     */
    public function __isset($name)
    {
        return ($name && parent::__isset($name)) || $this->issetItem($name);
    }

}
