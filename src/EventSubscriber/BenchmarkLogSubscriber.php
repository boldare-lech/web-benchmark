<?php


namespace App\EventSubscriber;


use App\Entity\WebsiteInterface;
use App\Event\BenchmarkCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Class BenchmarkLogSubscriber
 * @package App\EventSubscriber
 */
class BenchmarkLogSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            BenchmarkCreatedEvent::NAME => 'onBenchmarkCreation',
        ];
    }


    /**
     * @param BenchmarkCreatedEvent $event
     */
    public function onBenchmarkCreation(BenchmarkCreatedEvent $event)
    {
        //@TODO LOG SAVE
    }
}