<?php


namespace App\Service\WebsiteBenchmark;

use App\Entity\WebsiteInterface;
use App\Service\CurlConnectInterface;
use Throwable;

class WebsiteBenchmarker
{
    protected $curl;

    public function __construct(CurlConnectInterface $curl)
    {
        $this->curl = $curl;
    }

    public function benchmark(WebsiteInterface $website)
    {

        foreach ($website->getOtherWebsites() as $website) {
            $this->checkWebsite($website);
        }
    }

    protected function checkWebsite(WebsiteInterface $website): void
    {
        try {
            $website->setStartLoadingTime(microtime(true));
            $this->curl->connect($website->getUrl());
            $website->setFinishLoadingTime(microtime(true));
        } catch(Throwable $e) {
            $website->setException($e);
        }
    }



}