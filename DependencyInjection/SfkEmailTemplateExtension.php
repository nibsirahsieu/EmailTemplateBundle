<?php

namespace Sfk\EmailTemplateBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * SfkEmailTemplateExtension
 *
 */
class SfkEmailTemplateExtension extends Extension
{
    /**
     * {@inheritdoc}
     *
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setAlias('Sfk\EmailTemplateBundle\Loader\LoaderInterface', $config['default_loader']);
    }
}
