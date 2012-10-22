<?php

namespace Sfk\EmailTemplateBundle\Loader;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;

/**
 * DoctrineLoader
 * 
 */
class DoctrineLoader implements LoaderInterface 
{
    /**
     * @var EntityManager
     * 
     */
    protected $em;
    

    /**
     * @param EntityManager $em
     * 
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function load($templateName, array $parameters = array())
    {
        $templateClass = $this->em->getRepository('SfkEmailTemplateBundle:TemplateClass')->findOneBy(array(
            'template' => $templateName,
        ));
        if (null === $templateClass) {
            throw new LoaderException(sprintf('Could not load "%s" template.', $templateName));
        }

        $template = $this->em->getRepository($templateClass->getObjectClass())->find($templateClass->getObjectId());
        if (null === $template) {
            throw new LoaderException(sprintf('Could not find "%s" template record with id "%d".', $templateClass->getObjectClass(), $templateClass->getObjectId()));
        }

        return $template;
    }
}