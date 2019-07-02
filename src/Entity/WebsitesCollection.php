<?php


namespace App\Entity;


class WebsitesCollection implements \ArrayAccess
{
    private $container = [];

    /**
     * @inheritDoc
     */
    public function __construct() {
        $this->container = [];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value) {
        if(!$value instanceof WebsiteInterface) {
            throw new \Exception('Incorrect value for WebsitesCollection');
        }

        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * @inheritDoc
     */
    public function getWebsites() {
        return $this->container;
    }



}