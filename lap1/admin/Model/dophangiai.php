<?php

require_once('C:/xampp/htdocs/lap1/db.php');

class Dophangiai extends DBa
{
    const tableName = 'dophangiai';
    public function __construct()
    {
        parent::__construct();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

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
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE cpu_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $dophangiaiName = $payload['dpg_name'];
            $id = $payload['dpg_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET     dpg_name = :dophangiaiName 
                    WHERE 
                        dpg_id = :dpg_id'); 
            $stm->execute(array(
                ':dophangiaiName' => $dophangiaiName,  
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
            $row  = $r;
        }
        return $r;
    }
}
