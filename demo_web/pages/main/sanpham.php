<p> Chi tiết sản phẩm</p>
<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham, thuonghieu WHERE tbl_sanpham.th_id = thuonghieu.th_id ORDER BY tbl_sanpham.id_sanpham='$_GET[id]' DESC LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>

<div class="wrapper_chitiet">
<div class="hinhanh_sanpham">
<img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
</div>

<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
<div class="chitiet_sanpham">
        <h3 style="margin: 0;">Tên sản phẩm: <?php echo $row_chitiet['tensanpham'] ?></h3>
        <p>Mã sp: <?php echo $row_chitiet['masp'] ?></p>
        <p>Giá sp: <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnđ' ?></p>
        <p>Số lượng sp: <?php echo $row_chitiet['soluong'] ?></p>
        <p>Danh mục sp: <?php echo $row_chitiet['th_name'] ?></p>
        <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
</div>

</form>
</div>
<?php
    }
?>