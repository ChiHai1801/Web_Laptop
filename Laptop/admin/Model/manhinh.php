<?php

require_once('C:/xampp/htdocs/Laptop/db.php');

class Manhinh extends DBa
{
    const tableName = 'manhinh';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $manhinhName = $payload['manhinhName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(mh_kichthuoc)
             VALUES(:manhinhName)');
            $stm->execute(array(
                ':manhinhName' => $manhinhName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE mh_id = " . $id);
    }

    function update($payload)
    {
        try {
            $mh_kichthuoc = $payload['manhinhName'];
            $id = $payload['mh_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                mh_kichthuoc = :manhinhName 
                WHERE 
                    mh_id = :mh_id'
                );
            $stm->execute(array(
                ':manhinhName' => $mh_kichthuoc,  
                ':mh_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getmanhinhById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE mh_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
