<?php
namespace Ahuang\LoremIpsumBundle\Tests;

use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use Ahuang\LoremIpsumBundle\KnpUIpsum;
use Symfony\Component\HttpKernel\Kernel;
use Ahuang\LoremIpsumBundle\WordProviderInterface;
use Ahuang\LoremIpsumBundle\AhuangLoremIpsumBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FunctionalTest extends TestCase
{

    protected function tearDown():void
    {
        $dir = __DIR__ . '\\cache';
        exec('rm -rf '.$dir);

        // if(is_dir($dir))
        // {
        //     $files = glob($dir.'\*'); // get all file names
        //     foreach ($files as $file) { // iterate files
        //         if (is_file($file)) {
        //             echo $file . "\n";
        //             // unlink($file); // delete file
        //         }
        //     }
        //     // rmdir($dir);
        // }
    }

    public function testServiceWiring()
    {
        $kernel = new AhuangLoremIpsumTestKernel();
        $kernel->boot();

        $container = $kernel->getContainer();

        $ipsum =$container->get('ahuang_lorem_ipsum.ahuang_ipsum');

        $this->assertInstanceOf(KnpUIpsum::class, $ipsum);
        $this->assertIsString($ipsum->getParagraphs());

    }

    public function testServiceWiringWithConfiguration()
    {
        $kernel = new AhuangLoremIpsumTestKernel([
            'word_provider' => 'stub_word_list',
        ]);
        $kernel->boot();

        $container = $kernel->getContainer();

        $ipsum = $container->get('ahuang_lorem_ipsum.ahuang_ipsum');

        $this->assertStringContainsString('stub',$ipsum->getWords(2));

    }
}



class AhuangLoremIpsumTestKernel extends Kernel
{
    private $ahuangIpsumConfig;

    public function __construct(array $ahuangIpsumConfig = [])
    {

        $this->ahuangIpsumConfig = $ahuangIpsumConfig;

        $environment = 'test';
        $debug = true;
        parent::__construct($environment,$debug);
    }

    public function registerBundles()
    {
        return [
            new AhuangLoremIpsumBundle(),
            new FrameworkBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function(ContainerBuilder $container){
            $container->register('stub_word_list',StubWordList::class);

            $container->loadFromExtension('ahuang_lorem_ipsum',$this->ahuangIpsumConfig);

        });
    }


    public function getCacheDir()
    {
        return __DIR__.'/cache/'.spl_object_hash($this);
    }


}


class StubWordList implements WordProviderInterface{


    public function getWordList():array
    {
        return [
            'stub',
            'stub2',
        ];
    }

}