<?php
/**
 * Collection library for Yii2.
 *
 * @link      https://github.com/hiqdev/yii2-collection
 * @package   yii2-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\yii2\collection\tests\unit;

use Yii;

/**
 * Manager test suite.
 */
class ManagerTest extends \PHPUnit\Framework\TestCase
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
            'class' => NewManager::class,
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
class NewManager extends \hiqdev\yii2\collection\Manager implements \hiqdev\yii2\collection\ItemWithCollectionInterface, \hiqdev\yii2\collection\ItemWithNameInterface
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
