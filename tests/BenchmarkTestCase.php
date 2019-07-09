<?php


namespace App\Tests;


use App\Command\WebBenchmarkCommand;
use App\Entity\Website;
use App\Entity\WebsiteInterface;
use App\Service\WebsiteBenchmark\WebsiteBenchmarkHandler;
use App\Service\WebsiteBenchmark\WebsiteBenchmarkHandlerInterface;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class BenchmarkTestCase
 * @package App\Tests
 */
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

    /**
     * @return array
     */
    static function getArgumentsArray(): array
    {
        return array_merge(
            self::COMMAND_ARGUMENTS,
            ['command' => WebBenchmarkCommand::getDefaultName()]
        );
    }

    /**
     * @return MockObject|WebsiteBenchmarkHandlerInterface
     */
    protected function mockWebsiteBenchmarkHandler(): MockObject
    {
        return $this
            ->getMockBuilder(WebsiteBenchmarkHandler::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return MockObject|WebsiteInterface
     */
    protected function mockWebsite(): MockObject
    {
        return $this
            ->getMockBuilder(Website::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return WebsiteInterface
     */
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

    /**
     * @param $url
     * @return WebsiteInterface
     */
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