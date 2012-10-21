<?php

namespace Sfk\EmailTemplateBundle\Loader;

use Sfk\EmailTemplateBundle\Template\EmailTemplate;

/**
 * TwigLoader
 * 
 */
class TwigLoader implements LoaderInterface 
{
    /**
     * @var \Twig_Environment
     * 
     */
    protected $twig;
    

    /**
     * @param \Twig_Environment $twig
     * 
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function load($templateName, array $parameters = array())
    {
        try {
            $template = $this->twig->loadTemplate($templateName);
                
            $from = $template->renderBlock('from', array());
            $subject = $template->renderBlock('subject', $parameters);
            $body = $template->renderBlock('body', $parameters);
        } catch (\Twig_Error_Loader $e) {
            throw new LoaderException(sprintf('Could not load "%s" template.', $templateName), $e->getCode(), $e);
        }

        return new EmailTemplate(
            $from, 
            $subject, 
            $body
        );
    }
}