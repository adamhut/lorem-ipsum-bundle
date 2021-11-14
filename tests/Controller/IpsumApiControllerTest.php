<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Bundle\FrameworkBundle\Client;
use Ahuang\LoremIpsumBundle\AhuangLoremIpsumBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Routing\RouteCollectionBuilder;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class IpsumApiControllerTest extends WebTestCase
{


    public function testIndex()
    {
        $kernel = new AhuangLoremIpsumControllerKernel();

        $client = new Client($kernel);
        // $client = static::createClient();

        $client->request('GET', '/api/');

        // var_dump($client->getResponse()->getStatusCode());
        $this->assertSame(200,$client->getResponse()->getStatusCode());
        // $kernel->boot();


    }
}


class AhuangLoremIpsumControllerKernel extends Kernel
{

    use MicroKernelTrait;

    public function __construct()
    {
        $environment = 'test';
        $debug = true;
        parent::__construct($environment, $debug);
    }

    public function registerBundles()
    {
        return [
            new AhuangLoremIpsumBundle(),
            new FrameworkBundle(),
        ];
    }

    // public function registerContainerConfiguration(LoaderInterface $loader)
    // {
    //     $loader->load(function (ContainerBuilder $container) {
    //         // $container->register('stub_word_list', StubWordList::class);
    //         // $container->loadFromExtension('ahuang_lorem_ipsum', $this->ahuangIpsumConfig);
    //     });
    // }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import(__DIR__.'/../../src/Resources/config/routes.yaml','/api');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'F00'
        ]);
    }

    public function getCacheDir()
    {
        return __DIR__ . '/cache/' . spl_object_hash($this);
    }
}


