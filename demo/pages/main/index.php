<?php
    if(isset($_GET['trang'])){
      $page = $_GET['trang'];
    }else{
      $page = 1;
    } 
    if($page == '' || $page == 1){
      $begin = 0;
    }else{
      $begin = ($page*3)-3;
    }
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,3";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3>Sản Phẩm Mới</h3>
              <ul class="product_list">

              <?php
                while($row = mysqli_fetch_array($query_pro)){
                ?>
                  <li>
                      <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                          <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                          <p class="title_product">Tên SP: <?php echo $row['tensanpham'] ?></p>
                          <p class="price_product">Giá: <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
                          <p style="text-align: center ; color: #d1d1d1">Danh mục:<?php echo $row['tendanhmuc'] ?> </p>
                      </a>
                  </li>
                  <?php
                }
                ?>

              </ul>
            <div style="clear: both;"></div>
            <?php
            $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
            $row_count = mysqli_num_rows($sql_trang);
            $trang = ceil($row_count/3);
            ?>
            <p> trang hiện tai : <?php echo $page ?>/<?php echo $trang ?></p>

              <ul class="list_trang">
               <?php
               for($i =1;$i <= $trang;$i++){
               ?>
                <li <?php if($i==$page){ echo 'style="background: green;"';}else{ echo '';} ?>>
                  <a  href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php
               }
                ?>
              </ul>