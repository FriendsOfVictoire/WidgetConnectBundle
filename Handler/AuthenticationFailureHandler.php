<?php

namespace Victoire\Widget\ConnectBundle\Handler;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\HttpUtils;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;

class AuthenticationFailureHandler extends DefaultAuthenticationFailureHandler
{
    /** @var Session */
    protected $session;

    public function __construct(Session $session,
                                HttpKernelInterface $httpKernel,
                                HttpUtils $httpUtils,
                                array $options = [],
                                LoggerInterface $logger = null) {
        parent::__construct($httpKernel, $httpUtils, $options, $logger);
        $this->session = $session;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $refererUrl = $request->headers->get('referer');
        $response = new RedirectResponse($refererUrl);

        $this->session->remove(WidgetConnect::SESSION_REDIRECT_URL);

        return $response;
    }
}
