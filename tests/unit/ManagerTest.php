<?php

/*
 * HiQDev Collection for Yii 2.
 *
 * @link      http://hiqdev.com/yii2-collection
 * @package   yii2-collection
 * @license   BSD 3-clause
 * @copyright Copyright (c) 2015 HiQDev
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
}

class NewManager extends \hiqdev\collection\Manager
{
    public $url;
    public $label;
    public $options;
}
