<?php


namespace App\Tests;


use App\Entity\Website;
use App\Entity\WebsiteInterface;
use App\Service\WebsiteBenchmark\WebsiteBenchmarkHandler;
use App\Service\WebsiteBenchmark\WebsiteReport;
use App\Service\WebsiteBenchmark\WebsiteReportInterface;
use Symfony\Component\Console\Helper\Table;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class BenchmarkTestCase extends TestCase
{

    const WEBSITES = [
        'https://www.google.pl/',
        'https://www.wp.pl/',
        'https://www.onet.pl/'
    ];

    const COMMAND_ARGUMENTS = [
           WebsiteInterface::WEBSITE_FIELD => self::WEBSITES[0],
           WebsiteInterface::OTHER_WEBSITES_FIELD =>
               self::WEBSITES[1] .
               WebsiteInterface::DELIMITER .
               self::WEBSITES[2]
    ];

    protected function mockConsoleTable(): MockObject
    {
        return $this
            ->getMockBuilder(Table::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function mockWebsiteBenchmarkHandler(): MockObject
    {
        return $this
            ->getMockBuilder(WebsiteBenchmarkHandler::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function mockWebsiteReport(): MockObject
    {
        return $this
            ->getMockBuilder(WebsiteReport::class)
            ->disableOriginalConstructor()
            ->getMock();

    }

    protected function createWebsiteReport(): WebsiteReportInterface
    {
        return new WebsiteReport();
    }

    protected function mockWebsite(): MockObject
    {
        return $this
            ->getMockBuilder(WebsiteReport::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function createMainWebsite(): WebsiteInterface
    {
        $website = $this->createSingleWebsiste(self::WEBSITES[0]);

        $website->addOtherWebsite(
            $this->createSingleWebsiste(self::WEBSITES[1])
        );
        $website->addOtherWebsite(
            $this->createSingleWebsiste(self::WEBSITES[0])
        );

        return $website;
    }

    private function createSingleWebsiste($url): WebsiteInterface
    {
        $website = new Website($url);

        $startTime = microtime(true);
        $finishTime = $startTime + 7.25;

        $website->setStartLoadingTime($startTime);
        $website->setFinishLoadingTime($finishTime);

        return $website;
    }

}