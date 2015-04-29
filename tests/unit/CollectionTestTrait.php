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
    /**
     * @var array items
     */
    protected $items = [
        'null'      => null,
        'zero'      => [],
        'empty'     => [],
        'string'    => [],
        'single'    => [],
        'hash'      => [],
        'main'      => [],
        'sidebar'   => [
            'items' => [
                'header' => [
                    'label'   => 'MAIN NAVIGATION',
                    'options' => ['class' => 'header'],
                ],
            ],
        ],
        'existing'  => [],
        'last'      => [],
    ];

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
        $this->assertEquals($this->sample->keys(), array_keys($this->items));
    }

    public function testSetNew()
    {
        $this->sample->set('new', 'the new one');
        $this->assertTrue($this->sample->has('new'));
    }

    public function testSetExisting()
    {
        $this->sample->set('existing', 'the new one');
        $this->assertEquals($this->sample->keys(), array_keys($this->items));
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

    public function testAddExisting()
    {
        foreach ([null, 'first', 'last', ['before' => 'last']] as $where) {
            $this->sample->add('existing', 'value');
            $this->assertEquals(array_keys($this->items), $this->sample->keys());
        };
    }

    public function testAddDefault()
    {
        $this->sample->add('new', 'value');
        $this->assertEquals(array_merge(array_keys($this->items), ['new']), $this->sample->keys());
    }

    public function testAddFirst()
    {
        $this->sample->add('new', 'value', 'first');
        $this->assertEquals(array_merge(['new'], array_keys($this->items)), $this->sample->keys());
    }

    public function testAddLast()
    {
        $this->sample->add('new', 'value', 'last');
        $this->assertEquals(array_merge(array_keys($this->items), ['new']), $this->sample->keys());
    }
}
