<?php

namespace Tests\Services;

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use App\Services\AddressService;

class AddressServiceTest extends \PHPUnit_Framework_TestCase
{
    private $addressService;

    public function setUp()
    {
        $app = new Application();
        $app->register(new DoctrineServiceProvider(), array(
            "db.options" => array(
                "driver" => "pdo_sqlite",
                "memory" => true
            ),
        ));
        $this->addressService = new AddressService($app["db"]);

        $stmt = $app["db"]->prepare("CREATE TABLE zintec (id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR NOT NULL,
        point_address  VARCHAR ,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP)");
        $stmt->execute();

        $stmt = $app["db"]->prepare("INSERT INTO zintec  (name, point_address) values('Точка 1', 'Адрес точка 1')");
        $stmt->execute();
    }

    public function testGetOne()
    {
        $data = $this->addressService->getOne(1);
        $this->assertEquals('Точка 1', $data['name']);
    }

    public function testGetAll()
    {
        $data = $this->addressService->getAll();
        $this->assertNotNull($data);
    }

    public function testSave()
    {
        $address = array("name" =>"Точка 1", "point_address"=>"Адрес точка 1");
        $data = $this->addressService->save($address);
        $data = $this->addressService->getAll();
        $this->assertEquals(2, count($data));
    }
    
    public function testUpdate()
    {
        $address = array("name" => "точка 1");
        $this->addressService->save($address);
        $address = array("name" => "точка 2");
        $this->addressService->update(1, $address);
        $data = $this->addressService->getAll();
        $this->assertEquals("точка 2", $data[0]["name"]);
    }
    
    public function testDelete()
    {
        $address = array("name" => "точка 1");
        $this->addressService->save($address);
        $this->addressService->delete(1);
        $data = $this->addressService->getAll();
        $this->assertEquals(1, count($data));
    }
}
