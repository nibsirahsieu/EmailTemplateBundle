<?php

namespace Sfk\EmailTemplateBundle\Tests\DependencyInjection;

use Sfk\EmailTemplateBundle\DependencyInjection\SfkEmailTemplateExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

/**
 * SfkEmailTemplateExtensionTest
 * 
 */
class SfkEmailTemplateExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $container = new ContainerBuilder();
        $loader = new SfkEmailTemplateExtension();
        $loader->load(array(array()), $container);
        $this->assertTrue($container->hasDefinition('sfk_email_template.loader.twig'), 'Has twig service/loader');
        $this->assertTrue($container->hasAlias('sfk_email_template.loader'), 'Has default loader alias');
    }

    public function testOverwriteDefaultLoader()
    {
        $container = new ContainerBuilder();
        $loader = new SfkEmailTemplateExtension();
        $loader->load(array(array('default_loader' =>'foobar')), $container);
        $this->assertEquals('foobar', $container->getAlias('sfk_email_template.loader'));
    }
}