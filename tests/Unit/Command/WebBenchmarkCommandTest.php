<?php


namespace App\Tests\Unit\Command;

use App\Entity\WebsiteInterface;
use App\Service\WebsiteBenchmark\WebsiteBenchmarkHandlerInterface;
use App\Tests\BenchmarkTestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use App\Command\WebBenchmarkCommand;
use Symfony\Component\Console\Helper\Table;


/**
 * Class WebBenchmarkCommandTest
 * @package App\Tests\Unit\Command
 */
class WebBenchmarkCommandTest extends BenchmarkTestCase
{
    /** @var CommandTester  */
    private $commandTester;

    /** @var  MockObject|WebsiteBenchmarkHandlerInterface  */
    private $websiteBenchmarkHandler;

    /** @var MockObject|WebsiteInterface */
    private $website;


    protected function setUp()
    {
        $application = new Application();
        $webBenchmarkCommand = new WebBenchmarkCommand(
            $this->websiteBenchmarkHandler = $this->mockWebsiteBenchmarkHandler()
        );
        $application->add($webBenchmarkCommand);
        $command = $application->get(WebBenchmarkCommand::getDefaultName());
        $this->commandTester = new CommandTester($command);

        $this->website = $this->createMainWebsite();

    }

    public function testExecute(): void
    {
        $this->websiteBenchmarkHandler
            ->expects($this->once())
            ->method('handle')
            ->with(self::getArgumentsArray())
            ->willReturn($this->website);

        $this->commandTester->execute(self::COMMAND_ARGUMENTS);

        $this->assertEquals(0, $this->commandTester->getStatusCode());
        $this->assertEquals(549, strlen($this->commandTester->getDisplay()));
    }

}