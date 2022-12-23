<?php

require_once('C:/xampp/htdocs/Laptop/db.php');

class Nhucau extends DBa
{
    const tableName = 'nhucau';

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

    function update($payload)
    {
        try {
            $nc_name = $payload['nhucauName'];
            $nc_id = $payload['nc_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    nc_name = :nhucauName 
                WHERE 
                    nc_id = :nc_id');
            $stm->execute(array(
                ':nhucauName' => $nc_name, 
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
            $rows  = $r;
        }
        return $r;
    }


}

