<?php

require_once('C:/xampp/htdocs/Laptop/db.php');

class Cpu extends DBa
{
    const tableName = 'cpu';

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
            $cpusonhan = $payload['cpusonhan'];
            $cpusoluong = $payload['cpusoluong'];
            $cputocdocpu = $payload['cputocdocpu'];
            $cputocdotoida = $payload['cputocdotoida'];
            $cpubonhodem = $payload['cpubonhodem'];
            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(cpu_name, cpu_sonhan, cpu_soluong, cpu_tocdocpu, cpu_tocdotoida, cpu_bonhodem)
             VALUES(:cpuName, :cpusonhan, :cpusoluong, :cputocdocpu, :cputocdotoida, :cpubonhodem)');
                $stm->execute(array(
                    ':cpuName' => $cpuName,
                    ':cpusonhan' => $cpusonhan,
                    ':cpusoluong' => $cpusoluong,
                    ':cputocdocpu' => $cputocdocpu,
                    ':cputocdotoida' => $cputocdotoida,
                    ':cpubonhodem' => $cpubonhodem

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

    function update($payload)
    {
        try {
            $cpu_name = $payload['cpuName'];
            $cpu_sonhan = $payload['cpusonhan'];
            $cpu_soluong = $payload['cpusoluong'];
            $cpu_tocdocpu = $payload['cputocdocpu'];
            $cpu_tocdotoida = $payload['cputocdotoida'];
            $cpu_bonhodem = $payload['cpubonhodem'];
            $id = $payload['cpu_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
                SET 
                    cpu_name = :cpuName,
                    cpu_sonhan = :cpusonhan,
                    cpu_soluong = :cpusoluong,
                    cpu_tocdocpu = :cputocdocpu,
                    cpu_tocdotoida = :cputocdotoida,
                    cpu_bonhodem = :cpubonhodem
                    WHERE 
                    cpu_id = :cpu_id'); 
            $stm->execute(array(
                ':cpuName' => $cpu_name,
                ':cpusonhan' => $cpu_sonhan, 
                ':cpusoluong' => $cpu_soluong,   
                ':cputocdocpu' => $cpu_tocdocpu, 
                ':cputocdotoida' => $cpu_tocdotoida, 
                ':cpubonhodem' => $cpu_bonhodem, 
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
