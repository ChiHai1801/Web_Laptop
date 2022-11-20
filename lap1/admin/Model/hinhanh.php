<?php
require_once('C:/xampp/htdocs/lap1/db.php');

class Hinhanh extends DBa
{
    const tableName = 'hinhanh';
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
            $hinhanhName = $payload['ha_name'];
            $file = $payload['file']; //logo
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(ha_name,img)
             VALUES(:ha_name,:file)');
            $stm->execute(array(
                ':ha_name' => $hinhanhName,
                ':file' => $file

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE ha_id = " . $id);
    }
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE ha_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $hinhanhName = $payload['ha_name'];
            $hinhanhLogo = $payload['file'];
            $id = $payload['ha_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET 
                    ha_name = hinhanhName, 
                    img = :hinhanhlogo 
                WHERE 
                    ha_id = :id');
            $stm->execute(array( 
                ':hinhanhName' => $hinhanhName,
                ':hinhanhlogo' => $hinhanhLogo, 
                ':ha_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function gethinhanhById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE ha_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
}
