<?php

namespace Victoire\Widget\ConnectBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HandlerEvent extends Event
{
    public function __construct(RedirectResponse $redirectResponse) {
        $this->redirectResponse = $redirectResponse;
    }

    /**
     * @var RedirectResponse
     */
    protected $redirectResponse;

    /**
     * @return RedirectResponse
     */
    public function getRedirectResponse()
    {
        return $this->redirectResponse;
    }
}
