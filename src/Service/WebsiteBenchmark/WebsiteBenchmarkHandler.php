<?php


namespace App\Service\WebsiteBenchmark;

use App\Service\Reports\BaseReport;

class WebsiteBenchmarkHandler
{
    protected $creator;
    protected $benchmarker;
    protected $report;

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

        return $this->benchmarker->benchmark($website);
    }
}