<?php
require_once('C:/xampp/htdocs/Laptop/db.php');

class Gia extends DBa
{
    const tableName = 'gia';
    
    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            // $lt_id = $payload['lt_id'];
            $giaht = $payload['giaht'];
            $ngayht = $payload['ngayht'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '( gia, ngay)
             VALUES( :giaht, :ngayht)');
            $stm->execute(array(
                // ':lt_id' => $lt_id,
                ':giaht' => $giaht,
                ':ngayht' => $ngayht
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        //tra ve so ban ghi
        return $stm->rowCount();
    }


    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE gia_id = " . $id);
    }

    function update($payload)
    {
        try {
            $gia = $payload['giaht'];
            $ngay = $payload['ngayht'];
            
            $id = $payload['gia_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET 
                    gia = giaht,
                    ngay = ngayht
                WHERE 
                    gia_id = :gia_id');
            $stm->execute(array(
                ':giaht' => $gia,
                ':ngayht' => $ngay,

                ':gia_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getGiaById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE gia_id = $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
