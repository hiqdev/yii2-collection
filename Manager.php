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
 * Manager Component.
 * Instantiates all it's items when getting.
 */
class Manager extends \yii\base\Component implements \ArrayAccess, \IteratorAggregate, \yii\base\Arrayable
{
    use ManagerTrait;
}
