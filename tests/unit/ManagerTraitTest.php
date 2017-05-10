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
class ManagerTraitTest extends \PHPUnit\Framework\TestCase
{
    use CollectionTestTrait;

    /**
     * @var NewManagerTrait
     */
    protected $sample;

    protected function setUp()
    {
        //parent::setUp();
        $this->sample = Yii::createObject([
            'class' => NewManagerTrait::class,
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
}

class NewManagerTrait extends \yii\base\Component implements \ArrayAccess, \IteratorAggregate, \yii\base\Arrayable
{
    public $url;
    public $label;
    public $options;

    use \hiqdev\yii2\collection\ManagerTrait;
}
