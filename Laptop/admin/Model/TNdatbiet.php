<?php

require_once('C:/xampp/htdocs/Laptop/db.php');

class TNdatbiet extends DBa
{
    const tableName = 'tinhnangdatbiet';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $TNDBName = $payload['TNDBName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(tn_name)
             VALUES(:TNDBName)');
                $stm->execute(array(
                    ':TNDBName' => $TNDBName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE tn_id = " . $id);
    }

    function update($payload)
    {
        try {
            $tn_name = $payload['TNDBName'];
            $id = $payload['tn_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET     tn_name = :TNDBName 
                    WHERE 
                        tn_id = :tn_id'); 
            $stm->execute(array(
                ':TNDBName' => $tn_name,  
                ':tn_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function gettinhnangdatbietById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE tn_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
