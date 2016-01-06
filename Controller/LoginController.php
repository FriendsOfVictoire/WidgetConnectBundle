<?php

namespace Victoire\Widget\ConnectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;
use Victoire\Widget\ConnectBundle\Event\AuthenticationEvent;

class LoginController extends Controller
{
    private function setRedirectUrlSession(WidgetConnect $widgetConnect) {
        $session = $this->get('session');
        $linkExtension = $this->get('victoire_widget.twig.link_extension');
        $redirectUrl = $linkExtension->victoireLinkUrl($widgetConnect->getLink()->getParameters());

        $session->set(WidgetConnect::SESSION_REDIRECT_URL, $redirectUrl);
    }

    public function loginFormAction(WidgetConnect $widgetConnect)
    {
        $event = new AuthenticationEvent($widgetConnect);
        $this->get('event_dispatcher')->dispatch(WidgetConnect::EVENT_BEFORE_LOGIN, $event);

        $this->setRedirectUrlSession($widgetConnect);

        return $this->redirect($this->generateUrl('fos_user_security_check'), 307);
    }

    public function resourceOwnersAction(WidgetConnect $widgetConnect, $service)
    {
        $event = new AuthenticationEvent($widgetConnect, $service);
        $this->get('event_dispatcher')->dispatch(WidgetConnect::EVENT_BEFORE_LOGIN, $event);

        $this->setRedirectUrlSession($widgetConnect);

        return $this->redirect($this->generateUrl('hwi_oauth_service_redirect', ['service' => $service]), 307);
    }
}
