<link rel="stylesheet" type="text/css" href="./../css/logins.css">
<?php
require_once('../Model/admin.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_POST["submit"])) {
    $admin = new Admin();
    $count =  $admin->insert($_POST);
    if ($count == 1) {
        $_SESSION['success'] = 'Đăng ký thành công';
    } else {
        $alert = $count;
    }
}
?>

<body>
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        <div class="alert alert-primary" role="alert">
        <?php echo $_SESSION['success'];
        echo '<a href="login.php">Đăng Nhập</a>';
    } ?>
        </div>
        <p> <?php if (isset($alert)) echo $alert;  ?> </p>
        <div class="container">

        <h3>Đăng Ký</h3>
            <form name="login" onsubmit="return login()" action="" method="post">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tên Đăng Nhập</label>
                    <div class="col-sm-10">
                        <input type="text" name="ad_username" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mật Khẩu</label>
                    <div class="col-sm-10">
                        <input type="password" name="ad_password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mật Khẩu</label>
                    <div class="col-sm-10">
                        <input type="password" name="ad_passwordR" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="ad_email" required>
                    </div>
                </div>

                <div class="form-group row">
                   <label for="staticEmail" class="col-sm-2 col-form-label">Giới Tính</label>
                   <div class="col-sm-10">
                       <input type="gioitinh" name="ad_gioitinh" required>
                   </div>
               </div>
               <div class="form-group row">
                   <label for="staticEmail" class="col-sm-2 col-form-label">Địa Chỉ</label>
                   <div class="col-sm-10">
                       <input type="diachi" name="ad_diachi" required>
                   </div>
               </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="ad_phone" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Đăng ký"></input>

            </form>

            <a href="login.php">Đăng Nhập</a>
        </div>
        <script>
            function login() {
                var ad_password = document.forms["login"]["ad_password"].value;
                var repassword = document.forms["login"]["ad_passwordR"].value;
                if (ad_password != repassword) {
                    return false;
                    alert("Hai mật khẩu đã nhập  không khớp !");
                }
            }
        </script>
</body>

</html>