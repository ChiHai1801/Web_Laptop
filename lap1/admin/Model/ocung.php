<?php
require_once('C:/xampp/htdocs/lap1/db.php');
class Ocung extends DBa
{
    const tableName = 'ocung';
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
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE oc_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $ocungName = $payload['oc_name'];
            $id = $payload['oc_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    name = :ocungName 
                WHERE 
                    oc_id = :oc_id'); 
            $stm->execute(array(
                ':ocungName' => $ocungName, 
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
            $row  = $r;
        }
        return $r;
    }
}
