<?php

namespace Ahuang\LoremIpsumBundle\Controller;

use Ahuang\LoremIpsumBundle\KnpUIpsum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IpsumApiController extends AbstractController
{
    protected $knpUIpsum;

    public function __construct(KnpUIpsum $knpUIpsum)
    {
        $this->knpUIpsum = $knpUIpsum;
    }


    public function index()
    {
        return $this->json([
            'paragraphs' => $this->knpUIpsum->getParagraphs(3),
            'sentences' => $this->knpUIpsum->getSentences(3),
        ]);
    }

}