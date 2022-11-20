<link rel="stylesheet" type="text/css" href="./../css/logins.css">
<?php
require_once('../Model/admin.php');
$_SESSION['ad_username']='0';
if (isset($_POST['submit'])) {
    $admin = new Admin();
    if ($admin->checkLogin($_POST) != null) {
        $_SESSION['ad_username'] = $_POST['ad_username'];
        header("Location: http://localhost/lap1/admin/pages/laptop/");
       // var_dump($_SESSION);
    } else {
        //var_dump($_SESSION);
        $alert = 'Sai ten dang  nhap hoac mat khau  sai !';
    }
}
?>

<body>
    <div class="container">
        <h3>Đăng Nhập</h3>
        <form action="" method="post">
            <?php
            if ($_SESSION['login'] = false) echo "<p>Tên tài khoản hoặc mật khẩu không đúng !</p>";
            ?>
            <p> <?php if (isset($alert)) echo $alert;  ?></p>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">UserName</label>
                <div class="col-sm-10">
                    <input type="text" name="ad_email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Pass</label>
                <div class="col-sm-10">
                    <input type="password" name="ad_password" required>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Đăng Nhập">
        </form>
        <a class="form-group" href="register.php">Bạn chưa có tài khoản ?</a>
    </div>
</body>

</html>