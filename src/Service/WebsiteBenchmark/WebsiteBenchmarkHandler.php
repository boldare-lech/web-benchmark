<?php


namespace App\Service\WebsiteBenchmark;

class WebsiteBenchmarkHandler
{
    protected $creator;
    protected $benchmarker;

    public function __construct(
        WebsiteCreator $creator,
        WebsiteBenchmarker $benchmarker
    ) {
        $this->creator = $creator;
        $this->benchmarker = $benchmarker;
    }

    public function handle(array $arguments)
    {
        $website = $this->creator->create($arguments);

        $this->benchmarker->benchmark($website);
    }
}