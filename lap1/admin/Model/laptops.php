<?php
require_once('C:/xampp/htdocs/lap1/db.php');

class Laptop extends DBa
{
    const tableName = 'laptop';
    public function __construct()
    {
        parent::__construct();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function countNumImgOfProduct($id)
    {
        $sql = "SELECT COUNT(id) FROM `img` WHERE laptop_id=$id";
        $result = $this->db->prepare($sql);
        $result->execute();
        $max = $result->fetchColumn();
        echo $max;
    }
    // SELECT p.id, p.name,p.price,p.discount FROM product p INNER JOIN cate_product cp ON cp.product_id= p.id INNER JOIN category c ON c.id= cp.cate_id WHERE cp.cate_id=3 ORDER BY p.id DESC
    function getListProductByCategory($thuonghieu_id)
    {
        $stm = $this->db->prepare("SELECT p.id, p.name,p.price,p.discount FROM laptop p INNER JOIN cate_product cp ON cp.product_id= p.id INNER JOIN category c ON c.id= cp.cate_id WHERE cp.cate_id=$thuonghieu_id ORDER BY p.id DESC");
        $stm->execute();
        return $stm->fetchAll();
    }
    function getListProductByCategorys($thuonghieu_ids, $conditionsFilter)
    {
        $conditions = '';
        for ($i = 0; $i < count($thuonghieu_ids); $i++) {

            $condition = ' cp.th_id=' . "$thuonghieu_ids[$i] ";
            if ($i == count($thuonghieu_ids) - 1) {
            } else {
                $condition = $condition . ' OR ';
            }
            $conditions = $conditions . $condition;
        }

        $stm = $this->db->prepare("SELECT p.id, p.name,p.price,p.discount FROM laptop p INNER JOIN cate_product cp ON cp.product_id= p.id INNER JOIN category c ON c.id= cp.cate_id WHERE 
        " . $conditions . " ORDER BY p.id DESC");
        $stm->execute();
        return $stm->fetchAll();
    }
    function getAll($offset, $count)
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " LIMIT $offset,$count");
        $stm->execute();
        return $stm->fetchAll();
    }
    function getProductByFilter($conditions, $sort)
    {
        $sortsql = '';
        if ($conditions == '') $conditions = 1;
        switch ($sort) {
            case 'new':
                $sortsql = 'time_add DESC';
                break;
            case 'giam':
                $sortsql = 'price ASC';
                break;
            case 'tang':
                $sortsql = 'price DESC';
                break;
            case 'dis_max':
                $sortsql = 'discount DESC';
                break;
            case 'topsell':
                $sortsql = 'selled  DESC';
                break;

            default:
                $sortsql = 'id desc';
                break;
        }

        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . ' WHERE ' . $conditions . " ORDER BY " . $sortsql);
        $stm->execute();
        return $stm->fetchAll();
    }
    function getImg($id)
    {
        try {
            $stm = $this->db->prepare("SELECT img FROM " . 'img WHERE lt_id=' . "$id");
            $stm->execute();
            return $stm->fetchAll();
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    function getTopSell()
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM " .  self::tableName . ' WHERE 1 ORDER BY selled DESC LIMIT 5');
            $stm->execute();
            return $stm->fetchAll();
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    function getTopNew()
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM " .  self::tableName . ' WHERE 1 ORDER BY time_add DESC LIMIT 5');
            $stm->execute();
            return $stm->fetchAll();
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    function getopDiscont()
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM " .  self::tableName . ' WHERE 1 ORDER BY time_add DESC LIMIT 5');
            $stm->execute();
            return $stm->fetchAll();
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    function getListBySearch($keyword)
    {
        try {

            $stm = $this->db->prepare("SELECT * FROM " . self::tableName . ' WHERE name LIKE :keyword ' . ' ORDER BY name');
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            $stm->execute(array(":keyword" => '%' . $keyword . '%'));
            return $stm->fetchAll();
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    function insert($payload, $srcs, $srcOfContent)
    {
        try {
            $laptopName = $payload['laptopName'];
            $sp_id = $payload['sp_name'];
            $th_id = $payload['th_name'];
            $ha_id = $payload['img'];
            $gia = $payload['gia'];
            $ct_id = $payload['ct_id'];
            $nc_id = $payload['nc_name'];
            $mh_id = $payload['mh_kichthuoc'];
            $mm_id = $payload['mm_mau'];
            $tl_id = $payload['tl_trongluong'];
            $dpg_id = $payload['dpg_name'];
            $cpu_id = $payload['cpu_name'];
            $ram_id = $payload['ram_dungluong'];
            $oc_id = $payload['oc_name'];
            $ts_id = $payload['ts_name'];

            $stm = $this->db->prepare('INSERT INTO ' .
                self::tableName . '(
                    laptopname,sp_name,th_name,img,gia,ct_id,
                    nc_name,mh_kichthuoc,mm_mau,tl_trongluong,dpg_name,cpu_name,
                    ram_dungluong,oc_name,ts_name)
            VALUES(:
                    laptopName,:sp_name,:th_id,:ha_id,:gia,:ct_id,
                    :nc_id,:mh_id,:mm_id,:tl_id,:dpg_id,:cpu_id,
                    :ram_id,:oc_id,:ts_id)');
            $stm->execute(array(
                ':laptopName' => $laptopName,
                ':sp_name' => $sp_id,
                ':th_name' => $th_id,
                ':img' => $ha_id,
                ':gia' => $gia,
                ':ct_id' => $ct_id,
                ':nc_name' => $nc_id,
                ':mh_kichthuoc' => $mh_id,
                ':mm_mau' => $mm_id,
                ':tl_trongluong' => $tl_id,
                ':dpg_name' => $dpg_id,
                ':cpu_name' => $cpu_id,
                ':ram_dungluong' => $ram_id,
                ':oc_name' => $oc_id,
                ':ts_name' => $ts_id
            ));
            $dbtmp = new DBa();
            $max =  $dbtmp->getMax_id(self::tableName);
            // chen img_src va product id vao bang img
            foreach ($srcs as $src) {
                $stm2 = $this->db->prepare('INSERT INTO  img (img,lt_id) VALUES (:img,:lt_id)');
                $stm2->execute(array(
                    ':img' => $src,
                    ':lt_id' => $max
                ));
            }
            // insert img src vao detail table
            for ($i = 0; $i < count($srcOfContent); $i++) {
                $title = $payload['title' . ($i + 1)];
                echo $title;
                $content = $payload['content' . ($i + 1)];
                $stm2 = $this->db->prepare('INSERT INTO  detail (lt_id,img,content,title) VALUES (:lt_id,:img,:content,:title)');
                $stm2->execute(array(
                    ':img' => $srcOfContent[$i],
                    ':lt_id' => $max,
                    ':content'  => $content,
                    ':title'  => $title
                ));
            }
            // insert category

            foreach ($th_id as $th_id) {
                $stm2 = $this->db->prepare('INSERT INTO  cate_product (lt_id,cate_id) VALUES (:lt_id,:cate_id)');
                $stm2->execute(array(
                    ':lt_id' => $max,
                    ':th_id' => $th_id
                ));
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        //tra ve so ban ghi
        return $stm->rowCount();
    }

    public function getContentProduct($id)
    {
        $stm = $this->db->prepare("SELECT * FROM detail WHERE lt_id=$id");
        $stm->execute();
        return $stm->fetchAll();
    }
    function delete($id)
    {
        $this->db->query("DELETE FROM " . self::tableName . " WHERE id = " . $id);
    }

    function update($payload)
    {
        try {
            $laptopName = $payload['laptopName'];   
            $sp_id = $payload['sp_name'];
            $sp_id = $payload['sp_xuatxu'];
            $sp_id = $payload['sp_mota'];
            $th_id = $payload['th_name'];
            $ha_id = $payload['img'];
            $gia = $payload['gia'];
            $ct_id = $payload['ct_id'];
            $nc_id = $payload['nc_name'];
            $mh_id = $payload['mh_kichthuoc'];
            $mm_id = $payload['mm_mau'];
            $tl_id = $payload['tl_trongluong'];
            $dpg_id = $payload['dpg_name'];
            $cpu_id = $payload['cpu_name'];
            $ram_id = $payload['ram_dungluong'];
            $oc_id = $payload['oc_name'];
            $ts_id = $payload['ts_name'];
            
            $id = $payload['lt_id'];

            $stm = $this->db->prepare('UPDATE ' . self::tableName . ' 
             SET  name=:laptopName,sp_name=:sp_id,sp_xuatxu=:sp_id,sp_mota=:sp_id,th_name=:th_id,img=:ha_id
            ,gia=:gia,ct_id=:ct_id,nc_name=:nc_id,mh_kichthuoc=:mh_id,mm_mau=:mm_id,tl_trongluong=:tl_id
            ,dpg_name=:dpg_id,cpu_name=:cpu_id,ram_dungluong=:ram_id,oc_name=:oc_id,
            ts_name=:ts_id WHERE lt_id = :lt_id');
            $stm->execute(array(
                ':laptopName' => $laptopName,
                ':sp_name' => $sp_id,
                ':sp_xuatxu' => $sp_id,
                ':sp_mota' => $sp_id,
                ':th_name' => $th_id,
                ':img' => $ha_id,
                ':gia' => $gia,
                ':ct_id' => $ct_id,
                ':nc_name' => $nc_id,
                ':mh_kichthuoc' => $mh_id,
                ':mm_mau' => $mm_id,
                ':tl_trongluong' => $tl_id,
                ':dpg_name' => $dpg_id,
                ':cpu_name' => $cpu_id,
                ':ram_dungluong' => $ram_id,
                ':oc_name' => $oc_id,
                ':ts_id' => $ts_id,
                ':lt_id' => $id
            ));

            //update  content of products
            // lay id cua bang detail dua vao  product id
           $stm = $this->db->prepare("SELECT id FROM detail WHERE lt_id=$id");
           $stm->execute();
           $iddetail = $stm->fetch();
           $iddetail = $iddetail['id'];
           for ($i = 1; $i <= 3; $i++) {
               $content = $payload['content' . $i];
               $title = $payload['title' . $i];
               $stmcontent = $this->db->prepare('UPDATE detail
               // -- SET  content=:content, title=:title
               // --  WHERE id = :id');
               $stmcontent->execute(array(
                   ':content' => $content,
                   ':title' => $title,
                   ':id' => ($iddetail + ($i - 1))
               ));
           }
            //update category of product
            $stm = $this->db->prepare("SELECT id FROM cate_product WHERE lt_id=$id");
            $stm->execute();
            $idCate_product = $stm->fetch();
            $idCate_product = $idCate_product['id'];
            for ($i = 0; $i <= 3; $i++) {
                $th_id = $th_id[$i];
                $stmcontent = $this->db->prepare('UPDATE cate_product
                 SET  nc_id=:nc_id
                  WHERE id = :id');
                $stmcontent->execute(array(
                    ':cate_id' => $th_id,
                    ':id' => ($idCate_product + $i)
                ));
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        } //tra ve so ban ghi
        return $stm->rowCount();
    }
    function getListByListID($id)
    {
        $stm = $this->db->prepare("SELECT * FROM " . self::tableName . " WHERE lt_id= $id");
        $stm->execute();
        return $stm->fetchAll();
    }
    function getProductById($id)
    {
        $rows = $this->db->query("SELECT * FROM " . self::tableName . " WHERE lt_id= $id");
        foreach ($rows as $r) {
            $row  = $r;
        }
        return $r;
    }
}
