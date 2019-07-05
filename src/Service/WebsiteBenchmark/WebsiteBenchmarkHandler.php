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
        WebsiteBenchmarker $benchmarker,
        BaseReport $report
    ) {
        $this->creator = $creator;
        $this->benchmarker = $benchmarker;
        $this->report = $report;
    }

    public function handle(array $arguments)
    {
        $website = $this->creator->create($arguments);

        $this->benchmarker->benchmark($website);

        $baseReport = $this->report->create($website);

    }
}