<?php

namespace Sfk\EmailTemplateBundle\Loader;

/**
 * ChainLoader
 * 
 */
class ChainLoader implements LoaderInterface 
{
    /**
     * @var array
     * 
     */
    protected $loaders;


    /**
     * Constructor
     * 
     */
    public function __construct()
    {
        $this->loaders = array();
    }

    /**
     * Add loader
     * 
     * @param LoaderInterface $loader
     */
    public function addLoader(LoaderInterface $loader)
    {
        $this->loaders[] = $loader;
    }

    /**
     * Return loaders
     * 
     * @return array
     */
    public function getLoaders()
    {
        return $this->loaders;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function load($templateName, array $parameters = array())
    {
        $templateName = (string) $templateName;
        
        $template = null;
        foreach ($this->loaders as $loader) {
            try {
                $template = $loader->load($templateName, $parameters);

                break;
            } catch (LoaderException $e) {
                 // skip to next
            }
        }

        if (null === $template) {
            throw new LoaderException(sprintf('Could not load "%s" template.', $templateName));
        }

        return $template;
    }
}