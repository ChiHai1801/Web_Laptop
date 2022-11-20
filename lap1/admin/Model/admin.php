<?php
require_once('C:/xampp/htdocs/lap1/db.php');
class Admin extends DBa
{
    const tableName = 'admin';
    // public function __construct()
    // {
        // parent::__construct();
        // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }
    function insert($payload) ///register
    {
        try {
            $alert = '';
            $ad_username = $payload['ad_username'];
            $ad_password = $payload['ad_password'];
            $ad_phone = $payload['ad_phone'];
            $ad_email = $payload['ad_email'];
            $ad_gioitinh = $payload['ad_gioitinh'];
            $ad_diachi = $payload['ad_diachi'];
            $passwordR = $payload['ad_passwordR'];
            if ($ad_password == $passwordR) {
                $stm = $this->db->prepare('INSERT INTO ' .
                    self::tableName . '(
                        ad_username,ad_password,ad_phone,ad_email, ad_gioitinh, ad_diachi)
                 VALUES(
                        :ad_username,:ad_password,:ad_phone,:ad_email,:ad_gioitinh,:ad_diachi)');
                $stm->execute(array(
                    ':ad_username' => $ad_username,
                    ':ad_password' => md5($ad_password),
                    ':ad_phone' => $ad_phone,
                    ':ad_email' => $ad_email,
                    ':ad_gioitinh' => $ad_gioitinh,
                    ':ad_diachi' => $ad_diachi

                ));
            } else {
                $alert = 'Mat khau khong khop';
                return $alert;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        //tra ve so ban ghi
        return $stm->rowCount();
    }
    function checkLogin($payload)
    {
        $ad_username = $payload['ad_email'];
        $ad_password = $payload['ad_password'];
        $stm =  $this->db->prepare('SELECT * FROM ' . self::tableName . " WHERE ad_email = :ad_email AND ad_password = :ad_password  LIMIT 1");
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute(array(':ad_email' => $ad_username, ':ad_password' =>  md5($ad_password)));
        return  $stm->fetch();
    }
    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE ad_id = " . $id);
    }

    function update($payload)
    {
        try {
            $ad_username = $payload['ad_username'];
            $ad_phone = $payload['ad_phone'];
            $ad_password = $payload['ad_password'];
            $ad_email = $payload['ad_email'];
            $ad_gioitinh = $payload['ad_gioitinh'];
            $ad_diachi = $payload['ad_diachi'];
            $ad_id = $payload['ad_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET     ad_username=:ad_username, ad_phone=:ad_phone,
                    ad_password=:ad_password, ad_email=:ad_email, 
                    ad_gioitinh=:ad_gioitinh, ad_diachi=:ad_diachi 
                    WHERE ad_id=:ad_id');
            $stm->execute(array(
                ':ad_username' => $ad_username,
                ':ad_phone' => $ad_phone,
                ':ad_password' => $ad_password,
                ':ad_email' => $ad_email,
                ':ad_gioitinh' => $ad_gioitinh,
                ':ad_diachi' => $ad_diachi,
                ':ad_id' => $ad_id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function getAdminById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE ad_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
}
