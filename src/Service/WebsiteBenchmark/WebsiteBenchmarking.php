<?php


namespace App\Service\WebsiteBenchmark;

use App\Entity\WebsiteInterface;
use App\Event\BenchmarkCreatedEvent;
use App\Service\CurlConnectInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Throwable;

/**
 * Class WebsiteBenchmarking
 * @package App\Service\WebsiteBenchmark
 */
class WebsiteBenchmarking implements WebsiteBenchmarkingInterface
{
    /**
     * @var CurlConnectInterface
     */
    protected $curl;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * WebsiteBenchmarking constructor.
     * @param CurlConnectInterface $curl
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        CurlConnectInterface $curl,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->curl = $curl;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param WebsiteInterface $website
     * @return WebsiteInterface
     */
    public function benchmark(WebsiteInterface $website): WebsiteInterface
    {
        if (!$website->isValid()) {
           return $website;
        }

        $this->checkWebsite($website);

        foreach ($website->getOtherWebsites() as $otherWebsite) {
            if (!$otherWebsite->isValid()) {
                continue;
            }

            $this->checkWebsite($otherWebsite);
        }

        $event = new BenchmarkCreatedEvent($website);
        $this->eventDispatcher->dispatch($event, BenchmarkCreatedEvent::NAME);

        return $website;
    }

    /**
     * @param WebsiteInterface $website
     */
    protected function checkWebsite(WebsiteInterface $website): void
    {
        try {
            $website->setStartLoadingTime(microtime(true));
            $this->curl->connect($website->getUrl());
            $website->setFinishLoadingTime(microtime(true));
        } catch (Throwable $e) {
            $website->setException($e);
        }

    }



}