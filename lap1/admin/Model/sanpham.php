<?php
require_once('C:/xampp/htdocs/lap1/db.php');
class Sanpham extends DBa
{
    const tableName = 'sanpham';
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

            $sp_name = $payload['sp_name'];
            $sp_xuatxu = $payload['sp_xuatxu'];
            $sp_mota = $payload['sp_mota'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(
                sp_name,sp_xuatxu,sp_mota)
            VALUES(
                :sp_name,:sp_xuatxu,:sp_mota)');
            $stm->execute(array(
                ':sp_name' => $sp_name,
                ':sp_xuatxu' => $sp_xuatxu,
                ':sp_mota' => $sp_mota
                    ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE sp_id = " . $id);
    }
    // function getProduct($id)
    // {
        // $stm = $this->db->prepare("SELECT * FROM laptop WHERE sp_id= $id");
        // $stm->execute();
        // return $stm->fetchAll();
    // }


    function update($payload)//for admin
    {
        try {
            $sp_id = $payload['sp_id'];
            $sp_name = $payload['sp_name'];
            $sp_xuatxu = $payload['sp_xuatxu'];
            $sp_mota = $payload['sp_mota'];

            $stm = $this->db->prepare('UPDATE  ' .
            self::tableName .'
                SET   
                    sp_name=:sp_name,
                    sp_xuatxu=:sp_xuatxu,
                    sp_mota=:sp_mota
                WHERE 
                    id = :id');
            $stm->execute(array(
                ':sp_name' => $sp_name,
                ':sp_xuatxu' => $sp_xuatxu,
                ':sp_mota' => $sp_mota
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getsanphamById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE sp_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
}
