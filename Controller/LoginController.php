<?php

namespace Victoire\Widget\ConnectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Victoire\Widget\ConnectBundle\Entity\WidgetConnect;

class LoginController extends Controller
{
    private function setSession(WidgetConnect $widgetConnect) {
        $session = $this->get('session');
        $linkExtension = $this->get('victoire_widget.twig.link_extension');
        $redirectUrl = $linkExtension->victoireLinkUrl($widgetConnect->getLink()->getParameters());

        $session->set(WidgetConnect::SESSION_REDIRECT_URL, $redirectUrl);
    }

    public function loginFormAction(WidgetConnect $widgetConnect)
    {
        $this->setSession($widgetConnect);

        return $this->redirect($this->generateUrl('fos_user_security_check'), 307);
    }

    public function resourceOwnersAction(WidgetConnect $widgetConnect, $service)
    {
        $this->setSession($widgetConnect);

        return $this->redirect($this->generateUrl('hwi_oauth_service_redirect', ['service' => $service]), 307);
    }
}
