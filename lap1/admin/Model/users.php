<?php
require_once('C:/xampp/htdocs/lap1/db.php');
class Users extends DBa
{
    const tableName = 'users';
    public function __construct()
    {
        parent::__construct();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getAll($offset, $count)
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " LIMIT $offset,$count");
        $stm->execute();
        return $stm->fetchAll();
    }

    function insert($payload) ///register
    {
        try {
            $alert = '';
            $us_username = $payload['us_username'];
            $us_password = $payload['us_password'];
            $us_phone = $payload['us_phone'];
            $us_email = $payload['us_email'];
            $us_gioitinh = $payload['us_gioitinh'];
            $us_diachi = $payload['us_diachi'];
            $us_ngaysinh = $payload['us_ngaysinh'];
            $us_passwordR = $payload['us_passwordR'];
            if ($us_password == $us_passwordR) {
                $stm = $this->db->prepare('INSERT INTO ' .
                    self::tableName . '(
                        us_username,us_password,us_phone,us_email, us_gioitinh, us_diachi, us_ngaysinh)
                 VALUES(
                        :us_username,:us_password,:us_phone,:us_email,:us_gioitinh,:us_diachi,:us_ngaysinh)');
                $stm->execute(array(
                    ':us_username' => $us_username,
                    ':us_password' => md5($us_password),
                    ':us_phone' => $us_phone,
                    ':us_email' => $us_email,
                    ':us_gioitinh' => $us_gioitinh,
                    ':us_diachi' => $us_diachi,
                    ':us_ngaysinh' => $us_ngaysinh

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

    function checkUser_Enail($us_username, $us_email)
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " WHERE us_username=:us_username");
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute(array(":us_username" => $us_username));
        $check = $stm->fetch();
        if (!empty($check)) {
            return 'T??n ????ng nh???p ???? t???n t???i';
        }
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " WHERE us_email=:us_email");
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute(array(':us_email' => $us_email));
        $check = $stm->fetch();
        if (!empty($check)) {
            return 'Email ???? t???n t???i';
        }
        return 'OK';
    }
    function checkLogin($payload)
    {
        $us_email = $payload['us_email'];
        $us_password = $payload['us_password'];
        $stm =  $this->db->prepare('SELECT * FROM ' . self::tableName . " WHERE us_email = :us_email AND us_password = :us_password  LIMIT 1");
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute(array(':us_email' => $us_email, ':us_password' =>  md5($us_password)));
        return  $stm->fetch();
    }
    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE us_id = " . $id);
    }



    function update($payload)//chua su dung toi
    {
        try {
            $us_username = $payload['us_username'];
            $us_phone = $payload['us_phone'];
            $us_password = $payload['us_password'];
            $us_email = $payload['us_email'];
            $us_gioitinh = $payload['us_gioitinh'];
            $us_diachi = $payload['us_diachi'];
            $us_ngaysinh = $payload['us_ngaysinh'];
            $us_id = $payload['us_id'];
            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
            SET     us_username=:us_username, us_phone=:us_phone,
                    us_password=:us_password, us_email=:us_email, 
                    us_gioitinh=:us_gioitinh, us_diachi=:us_diachi
                    us_ngaysinh=:us_ngaysinh WHERE us_id = :ad_id');
            $stm->execute(array(
                ':us_username' => $us_username,
                ':us_phone' => $us_phone,
                ':us_password' => md5($us_password),
                ':us_email' => $us_email,
                ':us_gioitinh' => $us_gioitinh,
                ':us_diachi' => $us_diachi,
                ':us_ngaysinh' => $us_ngaysinh,
                ':us_id' => $us_id
            ));
            //tra ve so ban ghi
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }

    function updateUser($payload)//for user update
    {
        try {
            $us_id = $payload['us_id'];
            $us_username = $payload['us_username'];
            $us_diachi = $payload['us_diachi'];
            $us_phone = $payload['us_phone'];
            $us_gioitinh = $payload['us_gioitinh'];
            $us_ngaysinh = $payload['us_ngaysinh'];
            // $email = $payload['email'];
            $stm = $this->db->prepare('UPDATE  ' .
                self::tableName .
                ' SET us_id=:us_id,us_username=:us_username,us_diachi=:us_diachi,us_phone=:us_phone
                ,us_gioitinh=:us_gioitinh,us_ngaysinh=:us_ngaysinh WHERE us_id = :us_id');
            $stm->execute(array(
                ':us_username' => $us_username,
                ':us_diachi' => $us_diachi,
                ':us_phone' => $us_phone,
                ':us_gioitinh' => $us_gioitinh,
                ':us_ngaysinh' => $us_ngaysinh,
                ':us_id' => $us_id     
            ));
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return $stm->rowCount();
    }
    public function login($payload)
    {
    }
    public function register($payload)
    {
        # code...
    }
    function getUserById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE us_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
    function getByUsername($us_username)
    {
        $stm =  $this->db->prepare('SELECT * FROM ' . self::tableName . " WHERE us_username = :us_username ");
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute(array(':us_username' => $us_username));
        return  $stm->fetch();
    }
}
