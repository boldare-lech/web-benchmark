<?php


namespace App\Service\WebsiteBenchmark;


use App\Entity\WebsiteInterface;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

/**
 * Class BenchmarkConsoleReport
 * @package App\Service\WebsiteBenchmark
 */
class BenchmarkConsoleReport implements BenchmarkConsoleReportInterface
{
    /**
     * @inheritDoc
     */
    public function generateConsoleTable(
        WebsiteInterface $website, Table $table
    ): void {
        $table->setHeaderTitle(
            $website->getDate()->format('Y-m-d')  .
            ' ' .
            $website->getUrl()
        );

        $table->setHeaders(
            ['url', 'load time', 'difference', 'errors']
        );

        $rows = [[
            $website->getUrl(),
            $website->getLoadTime(),
            '',
            $website->getErrors(),
        ]];

        if ($website->isValid()) {

            foreach ($website->getOtherWebsites() as $otherWebsite) {
                assert($otherWebsite instanceof WebsiteInterface);
                $rows[] = new TableSeparator();
                $rows[] = [
                    $otherWebsite->getUrl(),
                    $otherWebsite->getLoadTime(),
                    $otherWebsite->diffLoadTime($website),
                    $otherWebsite->getErrors(),
                ];
            }
        }
        $table->setRows($rows);
    }
}