<?php
declare(strict_types=1);
namespace App\Services;

class AddressService extends BaseService
{
    /**
     * get one address from zintec DB
     * @param int $id
     * @return array
     */
    public function getOne(int $id):array
    {
        return $this->db->fetchAssoc("SELECT * FROM zintec WHERE id=?", [(int) $id]);
    }

    /**
     * get all addresses
     * @return array
     */
    public function getAll():array
    {
        return $this->db->fetchAll("SELECT * FROM zintec");
    }

    /**
     * Save new address
     * @param array $address
     * @return array
     */
    public function save(array $address):array
    {
        $this->db->insert("zintec", $address);
        return $this->db->lastInsertId();
    }

    /**
    * Update address
    * @param int $int
    * @param array $address
    * @return int
    */
    public function update(int $id, array $address):int
    {
        $dateTime = new \DateTime();
        $address["updated_at"] = $dateTime->format('Y-m-d H:i:s');
        return $this->db->update('zintec', $address, ['id' => $id]);
    }

    /**
    * Delete address
    * @param int $int
    * @return int
    */
    public function delete(int $id):int
    {
        return $this->db->delete("zintec", array("id" => $id));
    }
}
