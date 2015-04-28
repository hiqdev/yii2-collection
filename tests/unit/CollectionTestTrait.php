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
 * Collection Trait test suite.
 */
trait CollectionTestTrait
{
    public function testHas()
    {
        foreach ($this->items as $k => $v) {
            $this->assertTrue($this->sample->has($k));
        };
    }

    public function testHasNot()
    {
        $this->assertFalse($this->sample->has('unexistent'));
        $this->assertFalse($this->sample->has(''));
    }

    public function testKeys()
    {
        $this->assertEquals(array_keys($this->items), $this->sample->keys());
    }

    public function testSet()
    {
        $this->sample->set('new', [
            'label'   => 'new navigation',
            'options' => ['class' => 'header'],
        ]);
        $this->assertTrue($this->sample->has('new'));
    }

    public function testDelete()
    {
        $this->sample->delete('zero');
        $this->assertFalse($this->sample->has('zero'));
    }

    public function testDeleteAll()
    {
        foreach ($this->items as $k => $v) {
            $this->sample->delete($k);
        }
        foreach ($this->items as $k => $v) {
            $this->assertFalse($this->sample->has($k));
        }
        $this->assertEquals([], $this->sample->keys());
    }

    public function testAddDefault()
    {
        $this->sample->add('new','value');
        $this->assertEquals(array_merge(array_keys($this->items),['new']), $this->sample->keys());
    }

    public function testAddFirst()
    {
        $this->sample->add('new','value','first');
        $this->assertEquals(array_merge(['new'],array_keys($this->items)), $this->sample->keys());
    }

    public function testAddLast()
    {
        $this->sample->add('new','value','last');
        $this->assertEquals(array_merge(array_keys($this->items),['new']), $this->sample->keys());
    }
}
