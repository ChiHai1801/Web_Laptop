<?php
require_once('C:/xampp/htdocs/lap1/db.php');
class Tangsoquet extends DBa
{
    const tableName = 'tangsoquet';
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
            $tangsoquetName = $payload['tangsoquetName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(
                    tangsoquet_name)
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
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE ts_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $tangsoquetName = $payload['ts_name'];
            $id = $payload['ts_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET   
                    name = :tangsoquetName 
                WHERE 
                    ts_id = :ts_id'); 
            $stm->execute(array(
                ':tangsoquetName' => $tangsoquetName,  
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
            $row  = $r;
        }
        return $r;
    }
}
