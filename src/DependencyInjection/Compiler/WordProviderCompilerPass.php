<?php

namespace Ahuang\LoremIpsumBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class WordProviderCompilerPass implements CompilerPassInterface{

    public function process(ContainerBuilder $container)
    {

        $definition = $container->getDefinition('ahuang_lorem_ipsum.ahuang_ipsum');

        $references = [];

        foreach ($container->findTaggedServiceIds('ahuang_ispum_word_provider') as $id => $tags) {
            # code...
            $references[] = new Reference($id);
            // var_dump($id);

        }
        $definition->setArgument(0,$references);
        // die;
    }

}