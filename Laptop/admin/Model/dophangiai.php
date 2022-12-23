<?php

require_once('C:/xampp/htdocs/Laptop/db.php');

class Dophangiai extends DBa
{
    const tableName = 'dophangiai';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $dophangiaiName = $payload['dophangiaiName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(dpg_name)
             VALUES(:dophangiaiName)');
                $stm->execute(array(
                    ':dophangiaiName' => $dophangiaiName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE dpg_id = " . $id);
    }

    function update($payload)
    {
        try {
            $dpg_name = $payload['dophangiaiName'];
            $id = $payload['dpg_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET     dpg_name = :dophangiaiName 
                    WHERE 
                        dpg_id = :dpg_id'); 
            $stm->execute(array(
                ':dophangiaiName' => $dpg_name,  
                ':dpg_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getDophangiaiById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE dpg_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
