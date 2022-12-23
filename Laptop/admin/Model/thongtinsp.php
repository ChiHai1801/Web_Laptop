<?php
require_once('C:/xampp/htdocs/Laptop/db.php');
class TTsanpham extends DBa
{
    const tableName = 'thongtinsp';

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
            $thongtinspxuatxu = $payload['thongtinspxuatxu'];
            $thongtinspName = $payload['thongtinspName'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(
                    lt_id, tt_xuatxu, tt_thongtinsp)
             VALUES(
                :lt_id, :thongtinspxuatxu, :thongtinspName)');
            $stm->execute(array(
                ':lt_id' => $lt_id,
                ':thongtinspxuatxu' => $thongtinspxuatxu,
                ':thongtinspName' => $thongtinspName


            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE tt_id = " . $id);
    }

    function update($payload)
    {
        try {
            $ts_name = $payload['tangsoquetName'];
            $id = $payload['ts_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET   
                tt_name = :tangsoquetName 
                WHERE 
                    tt_id = :ts_id'); 
            $stm->execute(array(
                ':tangsoquetName' => $ts_name,  
                ':tt_id' => $id
            )); 
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getthongtinspById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE tt_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
