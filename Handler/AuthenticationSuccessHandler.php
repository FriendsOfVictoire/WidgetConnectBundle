<?php

namespace Victoire\Widget\ConnectBundle\Handler;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\ParameterBagUtils;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;
use Victoire\Widget\ConnectBundle\Event\HandlerEvent;

class AuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /** @var EventDispatcherInterface */
    protected $dispatcher;

    /** @var Session */
    protected $session;

    public function __construct(EventDispatcherInterface $dispatcher, Session $session)
    {
        $this->dispatcher = $dispatcher;
        $this->session = $session;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($targetUrl = ParameterBagUtils::getRequestParameterValue($request, '_target_path')) {
            $response = new RedirectResponse($targetUrl);
        }

        if ($sessionUrl = $this->session->get(WidgetConnect::SESSION_REDIRECT_URL)) {
            $this->session->remove(WidgetConnect::SESSION_REDIRECT_URL);
            $response = new RedirectResponse($sessionUrl);
        } else {
            $refererUrl = $request->headers->get('referer');
            $response = new RedirectResponse($refererUrl);
        }

        $event = new HandlerEvent($response);
        $this->dispatcher->dispatch(WidgetConnect::EVENT_AFTER_LOGIN_SUCCESS, $event);

        return $response;
    }
}
