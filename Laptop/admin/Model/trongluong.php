<?php

require_once('C:/xampp/htdocs/Laptop/db.php');

class Trongluong extends DBa
{
    const tableName = 'trongluong';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $trongluongName = $payload['trongluongName']; 
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(tl_trongluong)
             VALUES(:trongluongName)');
            $stm->execute(array(
                ':trongluongName' => $trongluongName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE tl_id = " . $id);
    }

    function update($payload)
    {
        try {
            $tl_trongluong = $payload['trongluongName'];
            $id = $payload['tl_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                tl_trongluong = :trongluongName 
                WHERE 
                    tl_id = :tl_id');
            $stm->execute(array(
                ':trongluongName' => $tl_trongluong, 
                ':tl_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function gettrongluongById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE tl_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
