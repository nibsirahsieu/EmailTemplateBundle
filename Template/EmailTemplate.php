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
     * Cc email address
     * 
     * @var string
     */
    protected $cc;

    /**
     * Bcc email address
     * 
     * @var string
     */
    protected $bcc;

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
     * @param string $cc
     * @param string $bcc
     */
    public function __construct($from, $subject, $body, $cc = null, $bcc = null)
    {
        $this->from = $from;
        $this->subject = $subject;
        $this->body = $body;
        $this->cc = $cc;
        $this->bcc = $bcc;
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
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * {@inheritdoc}
     * 
     */
    public function getBcc()
    {
        return $this->bcc;
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