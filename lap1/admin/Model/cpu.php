<?php

require_once('C:/xampp/htdocs/lap1/db.php');

class Cpu extends DBa
{
    const tableName = 'cpu';
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
            $cpuName = $payload['cpuName'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(cpu_name)
             VALUES(:cpuName)');
                $stm->execute(array(
                    ':cpuName' => $cpuName

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE cpu_id = " . $id);
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
            $cpuName = $payload['cpu_name'];
            $id = $payload['cpu_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET     cpu_name = :cpuName 
                    WHERE 
                        cpu_id = :cpu_id'); 
            $stm->execute(array(
                ':cpuName' => $cpuName,  
                ':cpu_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getCpuById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE cpu_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
