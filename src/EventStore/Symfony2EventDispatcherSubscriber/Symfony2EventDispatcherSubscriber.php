<?php

namespace Rawkode\Eidetic\EventStore\Symfony2EventDispatcherSubscriber;

use Rawkode\Eidetic\EventStore\EventStore;
use Rawkode\Eidetic\EventStore\EventSubscriber;

use Symfony\Component\EventDispatcher\EventDispatcher;

final class Symfony2EventDispatcherSubscriber implements EventSubscriber
{
    /**
     * @var EventDispatcher
     */
    private $eventDispatcher;

    /**
     */
    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param  int $eventHook
     * @param  object $event
     */
    public function handle($eventHook, $event)
    {
        $this->eventDispatcher->dispatch($eventHook, new EventDispatcherEvent($event));
    }
}
