<?php


namespace App\Service\WebsiteBenchmark;


use App\Entity\WebsiteInterface;
use Symfony\Component\Console\Helper\Table;

interface BenchmarkConsoleReportInterface
{
    /**
     * @param WebsiteInterface $website
     * @param Table $table
     *
     * @return void
     */
    public function generateConsoleTable(
        WebsiteInterface $website, Table $table
    ): void;
}