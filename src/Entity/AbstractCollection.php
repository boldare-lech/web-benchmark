<?php


namespace App\Entity;


abstract class AbstractCollection implements \ArrayAccess, \Iterator
{
    protected $container = [];

    protected $position = 0;

    /**
     * @inheritDoc
     */
    public function __construct() {
        $this->container = [];
        $this->position = 0;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * @inheritDoc
     */
    public function getWebsites()
    {
        return $this->container;
    }

    /**
     *
     */
    public function rewind() {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function current() {
        return $this->container[$this->position];
    }

    /**
     * @return int|mixed
     */
    public function key() {
        return $this->position;
    }

    /**
     *
     */
    public function next() {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid() {
        return isset($this->container[$this->position]);
    }

    /**
     * @return array
     */
    public function asArray()
    {
        $array = [];
        foreach ($this->container as $item) {
            $array[] = $item;
        }

        return $array;
    }
}