<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $tenkhachhang = $_POST['hovaten'];
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) 
        value ('".$tenkhachhang."', '".$email."', '".$diachi."', '".$matkhau."', '".$dienthoai."')");

        if($sql_dangky){
            echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
          
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            header('Location: index.php?quanly=giohang');
        }
    }
?>
<p>Dang ky thanh vien</p>
<form action="" method="POST">
<table class="dangky" border="1" width="70%" style="border-collapse: collapse;">
    <tr>
        <td>Ho va ten</td>
        <td><input type="text" size="50" name="hovaten" require></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" size="50" name="email"></td>
    </tr>
     <tr>
        <td>Dien thoai</td>
        <td><input type="text" size="50" name="dienthoai"></td>
    </tr>   
     <tr>
        <td>Dia chi</td>
        <td><input type="text" size="50" name="diachi"></td>
    </tr>   
    <tr>
        <td>Mat khau</td>
        <td><input type="text" size="50" name="matkhau"></td>
    </tr>

    <tr>
        <td ><input type="submit" name="dangky" value="Đăng Ký"></td>
        <td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
    </tr>

</table>
</form>