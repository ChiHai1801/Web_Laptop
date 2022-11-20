<?php

require_once('C:/xampp/htdocs/lap1/db.php');

class Manhinh extends DBa
{
    const tableName = 'manhinh';
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
            $manhinh = $payload['manhinh'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(mh_kichthuoc)
             VALUES(:manhinh)');
            $stm->execute(array(
                ':manhinh' => $manhinh

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
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE mh_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }
    function update($payload)
    {
        try {
            $manhinh = $payload['mh_kichthuoc'];
            $id = $payload['mh_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    name = :manhinh 
                WHERE 
                    mh_id = :mh_id'
                );
            $stm->execute(array(
                ':manhinh' => $manhinh,  
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
            $row  = $r;
        }
        return $r;
    }
}
