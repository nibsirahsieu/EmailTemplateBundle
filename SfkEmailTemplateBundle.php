<?php

/**
 * @author Oleg Khussainov <oleg@hireoleg.com>
 * 
 */

namespace Sfk\EmailTemplateBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Sfk\EmailTemplateBundle\DependencyInjection\Compiler\ChainLoaderCompilerPass;

/**
 * SfkEmailTemplateBundle
 *
 */
class SfkEmailTemplateBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
 
        $container->addCompilerPass(new ChainLoaderCompilerPass());
    }
}