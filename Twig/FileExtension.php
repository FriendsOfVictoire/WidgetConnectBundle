<?php

namespace Victoire\Widget\ConnectBundle\Twig;

use Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator;
use Symfony\Component\Templating\TemplateNameParser;

class FileExtension extends \Twig_Extension
{
    /** @var TemplateNameParser */
    protected $parser;

    /** @var TemplateLocator  */
    protected $locator;

    public function __construct(TemplateNameParser $parser, TemplateLocator $locator) {
        $this->parser = $parser;
        $this->locator = $locator;
    }

    public function getFunctions() {
        return [
            'get_template_path' => new \Twig_Function_Method($this, 'getTemplatePathFunction'),
        ];
    }

    /**
     * @param string $view bundle:directory:file
     * @return bool|string
     */
    public function getTemplatePathFunction($view)
    {
        try {
            $path = $this->locator->locate($this->parser->parse($view));
        } catch (\InvalidArgumentException $e) {
            return false;
        }
        return $path;
    }

    public function getName()
    {
        return 'file_extension';
    }
}
