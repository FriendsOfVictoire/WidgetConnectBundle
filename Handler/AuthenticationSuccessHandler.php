<?php

namespace Victoire\Widget\ConnectBundle\Handler;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;

class AuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /** @var Session */
    protected $session;

    public function __construct(Session $session) {
        $this->session = $session;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $refererUrl = $request->headers->get('referer');
        $sessionUrl = $this->session->get(WidgetConnect::SESSION_REDIRECT_URL);
        $redirectUrl = $sessionUrl ? : $refererUrl;
        $response = new RedirectResponse($redirectUrl);

        $this->session->remove(WidgetConnect::SESSION_REDIRECT_URL);

        return $response;
    }
}
