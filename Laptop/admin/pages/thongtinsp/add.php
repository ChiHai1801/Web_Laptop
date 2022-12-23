<?php
include('../../layouts/header.php');
include('../../Model/thongtinsp.php');
include('../../Model/laptops.php');

$laptops = new Laptop();
$listlaptops = $laptops->getAllnoLimit();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_POST['submit'])) {
    $thongtinsp = new TTsanpham();
        $count = $thongtinsp->insert($_POST);
  
        $_SESSION['success'] = 'Thêm thành công';
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


        <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
                <div class="col-sm-10">
                    <select name="lt_id">
                    <option value="0">Chọn Tên Sản Phẩm</option>
                        <?php foreach ($listlaptops as $r) {
                        ?>
                            <option value="<?php echo $r['lt_id']  ?>"><?php echo $r['lt_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>


            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Xuất xứ:</label>
                <div class="col-sm-10">
                    <input type="text" name="thongtinspxuatxu" required>
                </div>
            </div>

            <div class="form-groups row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Thông tin sản phẩm:</label>
                <div class="col-sm-11">
                    <textarea height="20px" type="text" name="thongtinspName" required></textarea>
                </div>
            </div>
                     
            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>