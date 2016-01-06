<?php

namespace Victoire\Widget\ConnectBundle\Handler;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;
use Victoire\Widget\ConnectBundle\Event\HandlerEvent;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{
    /** @var EventDispatcherInterface */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function onLogoutSuccess(Request $request)
    {
        $referer_url = $request->headers->get('referer');
        $response = new RedirectResponse($referer_url);

        $event = new HandlerEvent($response);
        $this->dispatcher->dispatch(WidgetConnect::EVENT_AFTER_LOGOUT, $event);

        return $response;
    }
}
