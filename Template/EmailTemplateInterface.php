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
     * CC address
     * 
     * @return string
     */
    function getCc();

    /**
     * Bcc address
     * 
     * @return string
     */
    function getBcc();

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