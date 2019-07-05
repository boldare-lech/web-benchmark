<?php


namespace App\Entity;

use Symfony\Component\Validator\ConstraintViolationListInterface;
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
     * @return AbstractCollection
     */
    public function getOtherWebsites(): AbstractCollection;

    /**
     * @param AbstractCollection $otherUrls
     * @return WebsiteInterface
     */
    public function setOtherWebsites(AbstractCollection $otherUrls): WebsiteInterface;

    /**
     * @return float|float
     */
    public function getStartLoadingTime(): ?float;

    /**
     * @param float $startLoadingTime
     *
     * @return WebsiteInterface
     */
    public function setStartLoadingTime(float $startLoadingTime): WebsiteInterface;

    /**
     * @return float|null
     */
    public function getFinishLoadingTime(): ?float;

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
    public function getException(): ?Throwable;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * @return float
     */
    public function countLoadTime(): ?float;

    /**
     * @return string
     */
    public function getLoadTime(): string;

    /**
     * @param WebsiteInterface $website
     * @return string
     */
    public function diffLoadTime(WebsiteInterface $website): ?string;

    /**
     * @return array
     */
    public function getViolations(): ?ConstraintViolationListInterface;

    /**
     * @param array $violations
     * @return WebsiteInterface
     */
    public function setViolations(ConstraintViolationListInterface $violations):  WebsiteInterface;

    /**
     * @return bool
     */
    public function isValid(): bool;
}