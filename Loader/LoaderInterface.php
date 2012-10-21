<?php

namespace Sfk\EmailTemplateBundle\Loader;

use Sfk\EmailTemplateBundle\Template\EmailTemplate;

/**
 * LoaderInterface
 * 
 */
interface LoaderInterface 
{
    /**
     * Load email template
     *
     * @param string $templateName Template to load
     * @param array $parameters Template parameters
     * 
     * @return EmailTemplate
     */
    function load($templateName, array $parameters = array());
}