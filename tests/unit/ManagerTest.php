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
 * Manager test suite.
 */
class ManagerTest extends \yii\codeception\TestCase
{
    use CollectionTestTrait;

    /**
     * @var NewManager
     */
    protected $sample;

    protected function setUp()
    {
        //parent::setUp();
        $this->sample = Yii::createObject([
            'class' => NewManager::className(),
            'items' => $this->items,
        ]);
    }

    protected function tearDown()
    {
        //parent::tearDown();
        $this->sample = null;
    }

    public function testDeepHas()
    {
        $this->assertTrue($this->sample->sidebar->has('header'));
    }

    public function testSetAndDelete()
    {
        $this->sample->set('new', [
            'label'   => 'new navigation',
            'options' => ['class' => 'header'],
        ]);
        $this->assertTrue($this->sample->has('new'));
        $this->sample->delete('new');
        $this->assertFalse($this->sample->has('new'));
    }

    public function testNameAndCollection()
    {
        $this->assertEquals($this->sample->name, null);
        $this->assertEquals($this->sample->collection, null);

        $sidebar = $this->sample->sidebar;
        $this->assertEquals($sidebar->name, 'sidebar');
        $this->assertEquals($sidebar->collection, $this->sample);
    }
}

/**
 * Class NewManager.
 *
 * @property mixed collection
 */
class NewManager extends \hiqdev\collection\Manager implements \hiqdev\collection\ItemWithCollectionInterface, \hiqdev\collection\ItemWithNameInterface
{
    public $url;
    public $label;
    public $options;

    public $name;
    protected $_collection;

    public function getCollection()
    {
        return $this->_collection;
    }

    public function setCollection($collection)
    {
        $this->_collection = $collection;
    }
}
