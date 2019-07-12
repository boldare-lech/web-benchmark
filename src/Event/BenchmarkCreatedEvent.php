<?php


namespace App\Event;


use App\Entity\WebsiteInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class BenchmarkCreatedEvent
 * @package App\Event
 */
class BenchmarkCreatedEvent extends Event
{
    /**
     *
     */
    public const NAME = 'website.benchmark.created';

    /**
     * @var WebsiteInterface
     */
    protected $website;

    /**
     * BenchmarkCreatedEvent constructor.
     *
     * @param WebsiteInterface $website
     */
    public function __construct(WebsiteInterface $website)
    {
        $this->website = $website;
    }

    /**
     * @return WebsiteInterface
     */
    public function getWebsite(): WebsiteInterface
    {
        return $this->website;
    }

}