<?php
namespace App;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {
        $this->app['address.service'] = function () {
            return new Services\AddressService($this->app["db"]);
        };
    }
}
