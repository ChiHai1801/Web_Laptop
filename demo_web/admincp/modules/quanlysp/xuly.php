<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
// $hinhanh = $_POST['hinhanh'];
// xử lý hình ảnh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$th_id = $_POST['th_id'];

if(isset($_POST['themsanpham'])){
    //thêm
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham, masp, giasp, soluong, hinhanh, tomtat, noidung, tinhtrang, th_id) value 
    ('".$tensanpham."', '".$masp."', '".$giasp."', '".$soluong."', '".$hinhanh."', '".$tomtat."', '".$noidung."', '".$tinhtrang."', '".$th_id."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
    header('Location: ../../index.php?action=quanlysp&query=them');
}elseif(isset($_POST['suasanpham'])){
    //sửa
    if($hinhanh != ''){

        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);

        $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', 
        soluong='".$soluong."', hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."', id_danhmuc = '".$danhmuc."' 
        WHERE id_sanpham='$_GET[idsanpham]'";
        // xóa hình ảnh củ
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1" ;
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
 
    }else{
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."', 
        soluong='".$soluong."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."', id_danhmuc = '".$danhmuc."'
        WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($mysqli, $sql_update);
   header('Location: ../../index.php?action=quanlysp&query=them');
}else{
    // xóa
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1" ;
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE  FROM tbl_sanpham WHERE  id_sanpham= '".$id."' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: ../../index.php?action=quanlysp&query=them');
}

?>