<?php
require_once('C:/xampp/htdocs/Laptop/db.php');
class Ocung extends DBa
{
    const tableName = 'ocung';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $ocungName = $payload['ocungName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(oc_name)
             VALUES(:ocungName)');
            $stm->execute(array(
                ':ocungName' => $ocungName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE oc_id = " . $id);
    }

    function update($payload)
    {
        try {
            $oc_name = $payload['ocungName'];
            $id = $payload['oc_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    oc_name = :ocungName 
                WHERE 
                    oc_id = :oc_id'); 
            $stm->execute(array(
                ':ocungName' => $oc_name, 
                ':oc_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getocungById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE oc_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
