<?php

use App\Entity\WebsiteCollection;
use App\Interfaces\Entity\WebsiteInterface;
use phpDocumentor\Reflection\Types\This;


/**
 * Class Website
 */
class Website implements WebsiteInterface
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var WebsiteCollection
     */
    protected $otherUrls;

    /**
     * @var float
     */
    protected $startLoadingTime;

    /**
     * @var float
     */
    protected $finishLoadingTime;

    /**
     * @inheritDoc
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @inheritDoc
     */
    public function setUrl(string $url): This
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOtherUrls(): ArrayAccess
    {
        return $this->otherUrls;
    }

    /**
     * @param mixed $otherUrls
     */
    public function setOtherUrls($otherUrls): This
    {
        $this->otherUrls = $otherUrls;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStartLoadingTime(): float
    {
        return $this->startLoadingTime;
    }

    /**
     * @inheritDoc
     */
    public function setStartLoadingTime(float $startLoadingTime): This
    {
        $this->startLoadingTime = $startLoadingTime;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFinishLoadingTime(): float
    {
        return $this->finishLoadingTime;
    }

    /**
     * @inheritDoc
     */
    public function setFinishLoadingTime($finishLoadingTime): This
    {
        $this->finishLoadingTime = $finishLoadingTime;

        return $this;
    }
}