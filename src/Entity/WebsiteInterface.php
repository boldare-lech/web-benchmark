<?php


namespace App\Entity;

use \ArrayAccess;
use \Throwable;
use \DateTime;

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
     * @return WebsiteInterface
     */
    public function setUrl(string $url): WebsiteInterface;

    /**
     * @return ArrayAccess
     */
    public function getOtherWebsites(): ArrayAccess;

    /**
     * @param ArrayAccess $otherUrls
     * @return WebsiteInterface
     */
    public function setOtherWebsites(ArrayAccess $otherUrls): WebsiteInterface;

    /**
     * @return float
     */
    public function getStartLoadingTime(): float;

    /**
     * @param float $startLoadingTime
     *
     * @return WebsiteInterface
     */
    public function setStartLoadingTime(float $startLoadingTime): WebsiteInterface;

    /**
     * @return float
     */
    public function getFinishLoadingTime(): float;

    /**
     * @param float $finishLoadingTime
     * @return WebsiteInterface
     */
    public function setFinishLoadingTime(float $finishLoadingTime): WebsiteInterface;

    /**
     * @param WebsiteInterface $website
     */
    public function addOtherWebsite(WebsiteInterface $website);

    /**
     * @param \Throwable $exception
     * @return WebsiteInterface
     */
    public function setException(Throwable $exception): WebsiteInterface;

    /**
     * @return \Throwable
     */
    public function getException(): Throwable;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * @return float
     */
    public function countLoadingTime(): float;
}