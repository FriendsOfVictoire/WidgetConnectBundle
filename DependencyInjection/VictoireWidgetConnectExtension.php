<?php

namespace Victoire\Widget\ConnectBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Yaml;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class VictoireWidgetConnectExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container){
        $config = [
            'firewalls' => [
                'main' => [
                    'form_login' => [
                        'success_handler' => 'victoire.widget.connect.handler.success.authentication',
                        'failure_handler' => 'victoire.widget.connect.handler.failure.authentication',
                    ],
                    'logout' => [
                        'success_handler' => 'victoire.widget.connect.handler.success.logout',
                    ],
                    'oauth' => [
                        'success_handler' => 'victoire.widget.connect.handler.success.authentication',
                        'failure_handler' => 'victoire.widget.connect.handler.failure.authentication',
                    ],
                ]
            ]
        ];
        $container->prependExtensionConfig('security', $config);
        $container->setParameter('hwi_oauth.resource_owners', null);
    }
}
