<?php
require_once('C:/xampp/htdocs/Laptop/db.php');
class Ram extends DBa
{
    const tableName = 'ram';

    function getAllNoLimit()
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName);
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload)
    {
        try {
            $ramName = $payload['ramName'];
            $ramloairam = $payload['ramloairam'];
            $ramtocdobusram = $payload['ramtocdobusram'];
            $ramhtramtoida = $payload['ramhtramtoida'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(ram_dungluong, ram_loairam, ram_tocdobusram, ram_htramtoida)
             VALUES(:ramName, :ramloairam, :ramtocdobusram, :ramhtramtoida)');
            $stm->execute(array(
                ':ramName' => $ramName,
                ':ramloairam' => $ramloairam,
                ':ramtocdobusram' => $ramtocdobusram,
                ':ramhtramtoida' => $ramhtramtoida

            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE ram_id = " . $id);
    }
    
    function update($payload)
    {
        try {
            $ram_dungluong = $payload['ramName'];
            $ram_loairam = $payload['ramloairam'];
            $ram_tocdobusram = $payload['ramtocdobusram'];
            $ram_htramtoida = $payload['ramhtramtoida'];
            $id = $payload['ram_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET    
                    ram_dungluong = :ramName,
                    ram_loairam = :ramloairam ,
                    ram_tocdobusram = :ramtocdobusram ,
                    ram_htramtoida = :ramhtramtoida 
                WHERE 
                    ram_id = :ram_id'); 
            $stm->execute(array(
                ':ramName' => $ram_dungluong,
                ':ramloairam' => $ram_loairam, 
                ':ramtocdobusram' => $ram_tocdobusram, 
                ':ramhtramtoida' => $ram_htramtoida, 
                ':ram_id' => $id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getramById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE ram_id= $id");
        foreach ($rows as $r) {
            $rows  = $r;
        }
        return $r;
    }
}
