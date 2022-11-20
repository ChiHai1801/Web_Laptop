<?php

require_once('C:/xampp/htdocs/lap1/db.php');

class Trongluong extends DBa
{
    const tableName = 'trongluong';
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
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE tl_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $trongluongName = $payload['tl_trongluong'];
            $id = $payload['tl_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    name = :trongluongName 
                WHERE 
                    tl_id = :tl_id');
            $stm->execute(array(
                ':trongluongName' => $trongluongName, 
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
            $row  = $r;
        }
        return $r;
    }
}
