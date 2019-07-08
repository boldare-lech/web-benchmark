<?php


namespace App\Service\WebsiteBenchmark;

use App\Entity\WebsiteInterface;
use App\Service\CurlConnectInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Interface WebsiteBenchmarkerInterface
 * @package App\Service\WebsiteBenchmark
 */
interface WebsiteBenchmarkingInterface
{
    /**
     * WebsiteBenchmarkerInterface constructor.
     * @param CurlConnectInterface $curl
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(CurlConnectInterface $curl, EventDispatcherInterface $eventDispatcher);

    /**
     * @param WebsiteInterface $website
     *
     * @return WebsiteInterface
     */
    public function benchmark(WebsiteInterface $website): WebsiteInterface;
}