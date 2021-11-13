<?php

namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

class KnpULoremIpsumExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // var_dump('We\'re alive!');die;
        // var_dump($configs); die;

        // $loader = new XmlFileLoader($container,new FileLocator(__DIR__ . '/../Resources/config'));
        // $loader->load('services.xml');

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs,$container);
        $config = $this->processConfiguration($configuration,$configs);

        // var_dump($config);die;

        $definition = $container->getDefinition('knpu_lorem_ipsum.knpu_ipsum');

        if(null!== $config['word_provider'])
        {
            // $definition->setArgument(0, new Reference($config['word_provider']) );
            $container->setAlias('knpu_lorem_ipsum.word_provider', $config['word_provider']);
        }

        $definition->setArgument(1, $config['unicorns_are_real']);
        $definition->setArgument(2, $config['min_sunshine']);

    }

    public function getAlias()
    {
        return 'knpu_lorem_ipsum';
    }

}
