<?php


namespace App\Service\WebsiteBenchmark;


use App\Entity\WebsiteInterface;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

class WebsiteReport
{
    /**
     * @param WebsiteInterface $website
     * @param Table $table
     *
     * @return void
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
        $table->setRows($rows);
    }
}