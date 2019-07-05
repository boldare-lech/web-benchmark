<?php

namespace App\Entity;

use phpDocumentor\Reflection\Types\This;
use \ArrayAccess;
use \Throwable;
use \DateTime;


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
     * @var WebsitesCollection
     */
    protected $otherWebsites;

    /**
     * @var float
     */
    protected $startLoadingTime;

    /**
     * @var float
     */
    protected $finishLoadingTime;

    /**
     * @var Throwable
     */
    protected $exception;

    /**
     * @var DateTime
     */
    protected $date;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->date = new DateTime();
        $this->otherWebsites = new WebsitesCollection();
    }

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
    public function setUrl(string $url): WebsiteInterface
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOtherWebsites(): ArrayAccess
    {
        return $this->otherWebsites;
    }

    /**
     * @param WebsitesCollection $otherUrls Websites Collection
     *
     *
     * @return This
     */
    public function setOtherWebsites(\ArrayAccess $otherUrls): WebsiteInterface
    {
        $this->otherWebsites = $otherUrls;

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
    public function setStartLoadingTime(float $startLoadingTime): WebsiteInterface
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
    public function setFinishLoadingTime($finishLoadingTime): WebsiteInterface
    {
        $this->finishLoadingTime = $finishLoadingTime;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addOtherWebsite(WebsiteInterface $website): WebsiteInterface
    {
        $this->otherWebsites[] = $website;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setException(Throwable $exception): WebsiteInterface
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getException(): Throwable
    {
        return $this->exception;
    }

    /**
     * @inheritDoc
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getWebsitesArray(): array
    {
        assert($this->getOtherWebsites() instanceof WebsitesCollection);
        $array = $this->getOtherWebsites()->asArray();
        array_unshift($array, $this);

        return $array;
    }

    /**
     * @return float
     */
    public function countLoadingTime(): float
    {
        return $this->getFinishLoadingTime() - $this->getStartLoadingTime();
    }
}