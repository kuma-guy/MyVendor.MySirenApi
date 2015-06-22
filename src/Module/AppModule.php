<?php

namespace MyVendor\MySirenApi\Module;

use BEAR\Package\PackageModule;
use Ray\Di\AbstractModule;
use Ray\AuraSqlModule\AuraSqlModule;

class AppModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new PackageModule);

        $dbConfig = 'sqlite:' . dirname(dirname(__DIR__)). '/var/db/post.sqlite3';
        $this->install(new AuraSqlModule($dbConfig));
    }
}