<?php
require_once('C:/xampp/htdocs/lap1/db.php');
class Ram extends DBa
{
    const tableName = 'ram';
    // public function __construct()
    // {
        // parent::__construct();
        // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }

    // function getAll($offset, $count)
    // {
        // $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " LIMIT $offset,$count");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $ramName = $payload['ramName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(ram_dungluong)
             VALUES(:ramName)');
            $stm->execute(array(
                ':ramName' => $ramName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE ram_id = " . $id);
    }
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE ram_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $ramName = $payload['ram_dungluong'];
            $id = $payload['ram_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    name = :ramName 
                WHERE 
                    ram_id = :ram_id'); 
            $stm->execute(array(
                ':ramName' => $ramName, 
                ':ram_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getramById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE ram_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
}
