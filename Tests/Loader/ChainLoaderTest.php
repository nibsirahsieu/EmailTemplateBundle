<?php

namespace Sfk\EmailTemplateBundle\Tests\Loader;

use Sfk\EmailTemplateBundle\Loader\ChainLoader;
use Sfk\EmailTemplateBundle\Loader\LoaderInterface;

/**
 * ChainLoaderTest
 * 
 */
class ChainLoaderTest extends \PHPUnit_Framework_TestCase
{
    protected $loader;

    public function setUp()
    {
        $this->loader = new ChainLoader();
    }

    public function testDefault()
    {
        $this->assertTrue(is_array($this->loader->getLoaders()));
        $this->assertEquals(0, count($this->loader->getLoaders()));
    }

    public function testAddInvalidLoaderException()
    {
        try {
            $this->loader->addLoader(new InvalidLoaderClass());
        } catch (\Exception $expected) {
            return;
        }

        $this->fail('An expected exception has not been raised.');
    }

    public function testAddValidLoaderException()
    {
        $this->loader->addLoader(new ValidLoaderClass());

        $this->assertEquals(1, count($this->loader->getLoaders()));
    }
}

class InvalidLoaderClass
{

}

class ValidLoaderClass implements LoaderInterface {
    public function load($name, array $parameters = array())        
    {

    }
}