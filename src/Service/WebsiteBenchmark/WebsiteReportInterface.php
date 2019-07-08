<?php


namespace App\Service\WebsiteBenchmark;


use App\Entity\WebsiteInterface;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

/**
 * Interface WebsiteReportInterface
 * @package App\Service\WebsiteBenchmark
 */
interface WebsiteReportInterface
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