<?php

namespace Test\WidgetBundle\Listener;

use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Claroline\CoreBundle\Event\DisplayWidgetEvent;

/**
 *  @DI\Service()
 */
class TestListener
{
    private $container;

    /**
     * @DI\InjectParams({
     *     "container" = @DI\Inject("service_container")
     * })
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @DI\Observe("widget_test_test_widget")
     *
     * @param DisplayWidgetEvent $event
     */
    public function onDisplay(DisplayWidgetEvent $event)
    {
        if ($event->getInstance()->isDesktop()) {
            $event->setContent('Desktop widget');
        } else {
            $event->setContent('Workspace widget');
        }

        $event->stopPropagation();
    }
}
