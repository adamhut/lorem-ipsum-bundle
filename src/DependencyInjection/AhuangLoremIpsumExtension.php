<?php

namespace Ahuang\LoremIpsumBundle\DependencyInjection;

use Ahuang\LoremIpsumBundle\WordProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AhuangLoremIpsumExtension extends Extension
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

        $definition = $container->getDefinition('ahuang_lorem_ipsum.ahuang_ipsum');

        // if(null!== $config['word_provider'])
        // {
        //     // $definition->setArgument(0, new Reference($config['word_provider']) );
        //     $container->setAlias('ahuang_lorem_ipsum.word_provider', $config['word_provider']);
        // }

        $definition->setArgument(1, $config['unicorns_are_real']);
        $definition->setArgument(2, $config['min_sunshine']);

        $container->registerForAutoconfiguration(WordProviderInterface::class)
            ->addTag('ahuang_ispum_word_provider');
    }

    public function getAlias()
    {
        return 'ahuang_lorem_ipsum';
    }

}
