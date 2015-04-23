<?php
/**
 * @link    http://hiqdev.com/yii2-collection
 * @license http://hiqdev.com/yii2-collection/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\collection\tests;

use hiqdev\collection\Collection;

/**
 */
class CollectionTest extends \yii\codeception\TestCase
{
    /**
     * @var NewCollection
     */
    protected $sample;

    protected function setUp ()
    {
        parent::setUp();
        $this->sample = Yii::createObject([
            'class' => NewCollection::className(),
            'items' => [
                'main'        => [],
                'sidebar'     => [
                    'items' => [
                        'header' => [
                            'label'   => 'MAIN NAVIGATION',
                            'options' => ['class' => 'header'],
                        ],
                    ],
                ],
                'breadcrumbs' => [],
            ],
        ]);
    }

    protected function tearDown ()
    {
        parent::tearDown();
        $this->sample = null;
    }

    public function testConstruct ()
    {
die(var_dump($this->sample));
        $this->assertTrue($this->sample->hasProperty('Text'));
        $this->assertTrue($this->sample->hasProperty('text'));
        $this->assertFalse($this->sample->hasProperty('Caption'));
        $this->assertTrue($this->sample->hasProperty('content'));
        $this->assertFalse($this->sample->hasProperty('content', false));
        $this->assertFalse($this->sample->hasProperty('Content'));
    }

/*
    public function testCanGetProperty()
    {
        $this->assertTrue($this->object->canGetProperty('Text'));
        $this->assertTrue($this->object->canGetProperty('text'));
        $this->assertFalse($this->object->canGetProperty('Caption'));
        $this->assertTrue($this->object->canGetProperty('content'));
        $this->assertFalse($this->object->canGetProperty('content', false));
        $this->assertFalse($this->object->canGetProperty('Content'));
    }

    public function testCanSetProperty()
    {
        $this->assertTrue($this->object->canSetProperty('Text'));
        $this->assertTrue($this->object->canSetProperty('text'));
        $this->assertFalse($this->object->canSetProperty('Object'));
        $this->assertFalse($this->object->canSetProperty('Caption'));
        $this->assertTrue($this->object->canSetProperty('content'));
        $this->assertFalse($this->object->canSetProperty('content', false));
        $this->assertFalse($this->object->canSetProperty('Content'));
    }

    public function testGetProperty()
    {
        $this->assertTrue('default' === $this->object->Text);
        $this->setExpectedException('yii\base\UnknownPropertyException');
        $value2 = $this->object->Caption;
    }

    public function testSetProperty()
    {
        $value = 'new value';
        $this->object->Text = $value;
        $this->assertEquals($value, $this->object->Text);
        $this->setExpectedException('yii\base\UnknownPropertyException');
        $this->object->NewMember = $value;
    }

    public function testSetReadOnlyProperty()
    {
        $this->setExpectedException('yii\base\InvalidCallException');
        $this->object->object = 'test';
    }

    public function testIsset()
    {
        $this->assertTrue(isset($this->object->Text));
        $this->assertFalse(empty($this->object->Text));

        $this->object->Text = '';
        $this->assertTrue(isset($this->object->Text));
        $this->assertTrue(empty($this->object->Text));

        $this->object->Text = null;
        $this->assertFalse(isset($this->object->Text));
        $this->assertTrue(empty($this->object->Text));

        $this->assertFalse(isset($this->object->unknownProperty));
        $this->assertTrue(empty($this->object->unknownProperty));
    }

    public function testUnset()
    {
        unset($this->object->Text);
        $this->assertFalse(isset($this->object->Text));
        $this->assertTrue(empty($this->object->Text));
    }

    public function testUnsetReadOnlyProperty()
    {
        $this->setExpectedException('yii\base\InvalidCallException');
        unset($this->object->object);
    }

    public function testCallUnknownMethod()
    {
        $this->setExpectedException('yii\base\UnknownMethodException');
        $this->object->unknownMethod();
    }

    public function testObjectProperty()
    {
        $this->assertTrue($this->object->object instanceof NewObject);
        $this->assertEquals('object text', $this->object->object->text);
        $this->object->object->text = 'new text';
        $this->assertEquals('new text', $this->object->object->text);
    }

    public function testConstruct()
    {
        $object = new NewObject(['text' => 'test text']);
        $this->assertEquals('test text', $object->getText());
    }

    public function testGetClassName()
    {
        $object = $this->object;
        $this->assertSame(get_class($object), $object::className());
    }

    public function testReadingWriteOnlyProperty()
    {
        $this->setExpectedException(
            'yii\base\InvalidCallException',
            'Getting write-only property: yiiunit\framework\base\NewObject::writeOnly'
        );
        $this->object->writeOnly;
    }
*/
}


class NewCollection extends Collection
{
    public $label;
    public $options;
}
