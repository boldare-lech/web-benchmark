<?php


namespace App\Service\WebsiteBenchmark;

use App\Entity\WebsiteInterface;
use App\Event\BenchmarkCreatedEvent;
use App\Service\CurlConnectInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Throwable;

class WebsiteBenchmarker
{
    protected $curl;

    protected $eventDispatcher;

    public function __construct(
        CurlConnectInterface $curl,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->curl = $curl;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function benchmark(WebsiteInterface $website): WebsiteInterface
    {
        $this->checkWebsite($website);

        foreach ($website->getOtherWebsites() as $otherWebsite) {
            $this->checkWebsite($otherWebsite);
        }

        $event = new BenchmarkCreatedEvent($website);
        $this->eventDispatcher->dispatch($event, BenchmarkCreatedEvent::NAME);

        return $website;
    }

    protected function checkWebsite(WebsiteInterface $website): void
    {
        if ($website->isValid()) {
            try {
                $website->setStartLoadingTime(microtime(true));
                $this->curl->connect($website->getUrl());
                $website->setFinishLoadingTime(microtime(true));
            } catch (Throwable $e) {
                $website->setException($e);
            }
        }
    }



}