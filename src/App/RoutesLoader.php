<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    /**
    * @access private
    */
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();
    }

    private function instantiateControllers()
    {
        $this->app['address.controller'] = function () {
            return new Controllers\AddressController($this->app['address.service']);
        };
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/address', "address.controller:getAll");
        $api->get('/address/{id}', "address.controller:getOne");
        $api->post('/address', "address.controller:save");
        $api->put('/address/{id}', "address.controller:update");
        $api->delete('/address/{id}', "address.controller:delete");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}
