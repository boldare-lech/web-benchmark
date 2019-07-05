<?php


namespace App\Entity;


class WebsitesCollection extends AbstractCollection
{
    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof WebsiteInterface) {
            throw new \Exception('Incorrect value for WebsitesCollection');
        }

        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }


}