<?php

namespace MyVendor\MySirenApi\Module;

use BEAR\QueryRepository\HttpCacheInject;
use BEAR\Sunday\Extension\Application\AbstractApp;
use Ray\Di\Di\Inject;

class App extends AbstractApp
{
    use HttpCacheInject;
}
