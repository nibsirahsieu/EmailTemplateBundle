<?php

namespace Sfk\EmailTemplateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     * 
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('sfk_email_template');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root("sfk_email_template");
        }

        $rootNode
            ->children()
                ->scalarNode('default_loader')->defaultValue('Sfk\EmailTemplateBundle\Loader\TwigLoader')
            ->end()
        ;
        
        return $treeBuilder;
    }
}