<?php

namespace Ahuang\LoremIpsumBundle\Event;

final class AhuangLoremIpsumEvents
{

    /**
     *   Called directllyy before the Lorem Ipsum APi data is returned.
     *
     * Listeners have the opportunty to change that data
     *
     * @Event("Ahuang\LoremIpsumBundle\Event\FilterApiResponseEvent")
     */
    const FILTER_API = 'ahuang_lorem_ipsum.filter_api';


}