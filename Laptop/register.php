
<!-- https://bootsnipp.com/tags/login -->
<!DOCTYPE html>
<html>
    <head>
         <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link href="./css/logins.css" rel="stylesheet" id="bootstrap-css">
    </head>

<?php
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

include('./admin/Model/users.php');
$result_check = '';
//kiem tra xem user va mail  da ton tiaj  trong DB hay chua
if (isset($_POST['checkUser']) || isset($_POST['checkEmail'])) {
    $users = new Users();
    $username = $_POST['us_username'];
    $email = $_POST['us_email'];
    $result_check =  $users->checkUser_Enail($username, $email);
}

if (isset($_POST['register'])) {
    // var_dump($_POST);'
    $users = new Users();
    $result = $users->insert($_POST);
    if ($result == 1) {// if insert success retun 1 in function insert
        $_SESSION['success'] = 'Đăng ký thành công';
    } else $alert = $result;//to show alert if inset not success
}

?>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($result_check) && $result_check != '') {
            echo '<div class="alert alert-primary" role="alert">' . " $result_check " . "</div>";
        }
        if (isset($alert)) echo '<div class="alert alert-primary" role="alert">' . " $result " . "</div>";
        ?>
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                <span><a href="./index.php"><i class="fas fa-angle-double-left"></i></a></span>
                    <h3>Đăng ký<h3>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="us_username" class="form-control" value="<?php if (isset($result_check) && $result_check == 'OK') echo $username; ?>" placeholder="username" required>
                            <input type="submit" name="checkUser" value="Check">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="us_password" class="form-control" placeholder="password" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="us_passwordR" class="form-control" placeholder="Re enter password" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="us_email" class="form-control" value="<?php if (isset($result_check) && $result_check == 'OK') echo $email; ?>" placeholder="email" required>
                            <input type="submit" name="checkEmail" value="Check">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="us_diachi" class="form-control" placeholder="Địa chỉ">

                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="us_gioitinh" class="form-control" placeholder="Giới tính">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                            <input type="date" name="us_ngaysinh" class="form-control" placeholder="Ngày sinh">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="us_phone" class="form-control" placeholder="SĐT">
                        </div>

                        <div class="row align-items-center remember">
                            <input type="checkbox" checked="checked" name="remember">Remember Me
                        </div>

                        <div class="form-group">
                            <input type="submit" name="register" value="Đăng ký" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        <a href="login.php">Đăng nhập</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>