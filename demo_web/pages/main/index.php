<?php
    $sql_pro = "SELECT * FROM tbl_sanpham, thuonghieu WHERE tbl_sanpham.th_id = thuonghieu.th_id ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 25";
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
                          <p style="text-align: center ; color: #d1d1d1">Danh mục:<?php echo $row['th_name'] ?> </p>
                      </a>
                  </li>
                  <?php
                }
                ?>

              </ul>