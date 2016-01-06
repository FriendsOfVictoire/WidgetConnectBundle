<?php

namespace Victoire\Widget\ConnectBundle\Provider;

use Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator;
use Symfony\Component\Templating\TemplateNameParser;

class FileProvider
{
    /** @var TemplateNameParser */
    protected $parser;

    /** @var TemplateLocator */
    protected $locator;

    public function __construct(TemplateNameParser $parser, TemplateLocator $locator)
    {
        $this->parser = $parser;
        $this->locator = $locator;
    }

    /**
     * @param string $view
     * @return null|string
     */
    public function getTemplatePathFunction($view)
    {
        try {
            $path = $this->locator->locate($this->parser->parse($view));
        } catch (\InvalidArgumentException $e) {
            return null;
        }
        return $path;
    }
}
