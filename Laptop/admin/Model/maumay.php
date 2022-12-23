<?php

require_once('C:/xampp/htdocs/Laptop/db.php');

class Maumay extends DBa
{
    const tableName = 'maumay';
    
    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $maumayName = $payload['maumayName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(mm_mau)
             VALUES(
                :maumayName)');
            $stm->execute(array(
                ':maumayName' => $maumayName
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

    function update($payload)
    {
        try {
            $mm_mau = $payload['maumayName'];
            $id = $payload['mm_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    mm_mau = :maumayName 
                WHERE 
                    mm_id = :mm_id'); 
            $stm->execute(array(
                ':maumayName' => $mm_mau, 
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
            $rows  = $r;
        }
        return $r;
    }
}
