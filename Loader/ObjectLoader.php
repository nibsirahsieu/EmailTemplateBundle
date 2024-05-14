<?php

namespace Sfk\EmailTemplateBundle\Loader;

use Sfk\EmailTemplateBundle\Template\EmailTemplateInterface;
use Sfk\EmailTemplateBundle\Template\EmailTemplate;
use Twig\Environment;

/**
 * ObjectLoader
 *
 */
class ObjectLoader implements LoaderInterface
{
    protected $twig;


    public function __construct(Environment $twig)
    {
        $this->twig = clone $twig;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function load($templateName, array $parameters = array()): EmailTemplateInterface
    {
        if (!$templateName instanceof EmailTemplateInterface) {
            throw new \InvalidArgumentException(sprintf('Instance of "EmailTemplateInterface" expected, "%s" given.', gettype($templateName)));
        }

        $from = $this->twig->render($templateName->getFrom(), $parameters);
        $cc = $this->twig->render($templateName->getCc(), $parameters);
        $bcc = $this->twig->render($templateName->getBcc(), $parameters);
        $subject = $this->twig->render($templateName->getSubject(), $parameters);
        $body = $this->twig->render($templateName->getBody(), $parameters);

        return new EmailTemplate(
            $from,
            $subject,
            $body,
            $cc,
            $bcc
        );
    }
}
