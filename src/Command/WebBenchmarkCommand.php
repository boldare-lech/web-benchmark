<?php


namespace App\Command;

use App\Entity\Website;
use App\Entity\WebsiteInterface;

use App\Service\WebsiteBenchmark\BenchmarkConsoleReport;
use App\Service\WebsiteBenchmark\WebsiteBenchmarkHandler;;
use App\Service\WebsiteBenchmark\WebsiteReportInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;


/**
 * Class WebBenchmarkCommand
 *
 * @package App\Command
 */
class WebBenchmarkCommand extends Command
{
    /**
     * @var WebsiteBenchmarkHandler
     */
    protected $handler;


    /**
     * WebBenchmarkCommand constructor.
     *
     * @param WebsiteBenchmarkHandler $handler
     */
    public function __construct(
        WebsiteBenchmarkHandler $handler
    ) {
        $this->handler = $handler;

        parent::__construct();
    }


    /**
     * @var string
     */
    protected static $defaultName = 'app:web-benchmark';

    /**
     * Command configuration
     *
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Creates benchmark report')
            ->setHelp(
                'benchmark loading time of the website in comparison to the other websites (check how fast is the website\'s loading time in comparison to other competitors).'
            )
            ->addUsage(
                'app:web-benchmark test.com test2.com,test3com'
            )
            ->addArgument(
                WebsiteInterface::WEBSITE_FIELD,
                InputArgument::REQUIRED,
                'Url of website to benchmark'
            )
            ->addArgument(
                WebsiteInterface::OTHER_WEBSITES_FIELD,
                InputArgument::REQUIRED,
                'Urls of websites to compare, divided with "' . WebsiteInterface::DELIMITER . '"'
            );

    }

    /**
     * Command execution
     *
     * @param InputInterface  $input  Input
     * @param OutputInterface $output Output
     *
     * @return string
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $website = $this->handler->handle($input->getArguments());

        assert($website instanceof WebsiteInterface);

        $table = new Table($output);

        $reportGenerator = new BenchmarkConsoleReport();
        $reportGenerator->generateConsoleTable($website, $table);

        $table->render();
    }
}