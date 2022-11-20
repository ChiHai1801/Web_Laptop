<?php
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
require_once('../../layouts/header.php');
require_once('../../Model/users.php');
$users = new Users();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $users->getUserById($id);
    } else {
        header('Location:index.php');
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $users->update($_POST);
    header('Location:edit.php?id=' . $id);
}

?>

<body>


    <div class="main_containers">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php
        }
        ?>
        <form method="post">

            <input type="hidden" name="id" value="<?php echo $obj['us_username'] ?>" />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" value="<?php echo $obj['us_username'] ?>">
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $obj['us_phone'] ?>" />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" value="<?php echo $obj['us_phone'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" name="us_diachi" value="<?php echo $obj['us_diachi']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                    <input type="text" name="us_gioitinh" value="<?php echo $obj['us_gioitinh']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="text" name="us_ngaysinh" value="<?php echo $obj['us_ngaysinh']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="us_email" value="<?php echo $obj['us_email']; ?>">
                </div>
            </div>
            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>