<?php

namespace Ahuang\LoremIpsumBundle\Controller;

use Ahuang\LoremIpsumBundle\KnpUIpsum;
use Ahuang\LoremIpsumBundle\Event\FilterApiResponseEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IpsumApiController extends AbstractController
{
    protected $knpUIpsum;
    protected $eventDispatcher;

    public function __construct(KnpUIpsum $knpUIpsum,EventDispatcherInterface $eventDispatcher = null)
    {
        $this->knpUIpsum = $knpUIpsum;
        $this->eventDispatcher = $eventDispatcher;
    }


    public function index()
    {
        $data = [
            'paragraphs' => $this->knpUIpsum->getParagraphs(3),
            'sentences' => $this->knpUIpsum->getSentences(3),
        ];

        $event = new FilterApiResponseEvent($data);
        // $this->eventDispatcher->dispatch('ahuang_lorem_ipsum.filter_api', $event);
        if($this->eventDispatcher){
            $this->eventDispatcher->dispatch($event);
        }

        return $this->json($event->getData());
    }

}