<?php
namespace Ahuang\LoremIpsumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Ahuang\LoremIpsumBundle\DependencyInjection\AhuangLoremIpsumExtension;
use Ahuang\LoremIpsumBundle\DependencyInjection\Compiler\WordProviderCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AhuangLoremIpsumBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new WordProviderCompilerPass());
    }

    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new AhuangLoremIpsumExtension();
        }
        // $this->extension = new KnpULoremIpsumExtension();
        // var_dump($this->extension);die;
        return  $this->extension;
    }
}