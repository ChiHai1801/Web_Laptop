<?php
require_once('../../layouts/header.php');
require_once('../../Model/hinhanh.php');
require_once('../../lib/upload.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_FILES['file'])) {
    $hinhanh = new Hinhanh();
    ////check file upload
    $upload = new upload();
    if ($upload->upload()) {
        $realpath = $upload->getRealpath();
        $_POST['file'] = $realpath;
        $count = $hinhanh->insert($_POST);
    }
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
              <label for="staticEmail" class="col-sm-2 col-form-label">Tên:</label>
              <div class="col-sm-10">
                  <input type="name" name="ha_name" required>
              </div>
          </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh:</label>
                <div class="col-sm-10">
                    <input type="file" name="file"  required>
                </div>
            </div>

            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>