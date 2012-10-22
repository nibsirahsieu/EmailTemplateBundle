<?php

namespace Sfk\EmailTemplateBundle\Entity;

/**
 * TemplateClass
 *
 */
class TemplateClass
{
    /**
     * @var integer $id
     * 
     */
    protected $id;

    /**
     * @var string $template
     *
     */
    protected $template;

    /**
     * @var string $objectClass
     *
     */
    protected $object_class;

    /**
     * @var string $object_id
     *
     */
    protected $object_id;


    /**
     * Set template
     * 
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * Get template
     * 
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set object_class
     * 
     * @param string $objectClass
     */
    public function setObjectClass($objectClass)
    {
        $this->object_class = $objectClass;
    }

    /**
     * Get object_class
     * 
     * @return string
     */
    public function getObjectClass()
    {
        return $this->object_class;
    }

    /**
     * Set object_id
     * 
     * @param string $objectId
     */
    public function setObjectId($objectId)
    {
        $this->object_id = $objectId;
    }

    /**
     * Get object_id
     * 
     * @return string
     */
    public function getObjectId()
    {
        return $this->object_id;
    }
}