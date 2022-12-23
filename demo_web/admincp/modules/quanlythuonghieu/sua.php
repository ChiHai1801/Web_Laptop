<?php
    $sql_sua_thuonghieusp = "SELECT * FROM thuonghieu WHERE th_id='$_GET[idthuonghieu]' LIMIT 1";
    $query_sua_thuonghieusp = mysqli_query($mysqli, $sql_sua_thuonghieusp);
?>

<p>Sua danh muc</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlythuonghieu/xuly.php?idthuonghieu=<?php echo $_GET['idthuonghieu'] ?>">
<?php 
while($dong = mysqli_fetch_array($query_sua_thuonghieusp)){
?>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" value="<?php echo $dong['th_name'] ?>" name="th_name"></td>
        </tr>

        <tr>
            <td>Thứ tự</td>
            <td><input type="text"  value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="suathuonghieu" value="Sửa thương hiệu"></td>
        </tr>

        <?php
}
?>
    </form>
</table>