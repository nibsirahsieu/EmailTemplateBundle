<?php

namespace Sfk\EmailTemplateBundle\Tests\Loader;

/**
 * TwigLoaderTest
 * 
 */
class TwigLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadTemplate()
    {
        $twig = $this->getMockBuilder('Twig_Environment')
            ->disableOriginalConstructor()
            ->setMethods(array('renderBlock', 'loadTemplate'))
            ->getMock()
        ;

        $twigTemplate = $this->getMockBuilder('Twig_Template')
            ->disableOriginalConstructor()
            ->setMethods(array('renderBlock'))
            ->getMock()
        ;

        $twig->expects($this->once())
            ->method('loadTemplate')
            ->will($this->returnValue($twigTemplate))
        ;

        $htmlTemplate = array(
            'from' => 'example@example.com',
            'subject' => 'Thanks for registering!',
            'body' => 'Body text'
        );

        $twigTemplate->expects($this->exactly(3))
            ->method('renderBlock')
            ->with($this->logicalOr('from', 'subject', 'body'))
            ->will($this->returnCallback(function($block, $params) use ($htmlTemplate){
                return $htmlTemplate[$block];
            }))
        ;
        
        $loader = $this->getMockBuilder('Sfk\EmailTemplateBundle\Loader\TwigLoader')
            ->setConstructorArgs(array($twig))
            ->setMethods(null)
            ->getMock()
        ;

        $template = $loader->load('email.html.twig');

        $this->assertInstanceOf('Sfk\EmailTemplateBundle\Template\EmailTemplateInterface', $template);
        $this->assertEquals('example@example.com', $template->getFrom());
        $this->assertEquals('Thanks for registering!', $template->getSubject());
        $this->assertEquals('Body text', $template->getBody());
    }
}