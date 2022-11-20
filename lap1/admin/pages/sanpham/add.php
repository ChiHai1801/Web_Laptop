<?php
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
require_once('../../layouts/header.php');
require_once('../../Model/sanpham.php');
if (isset($_POST['sp_name'])) {
    $sanpham = new Sanpham();
    $count = $sanpham->insert($_POST);
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
        <?php } ?>
        <form method="post" class="form" enctype="multipart/form-data">

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên sản phẩm:</label>
                <div class="col-sm-10">
                    <input type="text" name="sp_name" required>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Xuất Xứ:</label>
                <div class="col-sm-10">
                    <input type="text" name="sp_xuatxu" required>
                </div>
            </li>

              <li class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Mô tả:</label>
                  <div class="col-sm-10">
                      <textarea name="sp_mota" cols="40" rows="7" required></textarea>
                  </div>
              </li>

            <input type="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>