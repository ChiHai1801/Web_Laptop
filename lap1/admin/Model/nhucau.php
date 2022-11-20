<?php

require_once('C:/xampp/htdocs/lap1/db.php');

class Nhucau extends DBa
{
    const tableName = 'nhucau';

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
            $nhucauName = $payload['nc_name'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(nc_name)
             VALUES(:nc_name)');
            $stm->execute(array(
                ':nc_name' => $nhucauName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE nc_id = " . $id);
    }
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE nc_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $nhucauName = $payload['nc_name'];
            $nc_id = $payload['nc_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    nc_name = :nc_name 
                WHERE 
                    nc_id = :id');
            $stm->execute(array(
                ':nc_name' => $nhucauName, 
                ':nc_id' => $nc_id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $stm->rowCount();
    }
    function getnhucauById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE nc_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }


}

