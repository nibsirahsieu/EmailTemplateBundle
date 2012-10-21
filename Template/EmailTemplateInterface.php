<?php

namespace Sfk\EmailTemplateBundle\Template;

/**
 * EmailTemplateInterface
 * 
 */
interface EmailTemplateInterface
{
    /**
     * From email address
     * 
     * @return string
     */
    function getFrom();

    /**
     * Email subject
     * 
     * @return string
     */
    function getSubject();

    /**
     * Email body
     * 
     * @return string
     */
    function getBody();
}