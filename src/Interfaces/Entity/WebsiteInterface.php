<?php


namespace App\Interfaces\Entity;


use phpDocumentor\Reflection\Types\This;
use \ArrayAccess;

/**
 * Interface WebsiteInterface
 * @package App\Interfaces\Entity
 */
interface WebsiteInterface
{
    const WEBSITE_FIELD = 'websiteUrl';

    const OTHER_WEBSITES_FIELD = 'otherWebsitesUrls';

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param string $url
     *
     * @return This
     */
    public function setUrl(string $url): This;

    /**
     * @return ArrayAccess
     */
    public function getOtherUrls(): ArrayAccess;

    /**
     * @param ArrayAccess $otherUrls
     *
     * @return This
     */
    public function setOtherUrls(ArrayAccess $otherUrls): This;

    /**
     * @return float
     */
    public function getStartLoadingTime(): float;

    /**
     * @param float $startLoadingTime
     *
     * @return This
     */
    public function setStartLoadingTime(float $startLoadingTime): This;

    /**
     * @return This
     */
    public function getFinishLoadingTime(): float;

    /**
     * @param float $finishLoadingTime
     *
     * @return This
     */
    public function setFinishLoadingTime(float $finishLoadingTime): This;
}