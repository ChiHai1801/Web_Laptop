<?php
    $sql_lietke_thuonghieusp = "SELECT * FROM thuonghieu ORDER BY thutu DESC";
    $query_lietke_thuonghieusp = mysqli_query($mysqli, $sql_lietke_thuonghieusp);
?>
<p>Liệt kê thương hiệu</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>id</th>
    <th>thương hiệu</th>
    <th>Quản lý</th>

  </tr>
<?php 
$i = 0;
while($row = mysqli_fetch_array($query_lietke_thuonghieusp) ){
    $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['th_name'] ?></td>
    <td>
        <a href="modules/quanlythuonghieu/xuly.php?idthuonghieu=<?php echo $row['th_id'] ?>">Xóa</a> | 
        <a href="?action=quanlythuonghieu&query=sua&idthuonghieu=<?php echo $row['th_id'] ?>">Sửa</a>
    </td>

  </tr>
  <?php
}
?>

</table>