<?php
require_once('C:/xampp/htdocs/Laptop/db.php');
class Tangsoquet extends DBa
{
    const tableName = 'tangsoquet';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $tangsoquetName = $payload['tangsoquetName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(ts_tangso)
             VALUES(
                    :tangsoquetName)');
            $stm->execute(array(
                ':tangsoquetName' => $tangsoquetName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE ts_id = " . $id);
    }
    
    function update($payload)
    {
        try {
            $ts_tangso = $payload['tangsoquetName'];
            $id = $payload['ts_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET   
                ts_tangso = :tangsoquetName 
                WHERE 
                    ts_id = :ts_id'); 
            $stm->execute(array(
                ':tangsoquetName' => $ts_tangso,  
                ':ts_id' => $id
            )); 
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function gettangsoquetById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE ts_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
