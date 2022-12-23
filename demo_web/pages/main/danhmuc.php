<?php
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.th_id = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
// get tên danh muc
    $sql_cate = "SELECT * FROM thuonghieu WHERE thuonghieu.th_id = '$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);

?>
<h3>Danh Mục: <?php echo $row_title['th_name'] ?></h3>
              <ul class="product_list">
                <?php
                while($row_pro = mysqli_fetch_array($query_pro)){
                ?>
                  <li>
                      <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                          <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                          <p class="title_product">Tên SP: <?php echo $row_pro['tensanpham'] ?></p>
                          <p class="price_product">Giá: <?php echo number_format($row_pro['giasp'],0,',','.').'vnđ' ?></p>
                      </a>
                  </li>
                  <?php
                }
                ?>

              </ul>