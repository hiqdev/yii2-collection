<?php

/*
 * Collection Library for Yii2
 *
 * @link      https://github.com/hiqdev/yii2-collection
 * @package   yii2-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (https://hiqdev.com/)
 */

namespace hiqdev\collection\tests\unit;

use Yii;

/**
 * Object test suite.
 */
class ObjectTest extends \PHPUnit_Framework_TestCase
{
    use CollectionTestTrait;

    /**
     * @var NewObject
     */
    protected $sample;

    protected function setUp()
    {
        //parent::setUp();
        $this->sample = Yii::createObject([
            'class' => NewObject::className(),
            'items' => $this->items,
        ]);
    }

    protected function tearDown()
    {
        //parent::tearDown();
        $this->sample = null;
    }
}

class NewObject extends \hiqdev\yii2\collection\Object
{
}
