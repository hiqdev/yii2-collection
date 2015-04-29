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
 * Model test suite.
 */
class ModelTest extends \yii\codeception\TestCase
{
    use CollectionTestTrait;

    /**
     * @var NewModel
     */
    protected $sample;

    protected function setUp()
    {
        //parent::setUp();
        $this->sample = Yii::createObject([
            'class' => NewModel::className(),
            'items' => $this->items,
        ]);
    }

    protected function tearDown()
    {
        //parent::tearDown();
        $this->sample = null;
    }

}

class NewModel extends \hiqdev\collection\Model
{
}
