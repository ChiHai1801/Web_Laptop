<?php

require_once('C:/xampp/htdocs/lap1/db.php');

class Maumay extends DBa
{
    const tableName = 'maumay';
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
            $cpuName = $payload['maumayName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(mm_mau)
             VALUES(
                :maumayName)');
            $stm->execute(array(
                ':maumayName' => $cpuName
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE mm_id = " . $id);
    }
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE mm_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $maumayName = $payload['mm_mau'];
            $id = $payload['mm_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    mm_mau = :maumayName 
                WHERE 
                    mm_id = :mm_id'); 
            $stm->execute(array(
                ':maumayName' => $maumayName, 
                ':mm_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getmaumayById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE mm_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
}
