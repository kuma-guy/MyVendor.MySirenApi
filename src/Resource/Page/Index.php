<?php

namespace MyVendor\MySirenApi\Resource\Page;

use BEAR\Resource\ResourceObject;

class Index extends ResourceObject
{
    public function onGet($name = 'BEAR.Sunday')
    {
        $this['greeting'] = 'Hello ' . $name;

        return $this;
    }
}
