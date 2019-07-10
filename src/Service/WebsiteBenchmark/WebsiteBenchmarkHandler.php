<?php


namespace App\Service\WebsiteBenchmark;



class WebsiteBenchmarkHandler
{
    protected $creator;
    protected $benchmarker;
    protected $report;

    public function __construct(
        WebsiteBuilderInterface $creator,
        WebsiteBenchmarkingInterface $benchmarker
    ) {
        $this->creator = $creator;
        $this->benchmarker = $benchmarker;
    }

    public function handle(array $arguments)
    {
        $website = $this->creator->create($arguments);

        return $this->benchmarker->benchmark($website);
    }
}