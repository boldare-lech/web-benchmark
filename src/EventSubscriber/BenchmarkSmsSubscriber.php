<?php


namespace App\EventSubscriber;


use App\Entity\WebsiteInterface;
use App\Event\BenchmarkCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Class BenchmarkSmsSubscriber
 * @package App\EventSubscriber
 */
class BenchmarkSmsSubscriber implements EventSubscriberInterface
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
        //@TODO SMS NOTIFICATION
    }
}