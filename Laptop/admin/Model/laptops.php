<?php
require_once('C:/xampp/htdocs/Laptop/db.php');

class Laptop extends DBa
{
    const tableName = 'laptop';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $laptopName = $payload['lt_name'];
            
            $th_id = $payload['th_id'];
            $nc_id = $payload['nc_id'];
            $mh_id = $payload['mh_id'];
            $mm_id = $payload['mm_id'];
            $tl_id = $payload['tl_id'];
            $dpg_id = $payload['dpg_id'];
            $cpu_id = $payload['cpu_id'];
            $ram_id = $payload['ram_id'];
            $oc_id = $payload['oc_id'];
            $ts_id = $payload['ts_id'];
            $tn_id = $payload['tn_id'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(
                    lt_name,th_id,
                    nc_id,mh_id,mm_id,tl_id,dpg_id,cpu_id,
                    ram_id,oc_id,ts_id,tn_id)
            VALUES(
                    :lt_name,:th_id,
                    :nc_id,:mh_id,:mm_id,:tl_id,:dpg_id,:cpu_id,
                    :ram_id,:oc_id,:ts_id,:tn_id)');
            $stm->execute(array(
                ':lt_name' => $laptopName,
                ':th_id' => $th_id,
                ':nc_id' => $nc_id,
                ':mh_id' => $mh_id,
                ':mm_id' => $mm_id,
                ':tl_id' => $tl_id,
                ':dpg_id' => $dpg_id,
                ':cpu_id' => $cpu_id,
                ':ram_id' => $ram_id,
                ':oc_id' => $oc_id,
                ':ts_id' => $ts_id,
                ':tn_id' => $tn_id
            ));
            
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE lt_id = " . $id);
    }

    function update($payload)
    {
        try {
            $lt_name = $payload['lt_name'];   

            $th_id = $payload['th_id'];
            $nc_id = $payload['nc_id'];
            $mh_id = $payload['mh_id'];
            $mm_id = $payload['mm_id'];
            $tl_id = $payload['tl_id'];
            $dpg_id = $payload['dpg_id'];
            $cpu_id = $payload['cpu_id'];
            $ram_id = $payload['ram_id'];
            $oc_id = $payload['oc_id'];
            $ts_id = $payload['ts_id'];
            
            $id = $payload['lt_id'];

            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
             SET lt_name=:lt_name, sp_id=:sp_id,sp_id=:sp_id,sp_id=:sp_id,th_id=:th_id,
            nc_id=:nc_id,mh_id=:mh_id,mm_id=:mm_id,tl_id=:tl_id,
            dpg_id=:dpg_id,cpu_id=:cpu_id,ram_id=:ram_id,oc_id=:oc_id,
            ts_id=:ts_id WHERE lt_id = :lt_id');
            $stm->execute(array(
                ':lt_name' => $lt_name,
                ':th_id' => $th_id,
                ':nc_id' => $nc_id,
                ':mh_id' => $mh_id,
                ':mm_id' => $mm_id,
                ':tl_id' => $tl_id,
                ':dpg_id' => $dpg_id,
                ':cpu_id' => $cpu_id,
                ':ram_id' => $ram_id,
                ':oc_id' => $oc_id,
                ':ts_id' => $ts_id,

                ':lt_id' => $id
            ));

        } catch (\Throwable $th) {
            echo $th->getMessage();
        } //tra ve so ban ghi
        return $stm->rowCount();
    }
    
    function getlaptopById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE lt_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }

}
