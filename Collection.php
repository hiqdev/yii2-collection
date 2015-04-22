<?php
/**
 * @link    http://hiqdev.com/yii2-collection
 * @license http://hiqdev.com/yii2-collection/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\collection;

/**
 * Basic Collection Component
 */
class Collection extends \yii\base\Collection
{
    /**
     * @var array list of items with their configuration in format: 'itemId' => [...]
     */
    private $_items = [];

    /**
     * Multi set
     * @param array $items list of items
     */
    public function mset (array $items)
    {
        $this->_items = $items;
    }

    /**
     * Multi get
     * @return array list of items
     */
    public function mget ()
    {
        $items = [];
        foreach ($this->_items as $id => $item) {
            $items[$id] = $this->get($id);
        }

        return $items;
    }

    /**
     * @param string $id service id.
     * @return object item instance.
     * @throws InvalidParamException on non existing item request.
     */
    public function get ($id)
    {
        if (!$this->has($id)) {
            throw new InvalidParamException("Unknown item '{$id}'.");
        };
        if (!is_object($this->_items[$id])) {
            $this->_items[$id] = $this->create($id, $this->_items[$id]);
        };

        return $this->_items[$id];
    }

    /**
     * Checks if item exists in the hub.
     * @param string $id item id.
     * @return boolean whether item exist.
     */
    public function has ($id)
    {
        return array_key_exists($id, $this->_items);
    }

    /**
     * Creates item instance from its array configuration.
     * @param string $id item id.
     * @param array $config item instance configuration.
     * @return MenuInterface item instance.
     */
    protected function create ($id, $config)
    {
        $config['id'] = $id;

        return Yii::createObject($config);
    }
}
