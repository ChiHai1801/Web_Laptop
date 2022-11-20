<?php
require_once('../../layouts/header.php');
require_once('../../Model/thuonghieu.php');
require_once('../../lib/upload.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_FILES['file']) && isset($_POST['thuonghieuName'])) {
    $thuonghieu = new Thuonghieu();
    ////check file upload
    $upload = new upload();
    if ($upload->upload()) {
        $realpath = $upload->getRealpath();
        $_POST['file'] = $realpath;
        $count = $thuonghieu->insert($_POST);
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
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên thương hiệu:</label>
                <div class="col-sm-10">
                    <input type="text" name="thuonghieuName" required>
                </div>
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Logo:</label>
              <div class="col-sm-10">
                  <input type="file" name="file" required>
              </div>
          </div>
   

            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>