<?php
include('../../config/config.php');

$thuonghieusp = $_POST['th_name'];
$thutu = $_POST['thutu'];
if(isset($_POST['themthuonghieu'])){
    //thêm
    $sql_them = "INSERT INTO thuonghieu(th_name, thutu) value ('".$thuonghieusp."', '".$thutu."')";
    mysqli_query($mysqli, $sql_them);
    header('Location: ../../index.php?action=quanlythuonghieu&query=them');
}elseif(isset($_POST['suathuonghieu'])){
    //sửa
    $sql_update = "UPDATE thuonghieu SET th_name='".$thuonghieusp."', thutu='".$thutu."' WHERE th_id='$_GET[idthuonghieu]'";
    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=quanlythuonghieu&query=them');
}else{
    // xóa
    $id = $_GET['idthuonghieu'];
    $sql_xoa = "DELETE  FROM thuonghieu WHERE  th_id= '".$id."' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: ../../index.php?action=quanlythuonghieu&query=them');
}

?>