<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController
{
    /**
     * @var addressService
     * @access protected
     */
    protected $addressService;

    public function __construct($service)
    {
        $this->addressService = $service;
    }

    /**
     *  Get all addresses
     */
    public function getAll()
    {
        return new JsonResponse($this->addressService->getAll());
    }

    /**
    *  Get one concrete address
    * @param int $id
    */
    public function getOne($id)
    {
        return new JsonResponse($this->addressService->getOne($id));
    }

    /**
    *  Save request
    * @param Request $request
    */
    public function save(Request $request)
    {
        $address = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->addressService->save($address)));
    }

    /**
     *  Update request
     * @param int $id
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $address = $this->getDataFromRequest($request);
        $this->addressService->update($id, $address);
        return new JsonResponse($address);
    }

    /**
     *  Delete request
     * @param int $id
     */
    public function delete($id)
    {
        $this->addressService->delete($id);
        return new JsonResponse(array("message" => "Address with ID ".$id." deleted"));
    }

    /**
     *  Create address data array from request
     * @param Request $request
     * @return array
     */
    public function getDataFromRequest(Request $request) : array
    {
        return $address = array(
            "name" => $request->request->get("name"),
            "point_address" => $request->request->get("point_address")
        );
    }
}
