<?php
include('../../config/config.php');

$cpu = $_POST['cpu_name'];
$cpu_sonhan = $_POST['cpu_sonhan'];
$cpu_soluong = $_POST['cpu_soluong'];
$cpu_tocdocpu = $_POST['cpu_tocdocpu'];
$cpu_tocdotoida = $_POST['cpu_tocdotoida'];
$cpu_bonhodem = $_POST['cpu_bonhodem'];
if(isset($_POST['themcpu'])){
    //thêm
    $sql_them = "INSERT INTO cpu(cpu_name, cpu_sonhan, cpu_soluong, cpu_tocdocpu, cpu_tocdotoida, cpu_bonhodem) value 
        ('".$cpu."', '".$cpu_sonhan."', '".$cpu_soluong."', '".$cpu_tocdocpu."', '".$cpu_tocdotoida."', '".$cpu_bonhodem."')";
    mysqli_query($mysqli, $sql_them);
    header('Location: ../../index.php?action=quanlycpu&query=them');
}elseif(isset($_POST['suacpu'])){
    //sửa
    $sql_update = "UPDATE cpu SET cpu_name='".$cpu."', cpu_sonhan='".$cpu_sonhan."', cpu_soluong='".$cpu_soluong."', 
    cpu_tocdocpu='".$cpu_tocdocpu."', cpu_tocdotoida='".$cpu_tocdotoida."', cpu_bonhodem='".$cpu_bonhodem."' WHERE cpu_id='$_GET[idcpu]'";
    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=quanlycpu&query=them');
}else{
    // xóa
    $id = $_GET['idcpu'];
    $sql_xoa = "DELETE  FROM cpu WHERE  cpu_id= '".$id."' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: ../../index.php?action=quanlycpu&query=them');
}

?>