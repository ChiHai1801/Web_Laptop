<?php
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
require_once('../../layouts/header.php');
require_once('../../Model/users.php');
if (isset($_POST['us_username'])) {
    $users = new Users();
    $count = $users->insert($_POST);
    if ($count == 1) {
        $_SESSION['success'] = 'Thêm thành công';
    }
}


?>

<body>


    <div class="main_container">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $_SESSION['success'] ?>
        </div>
        <?php
        }
        ?>
        <form method="post" class="form" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="us_username">
                </div>
            </div>
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
               <div class="col-sm-10">
                   <input type="password" name="us_password">
               </div>
           </div>
           <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
               <div class="col-sm-10">
                   <input type="password" name="us_passwordR">
               </div>
           </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" name="us_phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" name="us_diachi">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giới Tính</label>
                <div class="col-sm-10">
                    <input type="text" name="us_gioitinh">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="date" name="us_ngaysinh">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="us_email">
                </div>
            </div>

            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>