<?php
include('../../layouts/header.php');
include('../../Model/hinhanh.php');
include('../../Model/laptops.php');
include('../../Model/gia.php');
include('../../lib/upload.php');
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
$gia = new Gia();
$listgia = $gia->getAllnoLimit();
$laptop = new Laptop();
$listlaptop = $laptop->getAllnoLimit();

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

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
                <div class="col-sm-10">
                    <select name="lt_id">
                    <option value="0">Chọn Tên Sản Phẩm</option>
                        <?php foreach ($listlaptop as $r) {
                        ?>
                            <option value="<?php echo $r['lt_id']  ?>"><?php echo $r['lt_name'] ?></option>
                            
                        <?php } ?>
                       
                    </select>
                </div>
            </li>

                        
            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh:</label>
                <div class="col-sm-10">
                    <input type="file" name="file"  required>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giá:</label>
                <div class="col-sm-10">
                    <select name="gia_id">
                    <option value="0">Giá</option>
                        <?php foreach ($listgia  as $gia) {
                        ?>
                            <option value="<?php echo $gia['gia_id']  ?>"><?php echo $gia['gia'] ?></option>
                            
                        <?php } ?>
                       
                    </select>
                </div>
            </li>


            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>