<?php


namespace App\Entity;


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

    const DELIMITER = ',';

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param string $url
     */
    public function setUrl(string $url);

    /**
     * @return ArrayAccess
     */
    public function getOtherWebsites(): ArrayAccess;

    /**
     * @param ArrayAccess $otherUrls
     */
    public function setOtherWebsites(ArrayAccess $otherUrls);

    /**
     * @return float
     */
    public function getStartLoadingTime(): float;

    /**
     * @param float $startLoadingTime
     *
     * @return This
     */
    public function setStartLoadingTime(float $startLoadingTime);

    /**
     * @return This
     */
    public function getFinishLoadingTime(): float;

    /**
     * @param float $finishLoadingTime
     */
    public function setFinishLoadingTime(float $finishLoadingTime);

    /**
     * @param WebsiteInterface $website
     */
    public function addOtherWebsite(WebsiteInterface $website);
}