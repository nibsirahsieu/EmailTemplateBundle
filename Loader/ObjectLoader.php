<?php

namespace Sfk\EmailTemplateBundle\Loader;

use Sfk\EmailTemplateBundle\Template\EmailTemplateInterface;
use Sfk\EmailTemplateBundle\Template\EmailTemplate;

/**
 * ObjectLoader
 * 
 */
class ObjectLoader implements LoaderInterface 
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
        $this->twig = clone $twig;

        $this->twig->setLoader(new \Twig_Loader_String());
    }

    /**
     * {@inheritdoc}
     *
     */
    public function load($templateName, array $parameters = array())
    {
        if (!$templateName instanceof EmailTemplateInterface) {
            throw new \InvalidArgumentException(sprintf('Instance of "EmailTemplateInterface" expected, "%s" given.', gettype($templateName)));
        }

        $from = $this->twig->render($templateName->getFrom(), $parameters);
        $subject = $this->twig->render($templateName->getSubject(), $parameters);
        $body = $this->twig->render($templateName->getBody(), $parameters);
        
        return new EmailTemplate(
            $from, 
            $subject, 
            $body
        );
    }
}