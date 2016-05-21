<?php

namespace Victoire\Widget\ConnectBundle\Handler;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Component\Translation\TranslatorInterface;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;
use Victoire\Widget\ConnectBundle\Event\HandlerEvent;

class AuthenticationFailureHandler extends DefaultAuthenticationFailureHandler
{
    /** @var EventDispatcherInterface */
    protected $dispatcher;

    /** @var Session */
    protected $session;
    /**
     * @var bool
     */
    private $useFlashNotification;
    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(EventDispatcherInterface $dispatcher,
                                TranslatorInterface $translator,
                                Session $session,
                                HttpKernelInterface $httpKernel,
                                HttpUtils $httpUtils,
                                array $options = [],
                                LoggerInterface $logger = null,
                                $useFlashNotification = true
    ) {
        $this->dispatcher = $dispatcher;
        $this->translator = $translator;
        $this->session = $session;
        parent::__construct($httpKernel, $httpUtils, $options, $logger);
        $this->useFlashNotification = $useFlashNotification;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $refererUrl = $request->headers->get('referer');
        $response = new RedirectResponse($refererUrl);

        $this->session->remove(WidgetConnect::SESSION_REDIRECT_URL);
        $this->session->getFlashBag()->add('LAST_USERNAME', $exception->getToken()->getUsername());
        if (true === $this->useFlashNotification) {
            $this->session->getFlashBag()->add('warning', $this->translator->trans($exception->getMessage(), [], 'victoire'));
        }

        $event = new HandlerEvent($response);
        $this->dispatcher->dispatch(WidgetConnect::EVENT_AFTER_LOGIN_FAILURE, $event);

        return $response;
    }
}
