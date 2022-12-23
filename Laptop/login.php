
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập</title>
    <link href="./css/logins.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<?php
require_once('C:/xampp/htdocs/Laptop/db.php');
require_once('./admin/Model/users.php');
session_start();
$_SESSION['user_login'] = '';
$_SESSION['user_id'] = '';
if (isset($_POST['login'])) {
    $users = new Users();
    $user = $users->checkLogin($_POST);
    if ($user != null) {
        $_SESSION['user_login'] = $user['us_username'];
        $_SESSION['user_id'] = $user['us_id'];
        header("Location:index.php");
        // var_dump($_SESSION);
    } else {
        //var_dump($_SESSION);
        $alert = 'Sai ten dang  nhap hoac mat khau  sai !';
    }
}
?>

<body>
    <div class="container">
        <?php if (isset($alert)) echo '<div class="alert alert-primary" role="alert">' . " $alert " . "</div>"; ?>
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                <span><a href="./"><i class="fas fa-angle-double-left"></i></a></span>
                <h3>Đăng Nhập<h3>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="us_email" class="form-control" placeholder="username" required>
                        </div>	
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="us_password" class="form-control" placeholder="password" required>
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox" checked="checked" name="remember">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" value="Đăng Nhập" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Chưa có tài khoản ?<a href="./register.php">Đăng ký</a>
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