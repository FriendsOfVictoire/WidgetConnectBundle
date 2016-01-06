<?php

namespace Victoire\Widget\ConnectBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;

class AuthenticationEvent extends Event
{
    /**
     * @param WidgetConnect $widget
     * @param null|string $service
     */
    public function __construct(WidgetConnect $widget, $service = null) {
        $this->widget = $widget;
        $this->service = $service;
    }

    /**
     * @var WidgetConnect
     */
    protected $widget;

    /**
     * @var string
     */
    protected $service;

    /**
     * @return WidgetConnect
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }
}
