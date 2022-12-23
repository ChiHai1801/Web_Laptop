<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']== 1){
        unset($_SESSION['dangnhap']);
        header('Location: login.php');
    }
?>

<p><a href="index.php?dangxuat=1">Dang xuat : <?php if(isset( $_SESSION['dangnhap'])){
      echo $_SESSION['dangnhap'];
  } ?></a></p>

<!-- <h3>header admin</h3> -->