<?php
namespace Ahuang\LoremIpsumBundle\Tests;

use Ahuang\LoremIpsumBundle\AhuangLoremIpsumBundle;
use Ahuang\LoremIpsumBundle\KnpUIpsum;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class FunctionalTest extends TestCase
{

    public function testServiceWiring()
    {
        $kernel = new AhuangLoremIpsumTestKernel('test',true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $ipsum =$container->get('ahuang_lorem_ipsum.ahuang_ipsum');

        $this->assertInstanceOf(KnpUIpsum::class, $ipsum);
        $this->assertIsString($ipsum->getParagraphs());

    }

}



class AhuangLoremIpsumTestKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new AhuangLoremIpsumBundle(),
        ];
    }
    public function registerContainerConfiguration(LoaderInterface $loader)
    {

    }
}