<?php

namespace Victoire\Widget\ConnectBundle\Twig;

use Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator;
use Symfony\Component\Templating\TemplateNameParser;
use Victoire\Widget\ConnectBundle\Provider\FileProvider;

class FileExtension extends \Twig_Extension
{
    /** @var TemplateNameParser */
    protected $fileProvider;

    public function __construct(FileProvider $fileProvider) {
        $this->fileProvider = $fileProvider;
    }

    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('get_template_path', [$this, 'getTemplatePathFunction']),
        ];
    }

    /**
     * @param string $view bundle:directory:file
     * @return bool|string
     */
    public function getTemplatePathFunction($view)
    {
        return $this->fileProvider->getTemplatePathFunction($view);
    }

    public function getName()
    {
        return 'file_extension';
    }
}
