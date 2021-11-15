<?php

namespace Ahuang\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        /** Symfony 4.3 and above */
        // $treeBuilder = new TreeBuilder('ahuang_lorem_ipsum');
        // $rootNode = $treeBuilder->getRootNode();


        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ahuang_lorem_ipsum');
        $rootNode
            ->children()
                ->booleanNode('unicorns_are_real')->defaultTrue()->info('Whether or not you believe in unicorns')->end()
                ->integerNode('min_sunshine')->defaultValue(3)->info('How much do you like sunshine')->end()
                // ->scalarNode('word_provider')->defaultNull()->end()
            ->end();

        return $treeBuilder;

    }

}