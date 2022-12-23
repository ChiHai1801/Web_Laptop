<?php
require_once('C:/xampp/htdocs/Laptop/db.php');

class Hinhanh extends DBa
{
    const tableName = 'hinhanh';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $lt_id = $payload['lt_id'];
            $file = $payload['file'];
            $gia_id = $payload['gia_id'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(lt_id,img, gia_id)
             VALUES(:lt_id,:file, :gia_id)');
            $stm->execute(array(
                ':lt_id' => $lt_id,
                ':file' => $file,
                ':gia_id' => $gia_id

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
    
    function update($payload)
    {
        try {
            $lt_id = $payload['lt_id'];
            $hinhanhName = $payload['ha_name'];
            $hinhanhLogo = $payload['file'];
            $id = $payload['ha_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET 
                    lt_id = lt_id,
                    ha_name = hinhanhName, 
                    img = :hinhanhlogo 
                WHERE 
                    ha_id = :id');
            $stm->execute(array( 
                ':lt_id' => $lt_id,   
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
            $rows  = $r;
        }
        return $r;
    }
}
