<?php
require_once('C:/xampp/htdocs/lap1/db.php');
class Thuonghieu extends DBa
{
    const tableName = 'thuonghieu';
    // public function __construct()
    // {
        // parent::__construct();
        // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }
// 
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
            $thuonghieuName = $payload['thuonghieuName'];
            $file = $payload['file']; 
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(th_name,img)
             VALUES(:thuonghieuName,:file)');
            $stm->execute(array(
                ':thuonghieuName' => $thuonghieuName,
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
        $this->db->query("DELETE FROM " . self::tableName . " WHERE th_id = " . $id);
    }
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE th_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }

    function update($payload)
    {
        try {
            $thuonghieulogo = $payload['file'];
            $id = $payload['th_id'];
            $thuonghieuName = $payload['th_name'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET 
                    th_name = thuonghieuName, 
                    img = :thuonghieulogo
                WHERE 
                    th_id = :id');
            $stm->execute(array( 
                ':thuonghieuName' => $thuonghieuName, 
                ':thuonghieulogo' => $thuonghieulogo , 
                ':hth_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $stm->rowCount();
    }
    // function getBrandById($id)
    // {
        // $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE th_id= $id");
        // foreach ($rows as $r8) {
            // $row  = $r8;
        // }
        // return $r8;
    // }

    function getThuongHieuById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE th_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
}
