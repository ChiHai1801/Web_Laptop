<?php
    $sql_lietke_cpu = "SELECT * FROM cpu ORDER BY cpu_sonhan, cpu_soluong, cpu_tocdocpu, cpu_tocdotoida, cpu_bonhodem DESC";
    $query_lietke_cpu = mysqli_query($mysqli, $sql_lietke_cpu);
?>
<p>Liệt kê thương hiệu</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>id</th>
    <th>cpu</th>
    <th>Số nhân</th>
    <th>Số luồng</th>
    <th>Tốc độ cpu</th>
    <th>tốc độ tối đa</th>
    <th>Bọ nhớ đệm</th>
    <th>Quản lý</th>

  </tr>
<?php 
$i = 0;
while($row = mysqli_fetch_array($query_lietke_cpu) ){
    $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['cpu_name'] ?></td>
    <td><?php echo $row['cpu_sonhan'] ?></td>
    <td><?php echo $row['cpu_soluong'] ?></td>
    <td><?php echo $row['cpu_tocdocpu'] ?></td>
    <td><?php echo $row['cpu_tocdotoida'] ?></td>
    <td><?php echo $row['cpu_bonhodem'] ?></td>
    <td>
        <a href="modules/quanlycpu/xuly.php?idcpu=<?php echo $row['cpu_id'] ?>">Xóa</a> | 
        <a href="?action=quanlycpu&query=sua&idcpu=<?php echo $row['cpu_id'] ?>">Sửa</a>
    </td>

  </tr>
  <?php
}
?>

</table>