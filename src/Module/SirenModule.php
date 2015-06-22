<?php

namespace MyVendor\MySirenApi\Module;

use BEAR\SirenModule\SirenModule as Siren;
use Ray\Di\AbstractModule;

class SirenModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new Siren);
    }
}