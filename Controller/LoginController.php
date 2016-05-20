<?php

namespace Victoire\Widget\ConnectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;
use Victoire\Widget\ConnectBundle\Event\AuthenticationEvent;

class LoginController extends Controller
{
    private function setRedirectUrlSession(WidgetConnect $widgetConnect, $popup = false) {
        $session = $this->get('session');
        $linkExtension = $this->get('victoire_widget.twig.link_extension');
        $redirectUrl = $linkExtension->victoireLinkUrl($widgetConnect->getLink()->getParameters());

        if ($popup) {
            $redirectUrl = $this->generateUrl('victoire_widget_connect_close');
        }

        $session->set(WidgetConnect::SESSION_REDIRECT_URL, $redirectUrl);
    }

    public function resourceOwnersAction(WidgetConnect $widgetConnect, $service)
    {
        $event = new AuthenticationEvent($widgetConnect, $service);
        $this->get('event_dispatcher')->dispatch(WidgetConnect::EVENT_BEFORE_LOGIN, $event);

        $popup = true;
        $this->setRedirectUrlSession($widgetConnect, $popup);

        return $this->redirect($this->generateUrl('hwi_oauth_service_redirect', ['service' => $service]), 307);
    }

    public function closeAction()
    {
        return new Response('<html><body><script>window.close()</script></body></html>');
    }
}
