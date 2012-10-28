<?php

namespace Sfk\EmailTemplateBundle\DependencyInjection\Compiler;
 
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;
 
/**
 * ChainLoaderCompilerPass
 * 
 */
class ChainLoaderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('sfk_email_template.loader.chain')) {
            return;
        }
        
        $definition = $container->getDefinition('sfk_email_template.loader.chain');
 
        foreach ($container->findTaggedServiceIds('sfk_email_template.chain_loader') as $id => $attributes) {
            $definition->addMethodCall('addLoader', array(new Reference($id)));
        }
    }
}