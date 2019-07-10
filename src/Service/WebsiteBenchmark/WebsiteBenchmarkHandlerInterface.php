<?php


namespace App\Service\WebsiteBenchmark;

/**
 * Interface WebsiteBenchmarkHandlerInterface
 * @package App\Service\WebsiteBenchmark
 */
interface WebsiteBenchmarkHandlerInterface
{

    /**
     * WebsiteBenchmarkHandlerInterface constructor.
     * @param WebsiteBuilderInterface $creator
     * @param WebsiteBenchmarkingInterface $benchmarker
     */
    public function __construct(
        WebsiteBuilderInterface $creator,
        WebsiteBenchmarkingInterface $benchmarker
    );

    /**
     * @param array $arguments
     * @return mixed
     */
    public function handle(array $arguments);
}