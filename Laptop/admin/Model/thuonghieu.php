<?php
require_once('C:/xampp/htdocs/Laptop/db.php');


class Thuonghieu extends DBa
{
    const tableName = 'thuonghieu';
    
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
    function getProduct($id)
    {
        $stm = $this->db->prepare("SELECT * FROM laptop WHERE th_id= $id");
        $stm->execute();
        return $stm->fetchAll();
    }

    function update($payload)
    {
        try {
            $thuonghieulogo = $payload['file'];
            $thuonghieuName = $payload['thuonghieuName'];
            $id = $payload['th_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET 
                    th_name = thuonghieuName, 
                    img = :thuonghieulogo
                WHERE 
                    th_id = :th_id');
            $stm->execute(array( 
                ':thuonghieuName' => $thuonghieuName, 
                ':thuonghieulogo' => $thuonghieulogo , 
                ':th_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        return $stm->rowCount();
    }

    function getThuongHieuById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE th_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
