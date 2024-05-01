<?php

namespace Sfk\EmailTemplateBundle\Loader;

use Sfk\EmailTemplateBundle\Template\EmailTemplate;
use Twig\Environment;
use Twig\Error\LoaderError;

/**
 * TwigLoader
 *
 */
class TwigLoader implements LoaderInterface
{
    protected $twig;


    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function load($templateName, array $parameters = array())
    {
        $templateName = (string) $templateName;

        try {
            $template = $this->twig->load($templateName);

            $from = $template->renderBlock('from', $parameters);
            $cc = $template->renderBlock('cc', $parameters);
            $bcc = $template->renderBlock('bcc', $parameters);
            $subject = $template->renderBlock('subject', $parameters);
            $body = $template->renderBlock('body', $parameters);
        } catch (LoaderError $e) {
            throw new LoaderException(sprintf('Could not load "%s" template.', $templateName), $e->getCode(), $e);
        }

        return new EmailTemplate(
            $from,
            $subject,
            $body,
            $cc,
            $bcc
        );
    }
}
