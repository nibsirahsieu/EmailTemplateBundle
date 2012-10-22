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
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sfk_email_template');

        $rootNode
            ->children()
                ->scalarNode('default_loader')->defaultValue('sfk_email_template.loader.twig')
            ->end()
        ;
        
        return $treeBuilder;
    }
}