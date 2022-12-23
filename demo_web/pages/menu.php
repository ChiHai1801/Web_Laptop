<?php
    $sql_thuonghieu = "SELECT * FROM thuonghieu ORDER BY th_id DESC";
    $query_thuonghieu = mysqli_query($mysqli, $sql_thuonghieu);
    ?>

<div class="menu">
            <ul class="list_menu">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <?php
                while($row_thuonghieu = mysqli_fetch_array($query_thuonghieu)){
                ?>
                <li><a href="index.php?quanly=thuonghieu&id=<?php echo $row_thuonghieu['th_id'] ?>"><?php echo $row_thuonghieu['th_name'] ?></a></li>
                <?php
                }
                ?>
                <li><a href="index.php?quanly=giohang">GIỎ HÀNG</a></li>
                <li><a href="index.php?quanly=tintuc">TIN TỨC</a></li>
                <li><a href="index.php?quanly=lienhe">LIÊN HỆ</a></li>
            </ul>
        </div>

   
   
   