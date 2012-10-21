<?php

namespace Sfk\EmailTemplateBundle\Template;

/**
 * EmailTemplate
 * 
 */
class EmailTemplate implements EmailTemplateInterface
{
    /**
     * From email address
     * 
     * @var string
     */
    protected $from;

    /**
     * Email subject
     * 
     * @var string
     */
    protected $subject;

    /**
     * Email body
     * 
     * @var string
     */
    protected $body;


    /**
     * Constructor
     * 
     * @param string $from
     * @param string $subject
     * @param string $body
     */
    public function __construct($from, $subject, $body)
    {
        $this->from = $from;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * {@inheritdoc}
     * 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
     * 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * {@inheritdoc}
     * 
     */
    public function getBody()
    {
        return $this->body;
    }
}