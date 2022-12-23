<?php
    $sql_sua_cpu = "SELECT * FROM cpu WHERE cpu_id='$_GET[idcpu]' LIMIT 1";
    $query_sua_cpu = mysqli_query($mysqli, $sql_sua_cpu);
?>

<p>Sua danh muc</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlycpu/xuly.php?idcpu=<?php echo $_GET['idcpu'] ?>">
<?php 
while($dong = mysqli_fetch_array($query_sua_cpu)){
?>
        <tr>
            <td>CPU</td>
            <td><input type="text" value="<?php echo $dong['cpu_name'] ?>" name="cpu_name"></td>
        </tr>

        <tr>
            <td>Số nhân</td>
            <td><input type="text"  value="<?php echo $dong['cpu_sonhan'] ?>" name="cpu_sonhan"></td>
        </tr>

        <tr>
            <td>Số luồng</td>
            <td><input type="text"  value="<?php echo $dong['cpu_soluong'] ?>" name="cpu_soluong"></td>
        </tr>

        <tr>
            <td>Tốc độ cpu</td>
            <td><input type="text"  value="<?php echo $dong['cpu_tocdocpu'] ?>" name="cpu_tocdocpu"></td>
        </tr>

        <tr>
            <td>Tốc độ tối đa</td>
            <td><input type="text"  value="<?php echo $dong['cpu_tocdotoida'] ?>" name="cpu_tocdotoida"></td>
        </tr>

        <tr>
            <td>Bộ nhớ đệm</td>
            <td><input type="text"  value="<?php echo $dong['cpu_bonhodem'] ?>" name="cpu_bonhodem"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="suacpu" value="Sửa CPU"></td>
        </tr>

        <?php
}
?>
    </form>
</table>